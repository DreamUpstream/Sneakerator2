<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakerator</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/img/favicon.ico') }}">
    <link rel="stylesheet" href=" {{ mix('css/app.css') }} ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <script>
        const ROOT_URL = '{{url('/')}}'
    </script>
    @stack('links')
</head>
<body>
    <div id="app"></div>
</body>
    <script src="{{ mix('js/main.js') }}"></script>
    @stack('scripts')
</html>