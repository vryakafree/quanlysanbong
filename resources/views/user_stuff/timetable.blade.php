<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php
            echo "Danh sách đặt sân ";
            ?>
        </h2>

    </x-slot>

    @livewire('b-field-list-view')
</x-app-layout>
