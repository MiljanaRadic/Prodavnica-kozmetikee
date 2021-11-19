<?php

class clsKozmetika

{
    public $nazivizdavaca;
    public $godina_izlaska;
    public $id_kozmetike;
    public $nazivkozmetike;
    public $kategorija;
    public $cena;
    public $izdavac;
    public $id_proizvodjaca;

public function snimiKozmetiku($konekcija)
{
    $upit = "INSERT INTO `proizvodjac` (`id_proizvodjaca`, `godina_izlaska`, `nazivizdavaca`) VALUES ($this->id_proizvodjaca, '$this->godina_izlaska', '$this->nazivizdavaca');";
    $result = mysqli_query($konekcija, $upit);
    $upit = "INSERT INTO `kozmetika` (`id_kozmetike`, `nazivkozmetike`, `vrsta`, `cena`, `izdavac`, `id_proizvodjaca`) VALUES ($this->id_kozmetike, '$this->nazivkozmetike', '$this->vrsta', '$this->cena', '$this->izdavac', $this->id_proizvodjaca);";
    $result = mysqli_query($konekcija, $upit);
    if(!$result)
            {
                echo "Podaci o kozmetici nisu upisani u bazu podataka. Greška! ";
                echo "<br/>";
                mysqli_error($konekcija);
                echo $upit;
            }
            else
            {
                echo "Uspešno upisani podaci o kozmetici ".$this->nazivkozmetike." u bazu podataka!";
                echo "<br/>";
            }
}

public function prikazSvihKozmetika($konekcija)
{

    $upit = "SELECT * FROM (SELECT * FROM kozmetika ORDER BY `nazivkozmetike`) AS ONE LEFT OUTER JOIN
        (SELECT * FROM proizvodjac WHERE id_proizvodjaca=`id_proizvodjaca`) AS TWO ON ONE.id_kozmetike = TWO.id_proizvodjaca;";
    $result = mysqli_query($konekcija, $upit);            
    return $result;
}


public function pretraga($konekcija, $pretraga)
{
    $upit = "SELECT * FROM (SELECT * FROM kozmetika WHERE `nazivkozmetike` LIKE '%$pretraga%' ORDER BY `nazivkozmetike`) AS ONE LEFT OUTER JOIN
    (SELECT * FROM proizvodjac WHERE id_proizvodjaca=`id_proizvodjaca`) AS TWO ON ONE.id_kozmetike = TWO.id_proizvodjaca;";
    $result = mysqli_query($konekcija, $upit);               
    return $result;
}

public function obrisiKozmetiku($konekcija, $id_kozmetike)
{
    $upit = "DELETE `kozmetika`, `proizvodjac` 
    FROM `kozmetika`, `proizvodjac` 
    WHERE `proizvodjac`.`id_proizvodjaca` = `kozmetika`.`id_kozmetike` AND `kozmetika`.`id_proizvodjaca` ='$id_kozmetike'";
    $result = mysqli_query($konekcija, $upit);               
    return $result;
}

public function promeniKozmetiku($konekcija, $stariIdKozmetike)
{
  
    $upit = "UPDATE kozmetika SET `id_kozmetike` = '$this->id_kozmetike', 
    `nazivkozmetike` ='$this->nazivkozmetike', `nazivizdavaca` = '$this->nazivizdavaca', `vrsta` = '$this->vrsta', `godina_izlaska` = '$this->godina_izlaska', `izdavac` = '$this->izdavac' WHERE `id_kozmetike` = '$starid_kozmetike';";
    $result = mysqli_query($konekcija, $upit); 
             
    if(!$result)
            {
                echo "Podaci o kozmetici nisu azurirani. Greška! ";
                echo "<br/>";
                mysqli_error($konekcija);
            }
            else
            {
                echo "Uspešno promenjeni podaci o kozmetici ".$this->nazivkozmetike." u bazu podataka!";
                echo "<br/>";
            }
}
}

?>