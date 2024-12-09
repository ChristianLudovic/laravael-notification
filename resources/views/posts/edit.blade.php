@include('partials.head')
        <main class="mx-auto max-w-lg">
            <div class="space-y-2">
                <h1 class="text-md font-semibold">Editer un post</h1>

                <!-- Formulaire pour éditer le post -->
                <form action="{{ route('posts.update', $post) }}" method="POST" class="border border-gray-300 p-4 space-y-3">
                    @csrf
                    @method('patch')
                    <div class="space-y-3 w-full">
                        <input
                            autocomplete="off"
                            name="author"
                            type="text"
                            class="px-2 py-3 border border-gray-300 block w-full text-sm focus:outline-none"
                            value="{{ old('author', $post->author) }}"
                        />
                        <textarea
                            name="content"
                            class="px-2 pt-2 border border-gray-300 block w-full text-sm focus:outline-none"
                        >{{ old('content', $post->content) }}</textarea>
                    </div>
                    <button type="submit" class="flex items-center justify-center px-4 py-2 text-white bg-black text-sm">
                        Editer
                    </button>
                </form>

                <!-- Formulaire pour supprimer le post -->
                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="mt-3">
                    @csrf
                    @method('delete')
                    <button type="submit" class="flex items-center justify-center px-4 py-2 text-white bg-red-500 text-sm">
                        Supprimer
                    </button>
                </form>
            </div>
        </main>
@include('partials.head')
