<div>
    <x-slot name="header">
        <h2 class="font-medium text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('New article') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-form-section submit="save">
                <x-slot name="title">
                    {{ __('New Article') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('Some description') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-select-image wire:model.live="image" :image="$image" :existing="$article->image"/>
                        <x-input-error for="image" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="title" :value="__('Title')"/>
                        <x-input wire:model.blur="article.title" id="title" class="mt-1 block w-full" type="text" />
                        <x-input-error for="article.title" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="slug" :value="__('Slug')"/>
                        <x-input wire:model.live="article.slug" id="slug" class="mt-1 block w-full" type="text" />
                        <x-input-error for="article.slug" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="category_id" :value="__('Category')"/>
                        <div class="flex space-x-2 mt-1">
                            <x-select wire:model.pluck="article.category_id" :category="$article->category_id" :options="$categories" id="category_id" :placeholder="__('Select category')" class="block w-full" />
                            <x-secondary-button wire:click="openCategoryForm" class="!p-2.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                                </svg>
                            </x-secondary-button>
                        </div>
                        <x-input-error for="article.category_id" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="content" :value="__('Content')"/>
                        <x-html-editor wire:model.blur="article.content" id="content" class="mt-1 block w-full" ></x-html-editor>
                        <x-input-error for="article.content" class="mt-2" />
                    </div>
                    <x-slot name="actions">
                        @if($this->article->exists)
                            <x-danger-button wire:click="$set('showDeleteModal', true)" class="mr-auto">{{ __('Delete') }}</x-danger-button>
                        @endif
                        <x-button>
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-slot>
            </x-form-section>
        </div>
    </div>
    @if($this->article->exists)
    <x-confirmation-modal wire:model="showDeleteModal">
        <x-slot name="title">{{ __('Are you sure?') }}</x-slot>
        <x-slot name="content">Do you want delete the article: {{ $this->article->title }}</x-slot>
        <x-slot name="footer">
            <x-button wire:click="$set('showDeleteModal', false)">{{ __('Cancel') }}</x-button>
            <x-danger-button wire:click="delete">{{ __('Confirm') }}</x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    @endif
    <x-modal wire:model.live="showCategoryModal">
        <form wire:submit="saveNewCategory">
            <div class="px-6 py-3">
                <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('New Category') }}
                </div>

                <div class="mt-4 space-y-3 text-sm text-gray-600 dark:text-gray-400">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="new-category-name" :value="__('Name')"/>
                        <x-input wire:model.blur="newCategory.name" id="new-category-name" class="mt-1 block w-full" type="text" />
                        <x-input-error for="newCategory.name" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="new-category-slug" :value="__('Slug')"/>
                        <x-input wire:model.live="newCategory.slug" id="new-category-slug" class="mt-1 block w-full" type="text" />
                        <x-input-error for="newCategory.slug" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right space-x-2">
                <x-secondary-button wire:click="closeCategoryForm">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-button>{{ __('Submit') }}</x-button>
            </div>
        </form>
    </x-modal>
</div>
