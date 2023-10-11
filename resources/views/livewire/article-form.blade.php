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
                    <x-label for="image" :value="__('Image')"/>
                    <x-input wire:model.live="image" id="image" class="mt-1 block w-full" type="file" />
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
                    <x-label for="content" :value="__('Content')"/>
                    <x-html-editor wire:model.live="article.content" id="content" class="mt-1 block w-full" ></x-html-editor>
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
</div>
