@props([
    'field',
    'sortField',
    'sortDirection'
])

<button {!! $attributes->merge(['class' => 'flex items-center uppercase hover:underline']) !!}">
    {{ $slot }}
    @if($sortField === $field)
        <svg class="w-3 h-3 ml-1 duration-200 @if($sortDirection === 'desc') rotate-180 @endif" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"></path>
        </svg>
    @endif
</button>
