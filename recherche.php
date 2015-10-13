<!DOCTYPE html>


<html lang="fr" id="container">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Resultat de recherche</title>

	<link rel="stylesheet" type="text/css" href="dataTables.autoFill.css">
  <link rel="stylesheet" type="text/css" href="jquery.dataTables.css">
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="dataTables.autoFill.js"></script>
  <script type="text/javascript" src="jquery.dataTables.js"></script>
</head>

<body >
<script type="text/javascript">
	 $(document).scroll(function(){
		 posScroll = $(document).scrollTop();
		if(posScroll >=200)
			$("div#toTop").fadeIn();
		else
			$("div#toTop").fadeOut();
	 });
</script>
	<div id="toTop">
			<a class="lienTop" href="#">Remonter</a>
	</div>

	<div id="corpsTable">
		<h1 id="top">Resultat de la recherche</h1>

		<p>
		<?php
		if (isset($_GET['listLettre'])){
			$char = $_GET['listLettre'];
			echo utf8_encode('Liste des noms commencent par: '.$char.'.<br/>');
			?>
			<form method="get" action="index.php">
			<br />  <input type="submit" value="Retour à la recherche">
			</form>
			<br />
			<?php
			include("listRecherche.php");
		} else {
			echo 'Resultat de la recherche suivante <strong>: </strong><br />';
		?>
		</p>

		<?php
				$pNom = $_GET['nom'];
				$pPrenom = $_GET['prenom'];
				$pLieu = $_GET['lieu'];

				if (empty($pNom))
				$pNom = '@';
				else
				echo 'Nom: <strong>'.$pNom.'</strong><br />';

				if (empty($pPrenom))
				$pPrenom = '@';
				else
				echo 'Prenom: <strong>'.$pPrenom.'</strong><br/>';

				if (empty($pLieu))
				$pLieu = '@';
				else
				echo 'Lieu: <strong>'.$pLieu.'</strong><br />';

					?>
					<form method="get" action="index.php">
					<br />  <input type="submit" value="Retour à la recherche">
					</form>
					<br />
					<?php
					include("table.php");

			}
				?>
				<form method="get" action="index.php">
				<br />  <input type="submit" value="Retour à la recherche">
				</form>
				<?php
		?>
	</div>
</body>
