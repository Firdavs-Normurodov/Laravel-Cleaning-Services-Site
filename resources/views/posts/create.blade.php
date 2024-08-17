<x-layouts.main>
    <x-slot:title>
        Post Create
    </x-slot:title>

    <!-- Page Header Start -->
    <x-layouts.page-header>
        New Post Create
    </x-layouts.page-header>
    <!-- Page Header End -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <div id="success"></div>

                        <form action="{{ route('posts.store') }}"method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class="control-group mb-3">
                                @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input value="{{ old('title') }}" type="text" class="form-control p-4"
                                    name="title" placeholder="Title" />


                            </div>
                            <div class="control-group ">
                                @error('photo')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input name="photo" type="file" class="form-control  p-4" id="subject"
                                    placeholder="Photos" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group mb-3">
                                @error('short_content')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <textarea class="form-control p-4" rows="6" name="short_content" placeholder="Short Content">{{ old('title') }}</textarea>

                            </div>
                            <div class="control-group mb-3">
                                @error('content')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <textarea class="form-control p-4" rows="6" name="content" placeholder="Content">{{ old('title') }}</textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit"
                                    id="sendMessageButton">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.main>
