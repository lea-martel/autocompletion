<!DOCTYPE html>
<html>
<head>
	<title>Recherche</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="autocompletion.css">
</head>

<body>

	<header>
		<?php include('header.php')?>
	</header>
	<main>

		<?php 

			require "config.php";

			$recherche = isset($_GET['search']) ? $_GET['search'] : '';
			if(isset($_GET['search'])){$data = $search->getSearch($recherche);} 			

		?>

		<div id="searchDisplay" class="searchDisplay">

			<?php 

			if(isset($data)){echo $data;} 

			?>
			
		</div>
		
	</main>
	<footer>
		
	</footer>
				

	<style type="text/css">

	</style>
	
	<script type="text/javascript" src="autocompletion.js"></script>
</body>
</html>