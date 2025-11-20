<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('একাউন্টে লগিন করুন')" :description="__('ইমেইল ও পাসওয়ার্ড দিয়ে একাউন্টে প্রবেশ করুন।')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <a href="{{ route('auth.google') }}"
            class="flex items-center justify-center gap-3 px-5 py-3 border border-gray-300 dark:border-gray-700 rounded-lg 
                    hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-200 w-full max-w-xs mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-6 h-6">
                    <path fill="#EA4335" d="M24 9.5c3.04 0 5.14 1.32 6.32 2.43l4.67-4.67C31.63 4.8 28.09 3 24 3 14.91 3 7.44 9.14 5.13 17.37l5.97 4.64C12.4 14.16 17.73 9.5 24 9.5z"/>
                    <path fill="#34A853" d="M46.15 24.62c0-1.56-.14-3.05-.41-4.5H24v8.52h12.52c-.54 2.8-2.17 5.17-4.52 6.78l6.96 5.41c4.06-3.74 6.19-9.26 6.19-16.21z"/>
                    <path fill="#4A90E2" d="M24 46c6.21 0 11.42-2.05 15.22-5.59l-6.96-5.41c-1.94 1.31-4.42 2.09-8.26 2.09-6.27 0-11.59-4.66-12.89-10.92l-6.97 5.41C7.43 40.43 14.9 46 24 46z"/>
                    <path fill="#FBBC05" d="M11.11 26.17A12.99 12.99 0 0 1 10.6 24c0-.74.12-1.45.28-2.17l-6.97-5.41A20.968 20.968 0 0 0 3 24c0 3.4.83 6.61 2.3 9.41l5.81-4.71z"/>
                </svg>

                <span class="text-gray-800 dark:text-gray-100 font-medium">
                    গুগল দিয়ে লগিন করুন
                </span>
            </a>

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('ইমেইল এড্রেস')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('পাসওয়ার্ড')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('password')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('পাসওয়ার্ডটি ভূলে গেছেন?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('আমাকে স্মরণ রাখুন')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full bg-amber-500 hover:bg-amber-600" data-test="login-button">
                    {{ __('লগিন') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                <span>{{ __('এখনো একাউন্ট খোলা হয় নি?') }}</span>
                <flux:link :href="route('register')" wire:navigate>{{ __('সাইন আপ') }}</flux:link>
            </div>
        @endif
    </div>
</x-layouts.auth>
