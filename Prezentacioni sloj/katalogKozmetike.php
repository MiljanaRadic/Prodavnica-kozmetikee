<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Prodavnica kozmetike</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style-body.css">
       
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body>
    <div class="wrap">
    
<table class="table table-striped">
        <form method="get" action=""> 
           <tr>
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

    $nazivizdavaca='';
    $godina_izlaska='';
    $id_kozmetike='';
    $nazivkozmetike='';
    $vrsta='';
    $cena='';
    $izdavac='';
    $id_proizvodjaca='';


    if ($konekcija) 
    {
        $upit = "SELECT * FROM (SELECT * FROM kozmetika) AS ONE LEFT OUTER JOIN (SELECT * FROM proizvodjac) AS TWO ON ONE.id_kozmetike = TWO.id_proizvodjaca;";
        $result = mysqli_query($konekcija, $upit); 
        $brredova = mysqli_num_rows($result);
        if ($brredova>0)
        {
            $red=0;
            while($red = mysqli_fetch_array($result))
                {
                    $id_kozmetike = $red['id_kozmetike'];
                    $id_proizvodjaca = $red['id_proizvodjaca'];
                    $nazivkozmetike = $red['nazivkozmetike'];
                    $vrsta = $red['vrsta'];
                    $izdavac = $red['izdavac'];
                    $cena = $red['cena'];
                    $godina_izlaska=$red['godina_izlaska'];
                    $nazivizdavaca=$red['nazivizdavaca'];
                }
        }
    }

    //ispis vrednosti promenljivih sa podacima o prodavcu

    echo "<h3 align='center'> SPISAK KOZMETIKE KOJE SE NALAZE U BAZI</h3>";
    //referenciranje na klasu 
    include 'klase/clsKozmetika.php';
    
    //instanciranje objekta objKozmetika
    $objKozmetika = new clsKozmetika();
   
    if ($konekcija) 
		{
    
        $result = $objKozmetika->prikazSvihKozmetika($konekcija);
    
        if ($result)
        {
		$brredova = mysqli_num_rows($result);
		echo "<br/>";
		
		if ($brredova>0) 
		   {
			echo "<br/>";
            echo "<table class='table' border='2s'>";
            echo "<tr>
            
            <th>ID Kozmetike</th>
            <th>ID proizvodjaca</th>
			<th>Naziv kozmetike</th>	
			<th>Vrsta</th>
            <th>Izdavac</th>
            <th>Cena</th>
			<th>Godina Proizvodnje</th>
            <th>Naziv proizvodjaca</th>

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
            echo "<td>" . $red['cena'] . "</td>"; 
			echo "<td>" . $red['godina_izlaska'] . "</td>";
            echo "<td>" . $red['nazivizdavaca'] . "</td>";  
            
        	echo "</tr>";
			}
			echo "</table>";
		    }//br redova 
        echo "<br/>";
        echo "Ukupan broj kozmetike u bazi: ".$brredova;
        echo "<br>";
		}// if $result
    } 
    $objKozmetika=null;
    $objKonekcija->zatvoriKonekciju($konekcija);
    $objKonekcija=null;
?>   
</div>

</body>
</html>
