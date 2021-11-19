<?php

class PoslovnaLogika {
    private $_xmlData;
    function __construct()
    {
      $this->_xmlData = simplexml_load_file(getcwd()."/klase/vrednostzaPL.xml") or die("XML nije pronadjen");
    }
    function ProveriGodinu($godina) {
        $uslovGodina = $this->_xmlData->uslov;
        if ((int)$godina < (int)$uslovGodina) {
            die ("<p class='alert alert-danger'> Zao nam je, ali kozmetiku napravljenu pre $uslovGodina godine ne primamo!</p>
            <a href='unosizgledrobe.php' class='btn btn-danger btn-block'>Nazad</a>
            ");
        }
    }
}
