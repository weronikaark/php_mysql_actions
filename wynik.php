<!doctype html>
<html>
  <head>
    <title>Wyniki dodania książki</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1>Wyniki dodania książki</h1>
    <?php
    
    $isbn = isset($_POST['isbn']) ? trim($_POST['isbn']) : '';
    $autor = isset($_POST['autor']) ? trim($_POST['autor']) : '';
    $tytul = isset($_POST['tytul']) ? trim($_POST['tytul']) : '';
    $cena = isset($_POST['cena']) ? trim($_POST['cena']) : '';
    
    if (!$isbn || !$autor || !$tytul || !$cena) {
        echo 'Brak wszystkich danych, wróć do poprzedniej strony i spróbuj ponownie!';
        exit;
    }
    
    // Reszta kodu...
    
      // if (!get_magic_quotes_gpc())
      // {
        $isbn = addslashes($isbn);
        $autor = addslashes($autor);
        $tytul = addslashes($tytul);
        $cena = doubleval($cena);
      // }
      @ $db = new mysqli('localhost','admin','admin123','ksiegarnia_internetowa');
      
      if (mysqli_connect_errno())
      {
        echo 'Połączenie z bazą nie powiodło się. Spóbuj ponownie';
        exit;
      }
      $db->query('SET NAMES utf8');
      // $db->query('SET CHARACTER_SET utf8_unicode_ci');
      $db->query('SET NAMES utf8');

      $zapytanie = "insert into ksiazki values ('".$isbn."', '".$autor."', '".$tytul."', '".$cena."')";
      $wynik = $db->query($zapytanie);
      if ($wynik) echo 'Liczba książek dodanych do bazy:'.$db->affected_rows;
    ?> 
  </body>
</html>