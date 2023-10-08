<div>
    <div class="bg-white dark:bg-gray-800 p-2">
        <h1>Listado de artículos</h1>
        <ul>
            @foreach($articles as $article)
                <li>{{ $article->title }}</li>
            @endforeach
        </ul>
    </div>
</div>
