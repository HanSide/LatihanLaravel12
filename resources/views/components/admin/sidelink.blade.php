<a {{ $attributes->merge(['class' => 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group']) }}>
    @if (isset($icon))
        <span class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white">
            {{ $icon }}
        </span>
    @endif

    <span class="ml-3">{{ $slot }}</span>
</a>
