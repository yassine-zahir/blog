var myVar = setInterval(myTimer, 1000);

function myTimer() {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'  };
  var d = new Date();
  var t = d.toLocaleTimeString('ar-fr', options);
  document.getElementById("clock").innerHTML = t;
}

function confirm(){
  return confirm ("vous etes sur que vous voulez supprimer cet article ?")
}
function confirmed()
{
  alert ("votre mot de pass n est pas identique")
}
