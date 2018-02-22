<!DOCTYPE html>
<html>
<head>
	<title>{{'CRUD Laravel'}}</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
	<div class="container" style="width: 700px; text-align: center; margin-top: 20px;">
		@yield('content')
	</div>
	@stack('scripts')
</body>
</html>