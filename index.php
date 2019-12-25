<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="styl.css" type="text/css">
  </head>
  <body>
    <div id="baner">
      <h1>W naszej hurtowni kupisz najtaniej</h1>
    </div>
    <div id="lewy">
      <h3>Ceny wybranych artykułow w hurtowni:</h3>
      <!-- первый скрипт с таблицей и вопросом к базе данных!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
      <?php
        $con=mysqli_connect("localhost","root","","sklep");
      // print_r($con);
        $query = "SELECT nazwa, cena FROM towary WHERE id < 5";
        $result = mysqli_query($con, $query);
        echo ("<table>");
        while ($row = mysqli_fetch_assoc($result)) {
          printf ("<tr><td>" . $row["nazwa"] . "</td><td>" . $row["cena"] . "</td></tr>");
        }
        echo ("</table>");
        mysqli_close($con);
      ?>
    </div>
    <div id="srodkowy">
      <h3>Ile będą kosztować Twoje zakupy?</h3>
      <form method="POST">
        wybierz artykuł
        <select name="oblicz1">
          <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
          <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
          <option value="Cyrkiel">Cyrkiel</option>
          <option value="Linijka 30 cm">Linijka 30 cm</option>
          <option value="Ekierka">Ekierka</option>
          <option value="Linijka 50 cm">Linijka 50 cm</option>
        </select><br>
        liczba sztuk:<input type="number" id="pole" name="pole" value="1"/></br>
        <input type="submit" value="OBLICZ">
      </form>
  <?php
    $con=mysqli_connect("localhost","root","","sklep");
    // print_r($con);
      $query = "SELECT cena FROM towary WHERE nazwa='{$_POST['oblicz1']}'";
      $result = mysqli_query($con, $query);
      echo ("<div>");
        while ($x = mysqli_fetch_assoc($result)) {
          printf ($x["cena"]*$_POST['pole']);
        }
      echo ("</div>");
      mysqli_close($con);


  ?>
    </div>
    <div id="prawy">
      <img src="zakupy2.png" alt="hurtownia">
      <h3>Kontakt</h3>
      <p>telefon:<br>111222333<br>e-mail:<br><a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    </div>
    <div id="stopka">
      <h4>Witrynę wykonał 1122334455</h4>
    </div>
  </body>
</html>