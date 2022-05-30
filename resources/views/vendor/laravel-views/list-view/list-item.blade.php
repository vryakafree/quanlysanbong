@props(['username', 'fieldname', 'startat', 'endat', 'paid', 'bill', 'phone','actions', 'model'])

<div>
    <div class="card-body">
  <div class="flex items-center space-x-4 ">
    <div name="user">
        {!! $username !!}
    </div>
      <div class="text-sm" name="field">
        {!! $fieldname !!}
      </div>
      <div class="text-sm" name="startat">
        {!! $startat !!}
      </div>
        <div class="text-sm" name="endat">
            {!! $endat !!}
        </div>
      @if ($paid==1)
          <div class="text-sm" style="color:#4BB543" name="paid">
              <b>đã thanh toán</b>
          </div>
      @else
          <div class="text-sm" style="color:#ff0000" name="paid">
              <b>chưa thanh toán</b>
          </div>
      @endif
        <div class="text-sm" name="bill">
            {!! $bill !!}
        </div>
        <div class="text-sm" name="phone">
            {!! $phone !!}
        </div>
    <x-lv-actions :actions="$actions" :model="$model" />
  </div>
    </div>
</div>
