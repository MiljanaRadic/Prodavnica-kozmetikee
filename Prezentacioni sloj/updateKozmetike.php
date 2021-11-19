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
    
<h4>Izmena kozmetike</h4>    
<?php

        $godina_izlaska=$_GET['godina_izlaska'];
        $nazivkozmetike=$_GET['nazivkozmetike'];
        $id_kozmetike=$_GET['id_kozmetike'];
        $nazivizdavaca=$_GET['nazivizdavaca'];
        $vrsta=$_GET['vrsta'];
        $cena=$_GET['cena'];
        $izdavac=$_GET['izdavac'];
        $id_proizvodjaca=$_GET['id_proizvodjaca'];
        $stariIdKozmetike=$_GET['id_kozmetike'];

        //otvaranje konekcije do baze podataka
        include '\klase\clsKonekcijaBP.php';
        $objKonekcija = new clsKonekcijaBP();
        $konekcija = $objKonekcija->otvoriKonekciju();

        //referenciranje na klasu clsArtikl
        include '\klase\clsKozmetika.php';
        
        //instanciranje objekta objKozmetike
        $objKozmetike = new clsKozmetika();
        
        //dodeljivanje vrednosti atributima
        $objKozmetike->godina_izlaska = $godina_izlaska;
        $objKozmetike->id_kozmetike = $id_kozmetike;
        $objKozmetike->nazivkozmetike = $nazivkozmetike;
        $objKozmetike->nazivizdavaca = $nazivizdavaca;
        $objKozmetike->vrsta = $vrsta;
        $objKozmetike->cena = $cena;
        $objKozmetike->izdavac = $izdavac;
        $objKozmetike->id_proizvodjaca = $id_proizvodjaca;

        //poziv metode za unos novog artikla
        $objKozmetike->promeniKozmetiku($konekcija, $stariIdKozmetike);

        //ispis poruke o uspešnosti upisa u BP iz klase
        //uništavanje objekata
        $objKozmetike = null;
        $objKonekcija = null;
?>     

<br>
<br>
<a href="unosKozmetike.php"><button type="button">Povratak</button></a>
</body>
</html>