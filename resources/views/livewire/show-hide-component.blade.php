<div>
        <x-laravel-views::buttons.button type="button" wire:click="$toggle('showDiv')"><strong>{{__('Thông tin đặt sân của tôi')}}</strong></x-laravel-views::buttons.button>
            @if ($showDiv)
                <x-field-form>@livewire('b-field-list-view')</x-field-form>
            @else
                <x-field-form>@livewire('b-field-single-list-view')</x-field-form>
            @endif
</div>
