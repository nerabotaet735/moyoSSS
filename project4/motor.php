<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel ="stylesheet" href="styl.css">
</head>
<body>
    <section class="container">
        <img class="motor" src="motor.png" alt = "motocykl">

    </section>
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main>
        <section class="blokLewy">
            <h2>Gdzie pojechać?</h2>
            <dl>
                <?php
                $conn=mysqli_connect("localhost","root","","motory");
                $zapytanie=mysqli_query($conn,"SELECT nazwa, opis, poczatek, zrodlo FROM `wycieczki` join zdjecia on wycieczki.zdjecia_id = zdjecia.id;");
                while($row=$zapytanie->fetch_assoc()){
                    $nazwa=$row['nazwa'];
                    $poczatek=$row['poczatek'];
                    $zdjecie= $row['zrodlo'];
                    $opis=$row['opis'];
                    echo"<dt> $nazwa, rozpoczyna się w $poczatek, <a href=$zdjecie.jpg>zobacz zdjęcie</a></dt>";
                    echo"<dd>$opis</dd>";
                }



                 ?>
                
            </dl>
        </section>
        <section id ="blokiPrawe">
            <section class="blokPrawy">
                <h2>Co kupić?</h2>
                <ol>
                    <li>Honda CBR125R</li>
                    <li>Yamaha YBR125</li>
                    <li>Honda VFR800i</li>
                    <li>Honda CBR1100XX</li>
                    <li>BMW R1200GS LC</li>
                </ol>
            </section>
            <section class="blokPrawy">
                <h2>Statystyki</h2>
                <p>Wpisanych wycieczek: <?php $zapytanie=mysqli_query($conn,"select count(id)  from wycieczki;");
                while($row=$zapytanie->fetch_assoc()){
                    $liczbaWycieczek=$row['count(id)'];
                    echo $liczbaWycieczek;
                }
                 ?>
                </p>
                <p>Użytkowników forum: 200</p>
                <p>Przesłanych zdjęć: 1300</p>
            </section>
        </section>
    </main>
    <footer><p>Stronę wykonał: 08221212279</p></footer>
    </body>
</html>
