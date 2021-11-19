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
    
    <?php include 'C:\xampp\htdocs\prodavnica kozmetike\klase\BL.php';?>
    
</head>
<body>
    
<h4>Kozmetika unos</h4>    
<?php

        $godina_izlaska=$_POST['godina_izlaska'];
        $nazivizdavaca=$_POST['nazivizdavaca'];
        $id_kozmetike=$_POST['id_kozmetike'];
        $nazivkozmetike=$_POST['nazivkozmetike'];
        $vrsta=$_POST['vrsta'];
        $cena=$_POST['cena'];
        $izdavac=$_POST['izdavac'];
        $id_proizvodjaca=$_POST['id_proizvodjaca'];

        //otvaranje konekcije do baze podataka
        include 'Klase podataka\klase\clsKonekcijaBP.php';
        $objKonekcija = new clsKonekcijaBP();
        $konekcija = $objKonekcija->otvoriKonekciju();

        //referenciranje na klasu clsArtikl
        include 'klase/clsKozmetika.php';

        //$poslovnaLogika = new PoslovnaLogika();
        //$poslovnaLogika->ProveriCenu($ogrcene);
        
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
        $objKozmetike->snimiKozmetiku($konekcija);

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
