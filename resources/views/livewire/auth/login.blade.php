<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('একাউন্টে লগিন করুন')" :description="__('ইমেইল ও পাসওয়ার্ড দিয়ে একাউন্টে প্রবেশ করুন।')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

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
