<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>

        @include('partials._nav')

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
