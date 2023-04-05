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

<body class="background-radial-gradient">
    @auth
    <div class="fixed flex right-0 mt-2">
        <a class="bg-gray-600 p-4 rounded-lg mr-3 hover:bg-gray-400" href="{{route("home")}}">{{__('validation.back_to_home')}}</a>
        <a class="bg-gray-600 p-4 rounded-lg hover:bg-gray-400" href="{{route("adminpanel")}}">{{__('validation.admin_panel')}}</a>
        <a class="bg-gray-600 p-4 rounded-lg ml-3 mr-3 hover:bg-gray-400" href="{{route("logout")}}">{{__('validation.logout')}}</a>
    </div>
    @endauth
    <x-languages />
    <div>
        {{$slot}}
    </div>
</body>

</html>