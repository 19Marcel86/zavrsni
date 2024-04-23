<header class="mb-3 py-2">
<script>
window.addEventListener("DOMContentLoaded", function(){
    var comboKlubovi = document.getElementById("klub");
    comboKlubovi.addEventListener("input", function(){
        var klubovi = document.forms[0].elements[0].list.options;
        for (var klub of klubovi) {
            if (klub.value == comboKlubovi.value) {
                comboKlubovi.value = klub.label;
                comboKlubovi.dataset.idTeam = klub.value;
            }
        };
    });
});
</script>

<nav class="navbar navbar-expand-lg">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php">
        <img src="favicon.ico" alt="favicon" style="width: 30px;">
        Balkan Score</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="bi bi-star-fill"></i> Početna</a>
        </li>
                <li class="nav-item">
            <a class="nav-link" href="klub.php">
                <i class="bi bi-person-lines-fill"></i> Klub</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="poredak.php">
                <i class="bi bi-award"></i> Poredak</a>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="btntema">
                <i class="bi bi-moon-stars-fill"></i> Tema
            </button>
        </li>
    </ul>
    <form class="d-flex">
        <datalist id="klubovi-datalist">
<?php
    $url = "https://www.thesportsdb.com/api/v1/json/3/search_all_teams.php?s=Soccer&c=Croatia";
    ini_set("allow_url_fopen", 1);
    $klubovi = json_decode(file_get_contents($url));

    foreach($klubovi->teams as $klub) {
        echo "<option value='$klub->idTeam' label='$klub->strTeam'>$klub->strTeam</option>";
    }
?>
            </datalist>
        <input list="klubovi-datalist" id="klub"  class="form-control me-2" type="search" placeholder="Klub..." name="idTeam">
        <button class="btn btn-outline-success" type="button" style="white-space: nowrap;" id="btntrazi">
            <i class="bi bi-search"></i> Traži</button>
    </form>
    </div>
</div>
</nav>
</header>
