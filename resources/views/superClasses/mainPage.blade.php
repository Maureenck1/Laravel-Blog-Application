<!DOCTYPE html>
<html>

{{-- Including the head template with the head information. --}}

@include('sharedCode.head')
{{-- C:\wamp64\www\Laravel-Blog-Application\resources\views\sharedCode\head.blade.php --}}
<body>
    @include('sharedCode.navigation')
    @yield('content')
    @include('sharedCode.footer')
    @include('sharedCode.javascript')
    @include('sharedCode.ckEditor')
    @include('ckfinder::setup')
    @include('sweetalert::alert')
</body>

</html>    