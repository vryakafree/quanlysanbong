<x-field-form>
    <div class="flex items-center mt-4 justify-end">
        @if ($showDiv)
            <x-laravel-views::buttons.button type="button" wire:click="$toggle('showDiv')"><i class="fa fa-calendar"></i><strong> Lịch đặt cá nhân</strong></x-laravel-views::buttons.button>
        @else
            <x-laravel-views::buttons.button type="button" wire:click="$toggle('showDiv')"><i class="fa fa-calendar"></i><strong> Lịch đặt hệ thống</strong></x-laravel-views::buttons.button>
        @endif
    </div>

    @if ($showDiv)
            @livewire('b-field-single-list-view')
    @else
        @livewire('b-field-list-view')
    @endif
</x-field-form>
