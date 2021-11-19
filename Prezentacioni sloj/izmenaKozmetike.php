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
    <?php include 'meni.php';
    $godina_izlaska=$_GET['godina_izlaska'];
    $nazivizdavaca=$_GET['nazivizdavaca'];
    $id_kozmetike=$_GET['id_kozmetike'];
    $nazivkozmetike=$_GET['nazivkozmetike'];
    $vrsta=$_GET['vrsta'];
    $cena=$_GET['cena'];
    $izdavac=$_GET['izdavac'];
    $id_proizvodjaca=$_GET['id_proizvodjaca'];
    $stariIdKozmetike=$_GET['id_kozmetike'];
    ?>

</head>
<body>

<h4>Kozmetika izmena</h4>
    <table class="table table-striped">
        <form method="post" action="submitKozmetike.php"> 
            <tr><td align=right>ID Kozmetike</td><td><input  type="number" name="id_kozmetike" size="10" autofocus required maxlength=10 tabindex=1 class="form-control"></td></tr>
            <tr><td align=right>ID Proizvodjaca &nbsp;</td><td><input  type="number" name="id_proizvodjaca" size="10" autofocus required maxlength=10 tabindex=2 class="form-control"></td></tr> 
            <tr><td align=right>Naziv Kozmetike</td><td><input type="text" name="nazivkozmetike" size="50" required maxlength=50 tabindex=3 class="form-control"></td></tr> 
            <tr><td align=right>Vrsta</td><td>
            <select name="vrsta" class="custom-select d-block w-100">
                <option value="krema">Krema</option>
                <option value="losion">Losion</option>
                <option value="maskara">Maskara</option>
                <option value="ajlajner">Ajlajner</option>
            </select>
            </td></tr>
            <tr><td align=right>Cena</td><td><input type="number" name="cena" size="10" maxlength=10 tabindex=4 class="form-control"></td></tr>
            <tr><td align=right>Izdavac</td><td><input type="text" name="izdavac" size="30" required maxlength=30 tabindex=5 class="form-control"></td></tr> 
            <tr><td align=right>Godina Proizvodnje</td><td><input type="date" name="godina_izlaska"  required maxlength=4 tabindex=6 class="form-control"></td></tr> 
            <tr><td align=right>Naziv Proizvodjaca</td><td><input type="text" name="nazivizdavaca" size="30" required maxlength=30 tabindex=7 class="form-control"></td></tr> 
            <tr><td></td>
                <td>
                    <br/>
                    <input type="submit" class="btn btn-primary" name="submit" value="Snimi" tabindex=8>
                    <input type="hidden" class="btn btn-primary" name="starisbn" value="<?php echo $stariIdKozmetike;?>">
                    <button type="reset" class="btn btn-danger" name="cancel" tabindex=9>Poništi</button>
                </td>
            </tr>
        </form>
    </table> 


</body>
</html>
