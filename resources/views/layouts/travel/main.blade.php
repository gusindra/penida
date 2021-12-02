<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.travel.css')

</head>

<body id="page-top">
	<!--Preload-->
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

    @include('layouts.travel.header')

    @yield('content')

    <!-- ****** Footer Area Start ****** -->
    @include('layouts.travel.footer')
    <!-- ****** Footer Area End ****** -->

    @include('layouts.travel.js')
    @yield('js')

</body>
</html>
