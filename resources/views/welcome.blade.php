<x-guest-layout>
  <div class="relative sm:flex sm:justify-center sm:items-center">
    <livewire:welcome.navigation />

    <div class="mx-auto p-6 lg:p-8">
      <div class="flex justify-center">
        <livewire:layout.app.logo />
      </div>

      <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
        <div class="ms-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-end sm:ms-0">
          Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
