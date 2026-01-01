<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Base58 Gateway - @yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
</head>

<body>
    <header>
        <h1>Fiat-SEPA Gateway Control</h1>

        <div class="link">
            <a href="/">Dashboard</a>
            <a href="/insert">New Payment</a>
            <a href="/insertGenre">Manage Nodes</a>
        </div>
    </header>
    
    <main>
        @yield("main")
    </main>
</body>
</html>
