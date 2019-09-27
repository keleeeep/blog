<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body class="background">

        @include('partials._nav')

        {{--@component('components.who')--}}
        {{--@endcomponent--}}

        <!-- main-content -->
        <div class="container">
            @include('partials._messages')
            @yield('content')
        </div>
        <br/>
        <!-- end-main-content -->

        @include('partials._footer')
        @include('partials._javascript')
        @yield('scripts')
    </body>
</html>
