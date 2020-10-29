<!DOCTYPE html>
<html lang="en">
<head>
    @include('partial._head')
</head>
<body>
@include('partial._header')
@yield('content')
@include('partial._footer')
<div class="se-pre-con"></div>
@include('partial._script')
</body>
</html>