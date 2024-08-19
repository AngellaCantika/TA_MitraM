<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mekanik Dashboard</title>
    @include('layouts.mekanik.mainMekanik')
</head>

<body>
    @include('layouts.mekanik.headerMekanik')
    <main>
        @yield('content')
    </main>
</body>

</html>