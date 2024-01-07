<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    @include('layouts.includes.font')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="font-sans antialiased h-full">
    <div x-data="{ open: false }" x-on:keydown.escape="open = false">
      <livewire:layout.app.mobile-menu />
      <livewire:layout.app.desktop-menu />

      <div class="lg:pl-72">
        <livewire:layout.app.header />

        <main class="py-10 px-4 sm:px-6 lg:px-8">
          {{ $slot }}
        </main>
      </div>
    </div>
  </body>
</html>
