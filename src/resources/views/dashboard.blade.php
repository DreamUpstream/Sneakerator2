<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="user-name" content="{{ Auth::user()->name }}">
    
    <meta name="user-id" content="{{ Auth::user()->id }}">
    <meta name="user-profit" content="{{ Auth::user()->profit_margin }}">
    
    <meta name="user-email" content="{{ Auth::user()->email }}">
    <meta name="user-password" content="{{ Auth::user()->password }}">
    <title>Sneakerator</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/favicon.ico') }}">
    <link rel="stylesheet" href=" {{ mix('css/dashboard.css') }} ">

    <script>
        const ROOT_URL = '{{url('/')}}'
    </script>
</head>
<body>
    <div id="app"></div>
</body>
    <script src="{{ mix('js/dashboard.js') }}"></script>
</html>