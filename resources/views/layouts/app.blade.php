<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Axelan | Boka plats</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.8.0/sweetalert2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('spec_css')
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
    <header>
        @include('includes.menu')
    </header>
    <div class="container">
      <div class="row">
        @yield('content')
      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.8.0/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.8.0/sweetalert2.js"></script>
    <script src="{{ ('js/app.js') }}"></script>
    <script src="{{ ('js/custom.js') }}"></script>
    @include('includes.messages')
    @include('includes.modals.showplace')
    @include('includes.modals.roles')
    </body>
</html>