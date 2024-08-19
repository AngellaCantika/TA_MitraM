<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @include('layouts.user.mainUser')
</head>

<body>
    @include('layouts.user.headerUser')
    <main>
        @yield('content')
    </main>
</body>

</html>