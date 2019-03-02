<html>
<head>
    {{--Scrf toke protection --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{--Site title--}}
    <title>Ecomerece</title>


    {{--Style--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{--Admin CSS--}}
    @yield('admin_css')

    {{--Feather icons javascript--}}
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <div>
        {{--@include('inc.navbar')--}}
    </div>
    <div>
        @include('inc.session_message')
    </div>
    <div class="row">
        @include('admin.partials.topnavbar');
        @include('admin.partials.navbar');
        @yield('content')
    </div>
{{--javascript--}}
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
