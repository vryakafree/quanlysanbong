<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center mt-4 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                Đã có người đặt sân này, vui lòng chọn sân hoặc mốc thời gian khác.
            </h2>
            <x-button onclick="window.location.href='dashboard'"><strong>{{__('Back')}}</strong></x-button>
        </div>
    </x-slot>

    @livewire('fields-grid-view')
</x-app-layout>
