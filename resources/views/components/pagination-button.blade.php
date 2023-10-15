<div>
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'relative inline-flex items-center justify-center px-4 py-2 font-medium leading-tight font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:active:bg-gray-800 active:bg-gray-400 transition ease-in-out duration-150 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
</div>

