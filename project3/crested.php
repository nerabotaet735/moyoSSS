<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $conn=mysqli_connect("localhost","root","","hodowla");

     ?>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <section id = "main">
        <section id ="text">
            <nav>
                <a href="peruwianka.php">Rasa Peruwianka</a>
                <a href="american.php">Rasa American</a>
                <a href="crested.php">Rasa Crested</a>

            </nav>
            <main>
                <img src="crested.jpg" alt = "Świnka morska rasy crested">
                <?php
                $zapytanie=mysqli_query($conn,"SELECT DISTINCT data_ur,miot,rasa from swinki join rasy on swinki.rasy_id=rasy.id where swinki.rasy_id=7;");
                while($row=$zapytanie->fetch_assoc()){
                    $dataUr=$row['data_ur'];
                    $miot=$row['miot'];
                    $rasa=$row['rasa'];
                    echo"<h2>Rasa: $rasa</h2>";
                    echo"<p>Data urodzenia: $dataUr</p>";
                    echo"<p>Oznaczenie miotu: $miot</p>";
                }
                 ?>
                <hr>
                <h2>Świnki w tym miocie</h2>
                <?php
                    $zapytanie=mysqli_query($conn,"select imie, cena,opis from swinki where rasy_id = 7;");
                    while($row=$zapytanie->fetch_assoc()){
                        $imie=$row['imie'];
                        $cena=$row['cena'];
                        $opis=$row['opis'];
                        echo"<h3>$imie - $cena zł</h3>";
                        echo"<p>$opis</p>";
                    }
                 ?>

            </main>
        </section>
        <aside>
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                <?php
                    $zapytanie=mysqli_query($conn,"select rasa from rasy;");
                    while($row=$zapytanie->fetch_assoc()){
                        $elementListy=$row['rasa'];
                        echo"<li>$elementListy</li>";
                    }   
                 ?>
            </ol>
        </aside>
    </section>
    <footer>
        <p>Stronę wykonał: 08221212279</p>
    </footer>
</body>
</html>
