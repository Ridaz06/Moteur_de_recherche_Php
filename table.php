
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
    for ($char = 'A'; $char <= 'Y'; $char++){
      if ($dossier = opendir('./Base Alpha/'.$char.'/')){
        while (false !== ($fichier = readdir($dossier))){

          $pNom = trim($pNom);
          $pPrenom = trim($pPrenom);
          $pLieu = trim($pLieu);
          //Encodage du nom du fichier en utf8 afin d'éviter les problèmes d'accent
          //SI le nom du fichier contient au moins un des critères de recherche on travaille sur la fiche
          $fichierTempo = utf8_encode($fichier);
          if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php'&& ( stristr($fichierTempo, $pNom)
          || stristr($fichierTempo, $pPrenom) || stristr($fichierTempo, $pLieu)) ){

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

            if (@strstr('nn ', $prenom))
            $prenom = 'nn*';

            $valid =  true;
            $nomTempo = utf8_encode($nom);
            if ($pNom != '@')
              if (!stristr($nomTempo, $pNom))
                $valid = false;

            if ($valid){
              //Recupération du lieu si il est dans la nom du fichier
              if (strstr($fichier, '_')){
                $region = substr($nomFichier, $pos);
                $region = substr($region, 1);
              } else {
                $region = 'Inconnu';
              }

              $regionTempo = utf8_encode($region);
              if ($pLieu != '@')
                if (!(strtolower($regionTempo) === strtolower($pLieu)))
                  $valid = false;

              if ($valid) {
                //Recupération du prénom
                if (strstr($fichier,'_')){
                  $prenom = $nomFichier;
                  $prenom = substr($prenom, strlen($nom) + 1);
                  $pos = strpos($prenom, ' ');
                  $prenom = substr($prenom,0,-1*strlen($region));
                } else {
                  $prenom = $nomFichier;
                  $prenom = substr($prenom, strlen($nom) + 1);
                }

                $prenomTempo = utf8_encode($prenom);
                if ($pPrenom != '@')
                  if (!stristr($prenomTempo, $pPrenom))
                    $valid = false;

                  //Si tous les critères sont valides on affiche la fiche
                  if ($valid == true){
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
          }
        }
      }
    }

	if ($dossier = opendir('./Base Alpha/Z/')){
    while (false !== ($fichier = readdir($dossier))){

      $pNom = trim($pNom);
      $pPrenom = trim($pPrenom);
      $pLieu = trim($pLieu);
      //Encodage du nom du fichier en utf8 afin d'éviter les problèmes d'accent
      $fichierTempo = utf8_encode($fichier);
      //SI le nom du fichier contient au moins un des critères de recherche on travaille sur la fiche
      if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php'&& ( stristr($fichierTempo, $pNom)
      || stristr($fichierTempo, $pPrenom) || stristr($fichierTempo, $pLieu)) ){

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

        if (@strstr('nn ', $prenom))
        $prenom = 'nn*';

        $valid =  true;
        $nomTempo = utf8_encode($nom);
        if ($pNom != '@')
          if (!stristr($nomTempo, $pNom))
            $valid = false;

        if ($valid){
          //Recupération du lieu si il est dans la nom du fichier
          if (strstr($fichier, '_')){
            $region = substr($nomFichier, $pos);
            $region = substr($region, 1);
          } else {
            $region = 'Inconnu';
          }

          $regionTempo = utf8_encode($region);
          if ($pLieu != '@')
            if (!(strtolower($regionTempo) === strtolower($pLieu)))
              $valid = false;

          if ($valid) {
            //Recupération du prénom
            if (strstr($fichier,'_')){
              $prenom = $nomFichier;
              $prenom = substr($prenom, strlen($nom) + 1);
              $pos = strpos($prenom, ' ');
              $prenom = substr($prenom,0,-1*strlen($region));
            } else {
              $prenom = $nomFichier;
              $prenom = substr($prenom, strlen($nom) + 1);
            }

            $prenomTempo = utf8_encode($prenom);
            if ($pPrenom != '@')
              if (!stristr($prenomTempo, $pPrenom))
                $valid = false;

              //Si tous les critères sont valides on affiche la fiche
              if ($valid == true){
                $nbFichier++;
                echo utf8_encode('<tr>
                <td>' .$nbFichier.'</td>
                <td>' .$nom. '</td>
                <td>' .$prenom. '</td>
                <td>' .$region . '</td>
                <td > <a href="Base%20Alpha/Z/'.$fichier.'" onclick="window.open(this.href);
                return false;" > Voir la fiche </a> </td> </tr>');
            }
          }
        }
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
