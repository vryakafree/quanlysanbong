@props(['username', 'fieldname', 'startat', 'endat', 'paid', 'bill', 'phone','actions', 'model'])

<div>
    <div class="card-body">
  <div class="flex items-center justify-between space-x-8 ">
      @if ($username==Auth::user()->name)
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
              <div class="text-sm" style="color:#93b543" name="paid">
                  <b>Chuyển Khoảng</b>
              </div>
          @else
              <div class="text-sm" style="color:#ec971f" name="paid">
                  <b>TT Trực Tiếp</b>
              </div>
          @endif
          <div class="text-sm" name="bill">
              {!! $bill !!}
          </div>
          <div class="text-sm" name="phone">
              {!! $phone !!}
          </div>
      @else
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
              <div class="text-sm" style="color:#93b543" name="paid">
                  <b>Chuyển Khoảng</b>
              </div>
          @else
              <div class="text-sm" style="color:#ec971f" name="paid">
                  <b>TT Trực Tiếp</b>
              </div>
          @endif
          <div class="text-sm" name="bill">
              {!! $bill !!}
          </div>
          <div class="text-sm" name="phone">
              ##########
          </div>
      @endif

    <x-lv-actions :actions="$actions" :model="$model" />
  </div>
    </div>
</div>
