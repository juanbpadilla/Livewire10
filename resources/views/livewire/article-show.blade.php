<div  class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div>{{ $article->id }}</div>
    <p>{{ $article->title }}</p>
    <p>{{ $article->content }}</p>
    <p>{{ $article->category->name }}</p>
    <a href="{{ route('articles.index') }}">Regresar</a>
</div>
