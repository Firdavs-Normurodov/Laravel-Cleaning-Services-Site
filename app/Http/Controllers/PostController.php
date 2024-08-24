<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Jobs\ChangePost;
use App\Jobs\UploadBigFile;
use App\Mail\PostCreated as MailPostCreated;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\PostCreated as NotificationsPostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        // $this->authorizeResource(Post::class, 'post');
    }
    public function index()
    {
        // $user = User::first();
        // dd($user->name);
        $posts = Cache::remember('posts', now()->addsecond(30), function () {
            return Post::latest()->get();
        });
        return view('posts.index')->with('posts', $posts);
    }


    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }


    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $name, 'public');
        }

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,
        ]);
        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
        PostCreated::dispatch($post);
        ChangePost::dispatch($post)->onQueue('uploading');

        Mail::to($request->user())->later(now()->addMillisecond(40), (new MailPostCreated($post))->onQueue('sending-mails'));
        Notification::send(auth()->user(), new NotificationsPostCreated($post));
        return redirect()->route('posts.index')->with('success', 'Post created !');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function edit(Post $post)
    {

        return view('posts.edit')->with(['post' => $post]);
    }


    public function update(StorePostRequest $request, Post $post)
    {
        if ($request->hasFile('photo')) {
            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }
            $file = $request->file('photo');
            $name = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $name, 'public');
        }
        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $post->photo
        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }


    public function destroy(Post $post)
    {
        if (isset($post->photo)) {
            Storage::delete($post->photo);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
