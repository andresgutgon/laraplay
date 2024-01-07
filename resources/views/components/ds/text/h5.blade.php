@props([
  'weight' => null,
  'color' => null,
])
<x-ds.text.base {{ $attributes }} font='h5' :weight=$weight :color=$color>
  {{ $slot }}
</x-ds.text.base>
