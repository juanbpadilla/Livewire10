<div class="bg-gray-100  dark:bg-gray-900">
    <x-slot name="header">
        <h2 class="font-medium text-xl text-gray-900 dark:text-gray-100">
            {{ __('New article') }}
        </h2>
    </x-slot>
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
                        <x-select wire:model.live="article.category_id" id="category_id" :options="$categories" :placeholder="__('Select category')" class="block w-full" />
                        <x-secondary-button wire:click="$set('showCategoryModal', true)" class="!p-2.5">
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
                    <x-button>
                        {{ __('Save') }}
                    </x-button>
                </x-slot>

            </x-slot>

        </x-form-section>
    </div>
    <x-dialog-modal wire:model="showCategoryModal">
        <x-slot name="title">Modal title</x-slot>
        <x-slot name="content">Modal content</x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showCategoryModal', false)">
                {{ __('Cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
