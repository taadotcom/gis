<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>กลุ่มงานสารสนเทศภูมิศาสตร์และสื่อประสมเพื่อการบริหาร ศทก.</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Sarabun' rel='stylesheet'>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body>
    <div id="app"></div>
</body>

</html>
