<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
       
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)

                {{-- Post completo con su imagen de fondo --}}
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(http://localhost/blog/{{Storage::url($post->image->url)}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        {{-- Etiquetas con sus colores --}}
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                        {{-- Titulo del post  --}}
                        <h1 class="text-4xl text-white leading-8 font-bold mt-3">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>
                        
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Paginación de los post --}}
        <div class="mt-4">
            {{ $posts->links() }}
        </div>

    </div>    
</x-app-layout>