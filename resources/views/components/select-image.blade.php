<div class="relative">
    @php($id = $attributes->wire('model')->value)
    @if($image instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
        <x-danger-button wire:click="$set('{{$id}}', '')" class="absolute bottom-2 right-2">
            {{ __('Change Image') }}
        </x-danger-button>
        <img src="{{ $image->temporaryUrl() }}" class="border-2 rounded" alt="">
    @elseif($existing)
        <x-label :for="$id" :value="__('Change Image')"
                 class="absolute bottom-2 right-2 cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        />

        <img src="{{ Storage::disk('public')->url($existing) }}" alt="">
    @else
        <div class="h-32 bg-gray-50 dark:bg-gray-900 border-2 border-dashed flex items-center justify-center">
            <x-label :for="$id" :value="__('Select Image')" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"/>
        </div>
    @endif
    <x-input wire:model.live="{{$id}}" :id="$id" class="hidden" type="file" />
</div>
