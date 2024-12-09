@include('partials.head')
    <main class="mx-auto max-w-lg">
        <h1 class="text-md font-semibold">Notifications</h1>
        <div class="space-y-3 mt-4">
            @foreach ($notifications as $notification)
                @php
                    $data = json_decode($notification->data);
                    $createAt = $data->read ? \Carbon\Carbon::parse($data->read)->diffForHumans() : 'Non lu';
                @endphp
                <div class="block px-4 py-3 space-y-2 border-b border-gray-300 text-sm">
                    <div class="flex items-center justify-between">
                        <p class="text-sm">{{ $data->title }} par <span class="font-semibold">{{ $data->author }}</span> </p>
                        <span>{{$createAt}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@include('partials.head')
