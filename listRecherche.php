
<script>
$(document).ready(function() {
  var table = $('#tableResult').dataTable();

  new $.fn.dataTable.AutoFill( table, {
    "columnDefs": [
      { enable:    false, targets: [-1, -2] },
      { increment: false, targets: 3 }
    ]
  } );
} );
</script>

<table id="tableResult" class="display" cellspacing="0">
  <thead>
    <tr>
        <th>n</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Lieu</th>
        <th>Lien</th>
    </tr>
  </thead>

  <tfoot>
    <tr>
        <th>n</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Lieu</th>
        <th>Lien</th>
    </tr>
  </tfoot>
  <tbody>
    <?php
    mb_internal_encoding('UTF-8');
    $nbFichier = 0;
        if ($dossier = opendir('./Base Alpha/'.$char.'/')){
            while (false !== ($fichier = readdir($dossier))){
                if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php' ){

					//Supression de l'extension du fichier
                    $pos = strpos($fichier, '.');
                    $nomFichier = substr($fichier, 0, $pos);
					//Supression des parenthèses
                    if (strstr($nomFichier, '(')){
                        $pos = strpos($nomFichier, '(');
                        $nomFichier = substr($nomFichier, 0, $pos);
                    }

					//On recupère le nom
                    $nomFichier = str_replace('_', ' ', $nomFichier);
                    $pos = strpos($nomFichier, ' ');
                    $nom = substr($nomFichier,0, $pos);
                    $pos = strpos($fichier, '_');


					//Recupération de la region si elle est dans la nom du fichier
                    if (strstr($fichier, '_')){
                        $region = substr($nomFichier, $pos);
                        $region = substr($region, 1);

						//Recuperation du prénom
                        $prenom = $nomFichier;
                        $prenom = substr($prenom, strlen($nom) + 1);
                        $pos = strpos($prenom, ' ');
                        $prenom = substr($prenom,0,-1*strlen($region));

                    } else {
                        $region = 'Inconnu';
                        $prenom = $nomFichier;
                        $prenom = substr($prenom, strlen($nom) + 1);
                    }

      					if (@strstr('nn ', $prenom))
      						$prenom = 'nn*';


                  $nbFichier++;
                  echo utf8_encode('<tr>
                                      <td>' .$nbFichier.'</td>
                                      <td>' .$nom. '</td>
                                      <td>' .$prenom. '</td>
                                      <td>' .$region . '</td>
                                      <td > <a href="Base%20Alpha/'.$char.'/'.$fichier.'" onclick="window.open(this.href);
                                          return false;" > Voir la fiche </a> </td> </tr>');
                }
            }
        }
    closedir($dossier);
    ?>
</tbody>
 </table>

<?php
echo '<br /> Il y a ' . $nbFichier . ' résultat(s)  ';
echo '<br /> *nn = non nommé';
?>
