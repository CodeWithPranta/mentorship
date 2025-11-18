<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('রিসেট পাসওয়ার্ড')" :description="__('নিচে নতুন পাসওয়ার্ডটি লিখুন')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-6">
            @csrf
            <!-- Token -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Email Address -->
            <flux:input
                name="email"
                value="{{ request('email') }}"
                :label="__('ইমেইল')"
                type="email"
                required
                autocomplete="email"
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
                :label="__('কনফার্ম পাসওয়ার্ড')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('password')"
                viewable
            />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full bg-amber-500 hover:bg-amber-600" data-test="reset-password-button">
                    {{ __('রিসেট পাসওয়ার্ড') }}
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts.auth>
