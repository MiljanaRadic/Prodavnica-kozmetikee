<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Prodavnica kozmetike</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
      <link rel="stylesheet" type="text/css" href="css/style-body.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body>
    <div class="wrap">
    
<h4>Prikaz svih kozmetika</h4>
<table class="table">
        <form method="get" action=""> 
           <tr>
           <td align=right>
            Unesite Naziv Kozmetike:
           </td> 
           <td>
            <input type="text" class="form-control" name="nazivzapretragu" size="40" autofocus maxlength=20 tabindex=1>
           </td>
            <td>
                <input type="submit" class="btn btn-primary" name="submitpretraga" value="Pretraga" tabindex=2>
            </td>
            </tr>
        </form>
    </table>  
<?php

    $result="";
    $brredova=0;
    
	//otvaranje konekcije do baze podataka
    include 'klase\clsKonekcijaBP.php';
    $objKonekcija = new clsKonekcijaBP();
    $konekcija = $objKonekcija->otvoriKonekciju();

    //referenciranje na klasu objKozmetika
    include 'klase/clsKozmetika.php';
    
    //instanciranje objekta objKozmetika
    $objKozmetika = new clsKozmetika();
   
    if ($konekcija) 
		{
            if(isset($_GET['submitpretraga'])) 
            {
                //Pritisnuto dugme PRETRAGA, ista stranica se ponovo kreira ponovo
                $pretraga = $_GET['nazivzapretragu'];
                $result = $objKozmetika->pretraga($konekcija,$pretraga);
            }

        if ($result)
		   {
            $brredova = mysqli_num_rows($result);
            echo "<br/>";
            echo "Broj pronadjenih kozmetika: ".$brredova;
            if ($brredova>0) 
            {
			echo "<br/>";
			echo "<table class='table' border='2'>";
            echo "<tr>
            <th>ID Kozmetike</th>
            <th>ID autora</th>
			<th>Naziv kozmetike</th>	
			<th>Vrsta</th>
			<th>Izdavac</th>
			<th>Godina Proizvodnje</th>
            <th>Naziv Proizvodjaca</th>
			</tr>";
             
			$red=0;
			while($red = mysqli_fetch_array($result))
			{
            echo "<tr>";
            echo "<td>" . $red['id_kozmetike'] . "</td>";
            echo "<td>" . $red['id_proizvodjaca'] . "</td>";
			echo "<td>" . $red['nazivkozmetike'] . "</td>";
			echo "<td>" . $red['vrsta'] . "</td>";
			echo "<td>" . $red['izdavac'] . "</td>";
			echo "<td>" . $red['godina_izlaska'] . "</td>";
            echo "<td>" . $red['nazivizdavaca'] . "</td>";           
            
            $id_kozmetike = $red['id_kozmetike'];
            $id_proizvodjaca = $red['id_proizvodjaca'];
            $nazivkozmetike = $red['nazivkozmetike'];
            $vrsta = $red['vrsta'];
            $izdavac = $red['izdavac'];
            $godina_izlaska=$red['godina_izlaska'];
            $nazivizdavaca=$red['nazivizdavaca'];

            echo "<td><a href='izmenaKozmetike.php?nazivizdavaca=$nazivizdavaca&id_kozmetike=$id_kozmetike&nazivkozmetike=$nazivkozmetike&vrsta=$vrsta&izdavac=$izdavac&id_proizvodjaca=$id_proizvodjaca'>Izmeni</a></td>
            <td><a href='brisanjeKozmetike.php?id_kozmetike=$id_kozmetike'>Obrisi</a></td>";

        	echo "</tr>";
			}
			echo "</table>";
		    } 
		echo "<br/>";
        }
    }
    $objKozmetika=null;
    $objKonekcija->zatvoriKonekciju($konekcija);
    $objKonekcija=null;
?>     
</div>
</body>
</html>
