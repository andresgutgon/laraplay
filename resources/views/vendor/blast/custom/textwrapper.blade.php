@php
  $start = "<x-ds.text.h".$tag.">";
  $end = "</x-ds.text.h".$tag.">";
@endphp

<div class="flex flex-col gap-y-1 border border-gray-200 p-2 rounded-md">
  <div>
    <div class="inline-block bg-gray-100 rounded-md px-2">
      <x-ds.text.h6>
        {{$start}}
      </x-ds.text.h6>
    </div>
  </div>
  <div>{{$slot}}</div>
  <div>
    <div class="inline-block bg-gray-100 rounded-md px-2">
      <x-ds.text.h6>
        {{$end}}
      </x-ds.text.h6>
    </div>
  </div>
</div>
