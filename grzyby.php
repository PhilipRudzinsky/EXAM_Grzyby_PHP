<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grzybobranie</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
<div id="miniatury">
    <a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie"></a>
</div>
<div id="tytulowy"><h1>Idziemy na grzyby!</h1></div>
<div id="lewy">
    <?php
        $db = mysqli_connect("localhost","root","","3pir_dane2");
        mysqli_set_charset($db,"utf8");
        $q="SELECT nazwa_pliku,potoczna FROM grzyby;";
        $result = mysqli_query($db, $q);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<img src='$row[0]' title='$row[1]'/>";
            }
        }
        mysqli_close($db);
    ?>
</div>
<div id="prawy">
    <h2>Grzyby jadalne</h2>
    <?php
    $db = mysqli_connect("localhost","root","","3pir_dane2");
    $q2="SELECT nazwa,potoczna FROM grzyby WHERE jadalny=1;";
    $result1 = mysqli_query($db, $q2);
    if ($result1) {
        while ($row = mysqli_fetch_array($result1)) {
            echo $row[0]." ";
            echo $row[1]." <br>";
        }
    }
    mysqli_close($db);
    ?>
    <h2>Polecamy do sosów</h2>
    <?php
    $db = mysqli_connect("localhost","root","","3pir_dane2");
    $q3="SELECT grzyby.nazwa, grzyby.potoczna,rodzina.nazwa FROM grzyby INNER JOIN rodzina ON grzyby.rodzina_id=rodzina.id WHERE potrawy_id =1;";
    $result2 = mysqli_query($db, $q3);
    if ($result2) {
        echo "<ol>";
        while ($row = mysqli_fetch_array($result2)) {
            echo "<li>$row[0] and $row[1]</li>";
        }
       echo "</ol>";
    }
    mysqli_close($db);
    ?>
</div>
<footer><p>Autor: Filip Rudzińśki 3pir2</p></footer>
</body>
</html>