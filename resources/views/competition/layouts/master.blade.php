@include('competition.layouts.header')
@include('competition.layouts.nav')

@if ( ! Request::is('*enter*') )
	@include('competition.layouts.banner')
@endif

@yield('content')
@include('competition.layouts.sidebar')
@include('competition.layouts.footer')