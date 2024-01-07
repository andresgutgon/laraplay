@props([
  'weight' => null,
  'color' => null,
])
<x-ds.text.base {{ $attributes }} font='h2' :weight=$weight :color=$color>
  {{ $slot }}
</x-ds.text.base>
