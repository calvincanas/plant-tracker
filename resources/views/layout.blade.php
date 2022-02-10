<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plant Tracker</title>
        <style>
            #table-for-plants td {
                text-align: center;
                vertical-align: middle;
            }
            #table-for-plants td img {
                display:block; margin:0 auto;
            }
        </style>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
    <div class="container mx-auto">
        @yield('content')
    </div>
    </body>
</html>
