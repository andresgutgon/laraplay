<div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
  <button @click="open = true" type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
    <span class="sr-only">Open sidebar</span>
    <x-heroicon-o-bars-2 class="h-6 w-6" />
  </button>

  <div class="flex flex-1 items-center justify-end gap-x-4 self-stretch lg:gap-x-6">
    <livewire:layout.app.profile-menu />
  </div>
</div>
