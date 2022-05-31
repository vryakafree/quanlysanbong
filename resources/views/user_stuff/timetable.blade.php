<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center mt-4 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                Danh sách đặt sân
            </h2>
            <x-button onclick="openForm()"><strong>{{__('Thông tin đặt sân của tôi')}}</strong></x-button>
        </div>
    </x-slot>

    @livewire('b-field-list-view')
</x-app-layout>
