<div  class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div>{{ $article->id }}</div>
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <a href="{{ route('articles.index') }}">Regresar</a>
</div>
