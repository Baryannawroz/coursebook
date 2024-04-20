<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-secondary  rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest focus:outline-none  disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>