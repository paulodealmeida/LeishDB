<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.head')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!-- Navigation
    ==========================================-->
	<nav id="menu" class="navbar navbar-default navbar-fixed-top">
		@include('includes.menu')
	</nav>

	@yield('content')

	<div id="footer">
		@include('includes.footer')
	</div>

	@include('includes.scripts')

</body>

</html>