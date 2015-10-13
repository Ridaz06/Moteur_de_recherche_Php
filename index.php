<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>Page de recherche</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<body id="body" class="bodyAllume">

	<div id="bouton" class="boutonAllume">
		<a class="lienAllume" id="bouton" href="#" onclick="return lum()">Eteindre la lumiere</a>
	</div>

	<div class="corpsAllume" id="boutonLum">
		<h1>Rechercher des fiches généalogiques</h1>
		<HR width=100% noshade size=1>  </HR>
		<p>
				Fiche à rechercher:
		</p>

			<!-- Formulaire de la page -->
		<form method="get" action="recherche.php" class="formulaire" >
			<label for="nom" class="labelRecherche"> Nom :</label> <input id = "nom" type="text" name="nom"/> </br></br>
			<label for="prenom" class="labelRecherche"> Prenom :</label> <input id ="prenom" type="text" name="prenom"/> </br></br>
			<label for="lieu" class="labelRecherche"> Lieu :</label> <input id="lieu" type="text" name="lieu"/> </br></br>
			<!--Contient les boutons submit et reset et les centre-->
			<div class="buttonDiv">
				<input type="submit" value="Chercher" class="bChercher" onclick="return envoyer()"/>
				<input type="reset" value ="Vider les champs" class="bReset" onclick="resetForm()">
			</div>
		</form>
		<br />
		<HR width=100% noshade size=1>  </HR>

		<!--Annotation de la page-->
		<form method="get" action="recherche.php" class="formulaire">
			<label whidth="300px" for="listLettre">Liste des noms commencent par la lettre </label>
			<select name="listLettre">
				<?php
				for ($c='A'; $c < 'Z'; $c++){
					echo '<option value="'.$c.'">'.$c.'</option>';
				}
				?>
				<option value="Z">Z</option>
			</select>
			<input type="submit" value="Voir">
		</form>
	</div>

	<script src="script.js" charset="utf-8"></script>
	<script src="lumiere.js" charset="utf-8"></script>
</body>
