<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('একটি একাউন্ট তৈরি করুন')" :description="__('নিচের ফর্মটি আপনার তথ্য দিয়ে পূরণ করুন')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf
            <!-- Name -->
            <flux:input
                name="name"
                :label="__('নাম')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('পূর্ণ নাম')"
            />

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('ইমেইল এড্রেস')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <flux:input
                name="password"
                :label="__('পাসওয়ার্ড')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('password')"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                name="password_confirmation"
                :label="__('পাসওয়ার্ডটি পুনরায় লিখুন')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('password')"
                viewable
            />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full bg-amber-500 hover:bg-amber-600" data-test="register-user-button">
                    {{ __('সাবমিট করুন') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('ইতিমধ্যে একাউন্ট খোলা হয়েছে? অথবা জিমেইল একাউন্ট দিয়ে প্রবেশ করুন।') }}</span>
            <flux:link :href="route('login')" wire:navigate>{{ __('লগিন') }}</flux:link>
        </div>
    </div>
</x-layouts.auth>
