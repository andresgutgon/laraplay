<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    @include('layouts.includes.font')
    @include('layouts.includes.assets')
</head>

<body>
    @include('stories.'. $component)
</body>
</html>
