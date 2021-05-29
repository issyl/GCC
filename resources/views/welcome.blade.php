<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
    
    <title>LLL Tournament</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="app"></div>
</body>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</html>