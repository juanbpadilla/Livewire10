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
                <div class="col-span-6 sm:col-span-4 relative">
                    @if($image)
                        <x-danger-button wire:click="$set('image', null)" class="absolute bottom-2 right-2">
                            {{ __('Change Image') }}
                        </x-danger-button>
                        <img src="{{ $image->temporaryUrl() }}" class="border-2 rounded" alt="">
                    @elseif($article->image)
                        <x-label for="image" :value="__('Change Image')" class="absolute bottom-2 right-2 cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"/>

                        <img src="{{ Storage::disk('public')->url($article->image) }}" alt="">
                    @else
                        <div class="h-32 bg-gray-50 dark:bg-gray-900 border-2 border-dashed flex items-center justify-center">
                            <x-label for="image" :value="__('Select Image')" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"/>
                        </div>
                    @endif
                    <x-input wire:model.live="image" id="image" class="hidden" type="file" />
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
