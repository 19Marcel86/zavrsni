<!DOCTYPE html>
<html lang="hr">
<head>
    <?php include "inc/links.html"?>
    <title>Balkan Score &ndash; Klub</title>
</head>
<body>
    <?php include "inc/header.php"?>

    <div class="main container-fluid">
<?php
    $url = "https://www.thesportsdb.com/api/v1/json/3/eventslast.php?id=" . $_GET["idTeam"];
    ini_set("allow_url_fopen", 1);
    $rezultati = json_decode(file_get_contents($url))->results;
?>
<?php if (gettype($rezultati) == "string" || !isset($rezultati)): ?>
    <div class='alert alert-warning'>
        Greška: klub nije odabran ili su podaci nedostupni.
    </div>
<?php else: ?>
    <h1><?=$rezultati[0]->strHomeTeam?> &ndash; <?=$rezultati[0]->strLeague?></h1>

    <h2>Nedavne utakmice</h2>

<?php
$div = "
<div class='card my-3'>
    <div class='card-header'>
        <h5 class='card-title'>%s</h5>
    </div>
    <div class='card-body'>
        <h5><img class='klub-badge' src='%s'> %s - %s <img class='klub-badge' src='%s'></h5>
        <p>%s, %s</p>
    </div>
</div>";
foreach($rezultati as $rezultat){
    $datumVrijeme = $rezultat->dateEventLocal . " " . $rezultat->strTimeLocal;

    printf(
        $div, $rezultat->strEvent,
        $rezultat->strHomeTeamBadge, $rezultat->intHomeScore, $rezultat->intAwayScore, $rezultat->strAwayTeamBadge,
        $rezultat->strVenue, date("d.m.Y H:i", strtotime($datumVrijeme)));
}
?>

<?php endif; ?>
    </div>

    <?php include "inc/footer.html"?>
</body>
</html>
