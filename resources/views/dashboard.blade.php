<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <input type="text" name="dates" />
    <script>
        $(function() {
            $('input[name="dates"]').daterangepicker({
                singleDatePicker: true,
                minDate: moment(),
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });
    </script>

    <input type="text" name="times"/>
    <script>
        $(function (){
            $('input[name="times"]').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                minDate: moment(),
                locale: {
                    format: 'HH:mm'
                }
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
            });
        });
    </script>
    <body>
    <div id="test"></div>
    <button id="addRow">AddRow</button>
    <button id="colorChange">Change Random Color</button>
    <button id="getData">getData</button>
    </body>
</x-app-layout>
