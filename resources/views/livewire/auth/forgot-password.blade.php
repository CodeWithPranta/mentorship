<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('পাসওয়ার্ড ভূলে গেছেন?')" :description="__('পাসওয়ার্ড রিসেট লিংক পেতে একাউন্ট ইমেইল দিন।')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('ইমেইল এড্রেস')"
                type="email"
                required
                autofocus
                placeholder="email@example.com"
            />

            <flux:button variant="primary" type="submit" class="w-full bg-amber-500 hover:bg-amber-600" data-test="email-password-reset-link-button">
                {{ __('পাসওয়ার্ড রিসেট লিংক ইমেইল করুন') }}
            </flux:button>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
            <span>{{ __('অথবা, ফেরত যান') }}</span>
            <flux:link :href="route('login')" wire:navigate>{{ __('লগিন') }}</flux:link>
        </div>
    </div>
</x-layouts.auth>
