<x-field-form>
    <div class="flex items-center mt-4 justify-end">
        @if ($showDiv)
            <x-button type="button" wire:click="$toggle('showDiv')"><i class="fa fa-solid fa fa-user"></i><strong>&ensp; Lịch đặt cá nhân</strong></x-button>
        @else
            <x-button type="button" wire:click="$toggle('showDiv')"><i class="fa fa-solid fa fa-users"></i><strong>&ensp; Lịch đặt hệ thống</strong></x-button>
        @endif
    </div>

    @if ($showDiv)
            @livewire('b-field-single-list-view')
    @else
        @livewire('b-field-list-view')
    @endif
</x-field-form>
