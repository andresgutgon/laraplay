@props([
  'font' => 'h4',
  'weight' => 'normal',
  'color' => 'text-gray-900',
])

@php
  $fonts = [
    'h1' => 'text-4xl leading-h1',
    'h2' => 'text-h2 leading-10',
    'h3' => 'text-xl leading-8', // 20px/32px
    'h4' => 'text-base leading-6', // 16px/24px
    'h5' => 'text-sm leading-5', // 14px/20px
    'h6' => 'text-xs leading-4', // 12px/16px
  ];
  $weights = [
    'thin' => 'font-thin',
    'normal' => 'font-normal',
    'medium' => 'font-semibold',
    'bold' => 'font-bold'
  ];
@endphp

<span {{ $attributes }} @class([$fonts[$font], $weights[$weight], $color])>
  {{ $slot }}
</span>
