<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-secondary  rounded-md font-semibold text-xs text-black uppercase tracking-widest  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
