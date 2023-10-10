<div  class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        Listado de artículos
    </h2>

    <x-label class="py-4">
        <a href="{{ route('articles.create') }}">{{ __('Create') }}</a>
    </x-label>
-    <x-input type="search"
        wire:model.live="search"
        type="search"
        placeholder="Buscar..."
    />
    <ul class="py-4">
        @foreach($articles as $article)
            <li>
                <a href="{{ route('articles.show', $article) }}">
                    {{ $article->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
