@props(['trigger'])

<div class="fixed top-0 flex h-full w-full items-center bg-gray-900 bg-opacity-60" x-show="{{ $trigger }}" x-on:click.self="{{ $trigger }} = false" x-on:keydown.escape.window="{{ $trigger }} = false" x-cloak>
    <div {{ $attributes->merge(['class' => 'm-auto rounded-xl bg-gray-200 p-8 shadow-2xl']) }}>
        {{ $slot }}
    </div>
</div>
