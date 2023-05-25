<!DOCTYPE html>
<html>
<head>
	<title>Election Age Verifier</title>
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
	<center><br><br><br><br><br><br><br>
		<h1>Election Age Verifier</h1>
		<form method="POST" action="/ageVerifier">
			@csrf
			<label for="ageVerifier">Enter Your Age: </label>
			<input type="number" id="ageVerifier" name="InputAge" min="1" required autofocus /><br><br><br>
			<button type="submit">Check Age </button><br>

			
			
		</form>
		@if ($age == 0)
			Put a number First
		@elseif ($age < 15)
			Not Eligible to vote
		@elseif ($age < 18 )
			Eligible to vote in SK Election
		@else
			Eligible to vote National Election

		@endif

		<br>
			<p style="color: red;">{{$age}}</p>
	</center>



</body>
</html>

