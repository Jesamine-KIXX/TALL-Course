<div class="flex h-screen w-full flex-col bg-indigo-900" x-data = "{
            showSubscribe: @entangle('showSubscribe'),
            showSuccess: @entangle('showSuccess')
        }">
    <nav class="container mx-auto flex justify-between pt-5 text-indigo-200">
        <a href="/" class="text-4xl font-bold">
            <x-application-logo class="h-16 w-16 fill-current"></x-application-logo>
        </a>

        <div class="flex justify-end">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>

    <div class="container mx-auto flex h-full items-center">
        <div class="flex w-1/3 flex-col items-start">
            <h1 class="mb-4 text-5xl font-bold leading-tight text-white">Simple generic landing page to subscribe</h1>
            <p class="mb-10 text-xl text-indigo-200">We are just checking the <span class="font-bold underline">TALL</span> stack. Would you mind subscribing?</p>
            <x-primary-button class="bg-red-500 px-8 py-3 hover:bg-red-600" x-on:click="showSubscribe = true">Subscribe</x-primary-button>
        </div>
    </div>

    <x-modal class="!bg-pink-500" trigger="showSubscribe">
        <p class="text-center text-5xl font-extrabold text-white">Let's do it!</p>

        <form class="flex flex-col items-center p-24" wire:submit.prevent="subscribe">
            <x-text-input class="w-80 border border-blue-400 px-5 py-3" type="email" name="email" placeholder="Email address" wire:model.defer="email"></x-text-input>

            <span class="text-xs text-gray-100">
                {{ $errors->has('email') ? $errors->first('email') : 'We will send you a confirmation email.' }}
            </span>

            <x-primary-button class="mt-5 w-80 justify-center !bg-blue-500 px-5 py-3">
                <span class="animate-spin" wire:loading wire:target='subscribe'>&#9696;</span>
                <span wire:loading.remove wire:target='subscribe'>Get In</span>
            </x-primary-button>
        </form>
    </x-modal>

    <x-modal class="!bg-green-500" trigger="showSuccess">
        <p class="animate-pulse text-center text-9xl font-extrabold text-white">&check;</p>
        <p class="mt-16 text-center text-5xl font-extrabold text-white">Great!</p>
        @if (request()->has('verified') && request()->verified == 1)
            <p class="text-center text-3xl text-white">Thanks for confirming.</p>
        @else
            <p class="text-center text-3xl text-white">See you in your inbox.</p>
        @endif
    </x-modal>
</div>
