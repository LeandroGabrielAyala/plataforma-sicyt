<x-app-layout>

    {{-- Filtración por categorias --}}
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold mb-3">Categoría: {{ $category->name }}</h1>

        {{-- Post Card Component --}}
        @foreach ($posts as $post)
            <x-card-post :post="$post"></x-card-post>
        @endforeach

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>

</x-app-layout>