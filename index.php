<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="autocompletion.css">
</head>
<body>
	<main>

		<section class="searchHome">

			<div class="img"><img src="logo.png" width = "900"></div>

			<form action="index.php" method="POST" class="formHome">

				<input type="search" name="search" class="input" id="searchHome" autocomplete="off">
				<button type="submit" id="submitHome" class="btn"><i class="far fa-search"></i></button>
				
			</form>

		</section>
		
	</main>
	<footer>
		
	</footer>
	
	<script type="text/javascript" src="autocompletion.js"></script>
</body>
</html>