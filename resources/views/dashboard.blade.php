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
                <form method="POST" action="{{ route('timetable') }}">
                    <div class="mb-3 pd-10 mt-4">
                        <label>Tên khách hàng: {{ Auth::user()->name }}</label>
                    </div>
                    <div class="mb-3 pd-10 mt-4">
                        <label>Số điện thoại:
                            <input type="tel" class="mt-1" value="{{ Auth::user()->phone }}"/>
                        </label>
                    </div>

                    <div class="text flex-container justify-center">
                        <div>
                            <label id="dtlb"></label>
                            <input type="text" id="date" name="datetimes"/>
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
                        </div>
                    </div>

                    <div class="mb-3 pd-10 mt-4">
                        <label for="cost" class="form-label pd-10">Giá thuê sân: </label>
                        <label class="form-control text-align: center" name="cost" id="cost"></label>
                    </div>

                    <div class="flex-container">
                        <label for="cost" class="form-label pd-10">Hình thức thanh toán: </label>
                        <div>
                            <input type="radio" name="cost"> Thanh toán trực tiếp<br>
                            <input type="radio" name="cost"> Chuyển khoản, ví điện tử<br>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button type="button" class="btn cancel" onclick="closeForm()">
                            {{__('Close')}}
                        </x-button>
                        <x-button class="ml-4">
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

<!----- scripts jquery--------->
<script>
    var hour = 0;
    var cost = 0;

    $(function getdatetimes() {
        document.getElementById('dtlb').innerHTML = 'Bấm để chọn ngày: ';
        $('input[name="datetimes"]').daterangepicker({
            singleDatePicker: true,
            minDate: moment(),
            maxDate: moment().add(14, 'days'),
            autoApply: true,
            locale: {
                format: 'DD/MM/YYYY HH:mm'
            }
        });
        $('input[name="datetimes"]').on('apply.daterangepicker', function getdatetimes(){
            if(moment().minute() < 30 && moment().minute() >= 0){
                var tstart =  moment().startOf('hour').set('minute', 30);
            }else if(moment().minute() > 30 && moment().minute() <= 59){
                var tstart =  moment().startOf('hour').set('minute', 0).add(1,'hour');
            }
            var tend = moment(tstart).add(1.5, 'hour');
            hour   = (tend - tstart)/1000/60;
            document.getElementById('dtlb').innerHTML = 'Thời gian thuê: (mặc định là ' + hour + ' phút)';
            document.getElementById('cost').innerHTML = hour * cost + ' vnd';
            $('input[name="datetimes"]').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 30,
                minDate: moment(),
                startDate: tstart,
                endDate: tend,
                locale: {
                    format: 'DD/MM/YYYY HH:mm'
                }
            }).on('show.daterangepicker', function getdatetimes(ev, picker) {
                picker.container.find(".calendar-table").hide();
                picker.container.find(".drp-selected").hide();
            }).on('apply.daterangepicker', function getdatetimes(){
                var date_range = $('#date').val();
                var dates = date_range.split(" - ");
                var startDate = moment(dates[0],'DD/MM/YYYY HH:mm');
                var endDate = moment(dates[1],'DD/MM/YYYY HH:mm');
                hour   = (endDate - startDate)/1000/60;
                document.getElementById('dtlb').innerHTML ='Thời gian thuê: ' + hour + ' phút';
                document.getElementById('cost').innerHTML = hour * cost + ' vnd';
            });
        });
    });

    $(document).ready(function() {
        $('#type').on('change', function() {
            var typeID = $(this).val();
            if(typeID) {
                $.ajax({
                    url: '/getField/'+typeID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#field').empty();
                            $('#field').append('<option hidden>Chọn sân</option>');
                            $.each(data, function(key, field){
                                $('select[name="field"]').append('<option value="'+ key +'">' + field.field_name+ '</option>');
                                cost = field.cost;
                                document.getElementById('cost').innerHTML = hour * cost + ' vnd';
                            });
                        }else{
                            $('#field').empty();
                        }
                    }
                });
            }else{
                $('#field').empty();
            }
        });
    });
</script>
