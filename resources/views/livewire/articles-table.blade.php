<div  class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between">
            <label>
                <x-input type="search"
                         wire:model.live="search"
                         type="search"
                         :placeholder="__('Search')"
                />
            </label>
            <a href="{{ route('articles.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-white focus:bg-indigo-900 dark:focus:bg-white active:bg-indigo-900 dark:active:bg-gray-300 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-offset-indigo-800 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                </svg>
                {{ __('New Article') }}
            </a>
        </div>

        <div class="flex flex-col mt-10">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700 dark:border-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center sm:text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-100 uppercase tracking-wider">Title</th>
                                <th scope="col" class="px-6 py-3 text-center sm:text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-100 whitespace-nowrap uppercase tracking-wider">Created at</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($articles as $article)
                                <tr wire:key="{{ 'article-'.$article->id }}">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-md font-medium line-clamp-2 dark:font-light text-gray-900 dark:text-gray-300">
                                                    <a href="{{ route('articles.show', $article) }}">
                                                        {{ $article->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-xs text-center sm:text-left sm:text-sm text-gray-600 dark:text-gray-400">{{ $article->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('articles.edit', $article) }}" class="text-indigo-500 hover:text-indigo-900">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </a>
                                            <livewire:article-delete-modal wire:key="{{'article-delete-button-'.$article->id}}" :article="$article" >
                                                <button wire:click="$dispatch('confirmArticleDeletion', { article: {{ $article }} })" class="text-red-500 hover:text-red-900">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                                    </svg>
                                                </button>
                                            </livewire:article-delete-modal>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                            </tbody>
                        </table>
                        <div class="px-4 py-3 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
