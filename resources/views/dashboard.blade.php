<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center mt-4 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                Thông tin sân bóng
            </h2>
            <x-button onclick="openForm()"><strong>{{__('Book Field Now')}}</strong></x-button>
        </div>
    </x-slot>

    <div class="formPopup" id="popupForm">
        <x-field-form>
            <form method="POST" action="{{ route('bookfields.store') }} ">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="mb-3 pd-10 mt-4">
                    <label>Tên khách hàng: {{ Auth::user()->name }}</label>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                </div>
                <div class="mb-3 pd-10 mt-4">
                    <label>Số điện thoại:
                        <input type="tel" name="phone" class="mt-1" value="{{ Auth::user()->phone }}"/>
                    </label>
                </div>

                <div class="text flex-container justify-center">
                    <div>
                        <label id="dtlb"></label>
                        <input type="text" id="date" name="datetimes"/>
                        <input type="hidden" id="start_at" name="start_at"/>
                        <input type="hidden" id="end_at" name="end_at"/>
                    </div>
                </div>

                <div class="text flex-container justify-center">
                    <div>
                        <label for="type" class="form-label pd-5">Loại sân bóng: </label>
                        <select class="form-control text-align: center" name="" id="type">
                            <option hidden>Số người</option>
                            @foreach ($type as $item)
                                <option value="{{ $item->id }}">{{ $item->field_member }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="field" class="form-label pd-10">Sân phù hợp: </label>
                        <select class="form-control text-align: center" name="field" id="field"></select>
                        <input type="text" name="field_id" id="field_id"/>
                    </div>
                </div>

                <div class="mb-3 pd-10 mt-4">
                    <label for="cost" class="form-label pd-10">Giá thuê sân: </label>
                    <label class="form-control text-align: center" name="cost" id="cost"></label>
                    <input type="hidden" name="bill_cost" id="cost"/>
                </div>

                <div class="flex-container">
                    <label for="cost" class="form-label pd-10">Hình thức thanh toán: </label>
                    <div>
                        <input type="radio" name="paid" value="0"> Thanh toán trực tiếp<br>
                        <input type="radio" name="paid" value="1"> Chuyển khoản, ví điện tử<br>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button type="button" class="btn cancel" onclick="closeForm()">
                        {{__('Close')}}
                    </x-button>
                    <x-button type="submit" class="ml-4">
                        {{ __('Book Field') }}
                    </x-button>
                </div>
            </form>
        </x-field-form>
    </div>
    <script>
        function openForm() {
            document.getElementById("popupForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
</x-app-layout>
