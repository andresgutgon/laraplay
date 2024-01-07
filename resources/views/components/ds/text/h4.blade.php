@props([
  'weight' => null,
  'color' => null,
])
<x-ds.text.base {{ $attributes }} font='h4' :weight=$weight>
  {{ $slot }}
</x-ds.text.base>
