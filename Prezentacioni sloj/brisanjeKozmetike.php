<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Prodavnica kozmetike</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
       
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body> 
<h4>Brisanje kozmetike</h4>
    <?php  
        $id_kozmetike=$_GET['id_kozmetike'];

	//otvaranje konekcije do baze podataka
    include '\klase\clsKonekcijaBP.php';
    $objKonekcija = new clsKonekcijaBP();
    $konekcija = $objKonekcija->otvoriKonekciju();

    //referenciranje na klasu objKozmetika
    include '\klase\clsKozmetika.php';
    
    //instanciranje objekta objKozmetika
    $objKozmetika = new clsKozmetika();
        
        //poziv metode za brisanje artikla
        $result=$objKozmetika->obrisiKozmetiku($konekcija,$id_kozmetike);

        //ispis poruke o uspešnosti brisanja
        if ($result)
          {echo "Kozmetike je uspešno obrisana iz baze!";}
         else
          {echo "Kozmetike nije uspešno obrisana iz baze!";}

        //uništavanje objekata
        $objKozmetika = null;
        $objKonekcija = null;
?> 
</br></br>
<a href="pretragaKozmetike.php"><button type="button">Povratak</button></a>

</body>
</html>
