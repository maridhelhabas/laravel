<!DOCTYPE html>
<html>
<head>
	<title>Conditional Page</title>
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
	<h1>This is the Condition Page</h1>
	@if(strlen($name) > 0)
	    True: The length of John Wick > 0
	@else
	    False:
	@endif

</body>
</html>
