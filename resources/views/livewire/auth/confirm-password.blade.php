<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('কনফার্ম পাসওয়ার্ড')"
            :description="__('এই জায়গাটি এপ্লিকেশনের জন্য সিকিউর। প্রবেশ করতে পাসওয়ার্ডটি কনফার্ম করুন।')"
        />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.confirm.store') }}" class="flex flex-col gap-6">
            @csrf

            <flux:input
                name="password"
                :label="__('পাসওয়ার্ড')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('password')"
                viewable
            />

            <flux:button variant="primary" type="submit" class="w-full bg-amber-500 hover:bg-amber-600" data-test="confirm-password-button">
                {{ __('নিশ্চিত করুন') }}
            </flux:button>
        </form>
    </div>
</x-layouts.auth>
