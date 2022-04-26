<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('lib/toast/jquery.toast.min.js')}}"></script>
    <script src="{{ asset('lib/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('lib/common.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function () {
            $('input[name="dates"]').daterangepicker({
                singleDatePicker: true,
                minDate: moment(),
                maxDate: moment().add(14, 'days'),
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });
    </script>

    <script>
        $(function () {
            $('input[name="times"]').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                minDate: moment(),
                minMinute: 90,
                opens: 'left',
                locale: {
                    format: 'HH:mm'
                }
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
            });
        });
    </script>

    <script>
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

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')

<!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
