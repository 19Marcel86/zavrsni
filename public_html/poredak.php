<!DOCTYPE html>
<html lang="hr">
<head>
    <?php include "inc/links.html"?>
    <title>Balkan Score &ndash; Poredak</title>

    <style>
        td, th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <?php include "inc/header.php"?>

    <div class="main container-fluid">
        <h1>Poredak &ndash; Croatian First Football League</h1>

    <table class="table table-striped table-hover table-responsive">
<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $url = "https://www.thesportsdb.com/api/v1/json/3/lookuptable.php?l=4629&s=2023-2024";
    ini_set("allow_url_fopen", 1);
    $tablicaPoretka = json_decode(file_get_contents($url))->table;

    echo "<tr><th>RB</th> <th>Klub</th> <th></th> ",
        "<th>Odigranih</th> <th>Pobjeda</th> <th>Gubitaka</th> <th>Nerješeno</th> <th>Poena</th> </tr>";

    foreach ($tablicaPoretka as $redak) {
        printf("<tr><td>%s</td> <td><img class='klub-badge' src='%s'</td> <td>%s</td>
            <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>",
            $redak->intRank, $redak->strTeamBadge, $redak->strTeam, $redak->intPlayed, $redak->intWin, $redak->intLoss, $redak->intDraw, $redak->intPoints);
    }
?>
    </table>
    </div>
</body>

<?php include "inc/footer.html"?>

</html>
