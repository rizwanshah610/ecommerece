<html>
<head>
    {{--Scrf toke protection --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{--Site title--}}
    <title>Ecomerece</title>


    {{--Style--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{--Admin CSS--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">

    {{--Feather icons javascript--}}
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


    @include('inc.session_message')

    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')

    @include('admin.partials.middlebar')

    @yield('content')
</main>

{{--javascript--}}
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>
</html>
