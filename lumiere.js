function lum() {
  // body...
  if ($('#boutonLum').is('.corpsAllume')){
    $('#boutonLum').removeClass('corpsAllume').addClass('corpsEteind');
    $('#body').removeClass('bodyAllume').addClass('bodyEteind');
    $('#bouton').replaceWith('		<a class="boutonEteind" id="bouton" href="#" onclick="return lum()">Allumer la lumiere</a>');
    $('#bouton').removeClass('lienAllume').addClass('lienEteind');
  } else {
    $('#boutonLum').removeClass('corpsEteind').addClass('corpsAllume');
    $('#body').removeClass('bodyEteind').addClass('bodyAllume');
    $('#bouton').replaceWith('<a class="boutonAllume" id="bouton" href="#" onclick="return lum()">Eteindre la lumiere</a>');
    $('#bouton').removeClass('lienEteind').addClass('lienAllume');
  }

  return false;
}
