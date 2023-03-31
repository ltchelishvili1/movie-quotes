<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://fonts.cdnfonts.com/css/sansation" rel="stylesheet">
</head>

<style>
    @import url('https://fonts.cdnfonts.com/css/sansation');

    body {
        font-family: sansation;
    }
</style>

<body>
    <x-languages />
    <div class="background-radial-gradient w-full h-full h-screen flex items-center justify-center">
        {{$slot}}
    </div>
</body>

</html>