@props([
  'image' => '',
  'fieldname' => '',
  'cost' => '',
  'type' => '',
  'withBackground' => false,
  'model',
  'actions' => [],
  'hasDefaultAction' => false,
  'selected' => false
])

<div class="{{ $withBackground ? 'rounded-md shadow-md' : '' }}">
  @if ($hasDefaultAction)
    <a href="#!" wire:click.prevent="onCardClick({{ $model->id }})">
      <img src="{{ $image }}" alt="{{ $image }}" class="hover:shadow-lg cursor-pointer rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }} {{ $selected ? variants('gridView.selected') : "" }}">
    </a>
  @else
    <img src="{{ $image }}" alt="{{ $image }}" class="rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }}  {{ $selected ? variants('gridView.selected') : "" }}">
  @endif

  <div class="pt-4 {{ $withBackground ? 'bg-white rounded-b-md p-4' : '' }}">
    <div class="flex items-start">
      <div class="flex-1">
        <h3 class="font-bold leading-6 text-gray-900">
          @if ($hasDefaultAction)
            <a href="#!" class="hover:underline" wire:click.prevent="onCardClick({{ $model->getKey() }})">
              {!! $fieldname !!}
            </a>
          @else
            {!! $fieldname !!}
          @endif
        </h3>
        @if ($cost)
          <span class="text-sm text-gray-600">
            {!! $cost !!}/phút
          </span>
        @endif
      </div>

      @if (count($actions))
        <div class="flex justify-end items-center">
          <x-lv-actions.drop-down :actions="$actions" :model="$model" />
        </div>
      @endif
    </div>
      <p class="line-clamp-3 mt-2">
          Số lượng: {!! $type !!}
      </p>
  </div>

</div>
