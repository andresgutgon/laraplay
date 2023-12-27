<div x-cloak x-show="open" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
  <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."></div>

  <div class="fixed inset-0 flex">
    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative mr-16 flex w-full max-w-xs flex-1" @click.away="open = false">
      <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Close button, show/hide based on off-canvas menu state." class="absolute left-full top-0 flex w-16 justify-center pt-5">
        <button type="button" class="-m-2.5 p-2.5" @click="open = !open">
          <span class="sr-only">Close sidebar</span>
          <x-heroicon-o-x-mark class="h-6 w-6 text-white" />
        </button>
      </div>

      <!-- Sidebar -->
      <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4">
        <livewire:layout.app.logo />
        <nav class="flex flex-1 flex-col">
        </nav>
      </div>
    </div>
  </div>
</div>
