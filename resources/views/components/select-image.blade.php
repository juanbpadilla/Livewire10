@php($id = $attributes->wire('model')->value)

<div x-data="{ focused: false }" class="relative">
    @if($image instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
        <x-danger-button wire:click="$set('{{$id}}','')" class="absolute bottom-2 right-2">
            {{ __('Change Image') }}
        </x-danger-button>
        <img src="{{ $image->temporaryUrl() }}" class="border-2 rounded" alt="">
    @elseif($existing)
        <label for="{{$id}}"
               class="absolute bottom-2 right-2 cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white active:bg-gray-900 dark:active:bg-gray-300 transition ease-in-out duration-150"
               :class="{ 'bg-white outline-none ring-2 ring-indigo-500 ring-offset-2 ring-offset-gray-800': focused }"
        >{{ __('Change Image') }}</label>

        <img src="{{ Storage::disk('public')->url($existing) }}" alt="">
    @else
        <div class="h-32 bg-gray-50 dark:bg-gray-900 border-2 border-dashed flex items-center justify-center">
            <label for="{{$id}}"
                     class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white active:bg-gray-900 dark:active:bg-gray-300 transition ease-in-out duration-150"
                     :class="{ 'bg-white outline-none ring-2 ring-indigo-500 ring-offset-2 ring-offset-gray-800': focused }"
            >{{ __('Select Image') }}</label>
        </div>
    @endif
    @unless($image)
        <x-input
            wire:model.live="{{$id}}"
            x-on:focus="focused = true"
            x-on:blur="focused = false"
            :id="$id"
            class="sr-only"
            type="file"
        />
    @endunless
</div>
