<x-layouts.auth>
    <div class="mt-4 flex flex-col gap-6">
        <flux:text class="text-center">
            {{ __('এইমাত্র পাঠানো ইমেইল লিংকটিতে ক্লিক করে আপনার একাউন্ট মেইল ভেরিফিকেশন সম্পন্ন করুন।') }}
        </flux:text>

        @if (session('status') == 'verification-link-sent')
            <flux:text class="text-center font-medium !dark:text-green-400 !text-green-600">
                {{ __('রেজিস্ট্রেশনের সময় প্রদানকৃত ইমেইল এ নতুন ভেরিফিকেশন লিংক পাঠানো হয়েছে') }}
            </flux:text>
        @endif

        <div class="flex flex-col items-center justify-between space-y-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <flux:button type="submit" variant="primary" class="w-full bg-amber-500 hover:bg-amber-600">
                    {{ __('পুনরায় ভেরিফিকেশন ইমেইল পাঠান') }}
                </flux:button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <flux:button variant="ghost" type="submit" class="text-sm cursor-pointer" data-test="logout-button">
                    {{ __('লগআউট') }}
                </flux:button>
            </form>
        </div>
    </div>
</x-layouts.auth>
