var inNom = document.getElementById('nom');
var textNom = document.getElementById('textNom');

var inPrenom = document.getElementById('prenom');
var textPrenom = document.getElementById('textPrenom');

var inLieu = document.getElementById('lieu');
var textLieu = document.getElementById('textLieu');

inNom.addEventListener('change', function () {
  // body...
  if (inNom.value.length != 0 && inNom.value.length < 4){
    textNom.style.display = 'inline';
    inNom.style.border = 'red 1px solid';
  }
  else {
    textNom.style.display = 'none';
    inNom.style.border = '';
  }
}, true);

inPrenom.addEventListener('change', function () {
  // body...
  if (inPrenom.value.length != 0 && inPrenom.value.length < 4){
    textPrenom.style.display = 'inline';
    inPrenom.style.border = 'red 1px solid';
  }
  else {
    textPrenom.style.display = 'none';
    inPrenom.style.border = '';
  }
}, true);

inLieu.addEventListener('change', function () {
  // body...
  if (inLieu.value.length != 0 && inLieu.value.length < 4){
    textLieu.style.display = 'inline';
    inLieu.style.border = 'red 1px solid';
  } else {
    textLieu.style.display = 'none';
    inLieu.style.border = '';
  }

}, true);
