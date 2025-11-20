<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>{{ __('একাউন্ট ডিলিট করুন') }}</flux:heading>
        <flux:subheading>{{ __('সকল রিসোর্স সহ আপনার একাউন্ট ডিলেট করুন') }}</flux:subheading>
    </div>

    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" data-test="delete-user-button">
            {{ __('ডিলিট একাউন্ট') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form method="POST" wire:submit="deleteUser" class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('আপনি কি ভাবনা চিন্তা করে একাউন্ট ডিলিট করতে যাচ্ছেন?') }}</flux:heading>

                <flux:subheading>
                    {{ __('একবার আপনার একাউন্ট ডিলিট হয়ে গেলে আর কোনো ডাটা পাবেন না। কনফার্ম করতে পাসওয়ার্ডটি লিখুন।') }}
                </flux:subheading>
            </div>

            <flux:input wire:model="password" :label="__('Password')" type="password" />

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">{{ __('ক্যান্সেল') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit" data-test="confirm-delete-user-button">
                    {{ __('ডিলিট একাউন্ট') }}
                </flux:button>
            </div>
        </form>
    </flux:modal>
</section>
