@storybook([
  'layout' => 'fullscreen',
])
@php
  $text = "Everyone has the right to rest and leisure, including reasonable limitation of working hours and periodic holidays with pay.";
@endphp

<div class="p-6 gap-y-4 flex flex-col">
  <x-textwrapper tag='1'>
    <x-ds.text.h1>
      {{ $text }}
    </x-ds.text.h1>
  </x-textwrapper>

  <x-textwrapper tag='2'>
    <x-ds.text.h2>
      {{ $text }}
    </x-ds.text.h2>
  </x-textwrapper>

  <x-textwrapper tag='3'>
    <x-ds.text.h3>
      {{ $text }}
    </x-ds.text.h3>
  </x-textwrapper>

  <x-textwrapper tag='4'>
    <x-ds.text.h4>
      {{ $text }}
    </x-ds.text.h4>
  </x-textwrapper>

  <x-textwrapper tag='5'>
    <x-ds.text.h5>
      {{ $text }}
    </x-ds.text.h5>
  </x-textwrapper>

  <x-textwrapper tag='6'>
    <x-ds.text.h6>
      {{ $text }}
    </x-ds.text.h6>
  </x-textwrapper>
</div>
