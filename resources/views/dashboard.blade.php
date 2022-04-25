<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chọn sân bạn muốn đặt
        </h2>
    </x-slot>

    <x-field-form>
        <form method="POST" action="{{ route('timetable') }}">
                <div class="text flex-container justify-center">
                    <label for="date" class="form-label">Ngày đặt sân: </label>
                    <div >
                        <input type="text" id="date" name="dates"/>
                    </div>
                    <label for="time" class="form-label">Thời gian: </label>
                    <div >
                        <input type="text" id="time" name="times"/>
                    </div>
                </div>

            <div class="mb-3 pd-10 mt-4">
                <label for="type" class="form-label pd-5">Loại sân bóng: </label>
                <select class="form-control text-align: center" name="" id="type">
                    <option hidden>Số người</option>
                    @foreach ($type as $item)
                        <option value="{{ $item->id }}">{{ $item->field_member }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 pd-10 mt-4">
                <label for="field" class="form-label pd-10">Sân phù hợp: </label>
                <select class="form-control text-align: center" name="field" id="field"></select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Book Field') }}
                </x-button>
            </div>
        </form>
    </x-field-form>

</x-app-layout>
