<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('এপিয়ারেন্স')" :subheading=" __('আপনার ড্যাশবোর্ডের এপিয়ারেন্স সেটিংস করুন')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('লাইট') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('ডার্ক') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('সিস্টেম') }}</flux:radio>
        </flux:radio.group>
    </x-settings.layout>
</section>
