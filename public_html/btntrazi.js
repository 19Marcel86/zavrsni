var comboKlubovi = document.getElementById("klub");
comboKlubovi.value = "";

document.getElementById("btntrazi").addEventListener("click", function(){
    location.href = "klub.php?idTeam=" + comboKlubovi.dataset.idTeam;
});
