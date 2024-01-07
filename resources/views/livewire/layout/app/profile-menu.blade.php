<div class="relative">
  <button type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
    <span class="sr-only">Open user menu</span>
    <img class="h-8 w-8 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
    <span class="hidden lg:flex lg:items-center lg:ml-4">
      <x-ds.text.h4 weight='medium' aria-hidden="true">Tom Cook</x-ds.text.h4>
      <x-heroicon-o-chevron-down class="ml-2 h-4 w-4 text-gray-400" />
    </span>
  </button>

  <!--
    Dropdown menu, show/hide based on menu state.

    Entering: "transition ease-out duration-100"
    From: "transform opacity-0 scale-95"
    To: "transform opacity-100 scale-100"
    Leaving: "transition ease-in duration-75"
    From: "transform opacity-100 scale-100"
    To: "transform opacity-0 scale-95"
  -->
  <div class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
    <!-- Active: "bg-gray-50", Not Active: "" -->
    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">Your profile</a>
    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-1">Sign out</a>
  </div>
</div>
