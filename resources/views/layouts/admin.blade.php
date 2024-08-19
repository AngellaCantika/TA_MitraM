<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @include('layouts.admin.mainAdmin')
</head>

<body>
    @include('layouts.admin.headerAdmin')
    <main>
        @yield('content')


    </main>
        {{-- main.js script --}}
        <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>