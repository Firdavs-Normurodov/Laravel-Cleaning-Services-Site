<x-layouts.main>
    <x-slot:title>
        Notifications
    </x-slot:title>



    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h1 class="section-title mb-3">Notifications</h1>
                </div>

            </div>
            <div class="row">
                @foreach ($notifications as $notification)
                    <div class="col-lg-12 col-md-12 mb-5 border p-4 rounded">
                        <div class="position-relative mb-4">


                        </div>

                        <div class="d-flex mb-2">
                            @php
                                $createdAt = \Carbon\Carbon::parse($notification->data['created_at']);
                            @endphp

                            <div class="d-flex mb-2">
                                <a
                                    class="text-danger text-uppercase font-weight-medium">{{ $createdAt->format('Y-m-d H:i:s') }}</a>
                            </div>
                        </div>
                        <h5 class="font-weight-medium mb-2">{{ $notification->data['title'] }}</h5>
                        <p class="mb-4">Post id: {{ $notification->data['id'] }}</p>
                        @if ($notification->read_at == null)
                            <a class="btn btn-sm btn-success py-2"
                                href={{ route('notifications.read', ['notification' => $notification->id]) }}>Reading
                            </a>
                        @else
                            <p class="btn btn-sm btn-dark py-2">Was read
                            </p>
                        @endif
                    </div>
                @endforeach
                <div class="col-12 d-flex justify-content-between align-items-cente">
                    {{ $notifications->links() }}
                </div>

            </div>
        </div>
    </div>
    <!-- Blog End -->


</x-layouts.main>
