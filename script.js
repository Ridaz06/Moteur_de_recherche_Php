function resetForm(){

  var inNom = document.getElementById('nom');
  var textNom = document.getElementById('textNom');

  var inPrenom = document.getElementById('prenom');
  var textPrenom = document.getElementById('textPrenom');

  var inLieu = document.getElementById('lieu');
  var textLieu = document.getElementById('textLieu');

  inPrenom.style.border = '';
  inNom.style.border = '';
  inLieu.style.border = '';

  textNom.style.display = 'none';
  textPrenom.style.display = 'none';
  textLieu.style.display = 'none';


  return false;
}

function envoyer(){
  var inNom = document.getElementById('nom');
  var textNom = document.getElementById('textNom');

  var inPrenom = document.getElementById('prenom');
  var textPrenom = document.getElementById('textPrenom');

  var inLieu = document.getElementById('lieu');
  var textLieu = document.getElementById('textLieu');

  var validNom = true;
  var validPrenom = true;
  var validLieu = true;

  if (inNom.value.length == 0 && inPrenom.value.length == 0 && inLieu.value.length == 0){
    alert('Veuillez remplir au moins un champ');
    return false;
  }

  if (validNom && validPrenom && validLieu)
    return true;
  else {
    alert('Veuillez remplir correctement tous les champs !');
    return false;
  }
}
