<!DOCTYPE html>
<html>
<head>
	<title>Page requête</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="autocompletion.css">
</head>

<body>

	<header>
		<?php include('header.php')?>
	</header>
	<main class="elementMain">

		<?php 

			require "config.php";

			if(isset($_GET['id'])){$data = $search->getRequestInfo($_GET['id']);} 			

		?>

		<div id="searchDisplay">

			<?php 

			if(isset($data)){?>

				<table>
					<thead>
						<tr>
							<th>Id</th>
							<th>Code</th>
							<th>Alpha 2</th>
							<th>Alpha 3</th>
							<th>Nom en anglais</th>
							<th>Nom en français</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $data['id'] ?></td>
							<td><?php echo $data['code'] ?></td>
							<td><?php echo $data['alpha2'] ?></td>
							<td><?php echo $data['alpha3'] ?></td>
							<td><?php echo $data['nom_en_gb'] ?></td>
							<td><?php echo $data['nom_fr_fr'] ?></td>
						</tr>
					</tbody>
				</table>
			
			<?php } ?>
			
		</div>
		
	</main>
	<footer>
		
	</footer>
				

	<style type="text/css">

	</style>
	
	<script type="text/javascript" src="autocompletion.js"></script>
</body>
</html>
