@include('partials.head')
        <main class="mx-auto max-w-lg">
            <div class="flex justify-between items-end">
                <h1 class="font-bold text-2xl ">Bienvenue dans mes posts!!!!</h1>
                <a href="/notifications" class="text-sm">Notification({{count($notifications)}})</a>
            </div>

            <div class="space-y-2 mt-4">
                <h2 class="text-md font-semibold">Enregistrer un post</h2>
                <form action="{{route('posts.store')}}" method="POST" class="border border-gray-300 p-4 space-y-3">
                    @csrf
                    <div class=" space-y-3 w-full">
                        <input autocomplete="off" name="author" type="text" placeholder="Entrer un auteur" class="px-2 py-3 border border-gray-300 block w-full text-sm focus:outline-none" />
                        <textarea name="content" placeholder="Entrer votre partie preferee.." class="px-2 pt-2 border border-gray-300 block w-full text-sm focus:outline-none"></textarea>
                    </div>
                    <button type="submit" class="flex items-center justify-center px-4 py-2 text-white bg-black text-sm">Enregistrer</button>
                </form>
            </div>
            <div class="mt-7">
                <h2 class="text-md font-semibold">Mes posts recents ({{count($posts)}})</h2>
                <div class="space-y-3 mt-4">
                    @foreach($posts as $post)
                        <a href="{{route('posts.edit', $post)}}" class="block px-4 py-2 space-y-1 border border-gray-300 hover:border-gray-600 cursor-pointer text-sm">
                            <h2 class="text-md font-semibold">{{$post->author}}</h2>
                            <p>{{$post->content}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </main>
@include('partials.head')
