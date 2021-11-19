<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Prodavnica kozmetike</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">   
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body>

<h4>Kozmetika unos</h4>
    <table class="table table-striped">
        <form method="post" action="submitKozmetike.php"> 
            <tr><td align=right>ID Kozmetike*</td><td><input  type="number" name="id_kozmetike" size="10" autofocus required maxlength=10 tabindex=1></td></tr>
            <tr><td align=right>ID Autora*</td><td><input  type="number" name="id_proizvodjaca" size="10" autofocus required maxlength=10 tabindex=2></td></tr> 
            <tr><td align=right>Naziv Kozmetike*</td><td><input type="text" name="nazivkozmetike" size="50" required maxlength=50 tabindex=3></td></tr> 
            <tr><td align=right>Vrsta*</td><td>
            <select name="vrsta">
                <option value="Krema">Krema</option>
                <option value="Losion">Losion</option>
                <option value="Maskara">Maskara</option>
                <option value="Ajlajner">Ajlajner</option>
            </select>
            </td></tr>
            <tr><td align=right>Cena</td><td><input type="number" name="cena" size="10" maxlength=10 tabindex=4></td></tr>
            <tr><td align=right>Izdavac*</td><td><input type="text" name="izdavac" size="30" required maxlength=30 tabindex=5></td></tr> 
            <tr><td align=right>Godina Izlaska*</td><td><input type="date" name="godina_izlaska"  required maxlength=4 tabindex=6></td></tr> 
            <tr><td align=right>Naziv Proizvodjaca*</td><td><input type="text" name="nazivizdavaca" size="30" required maxlength=30 tabindex=7></td></tr> 
            <tr><td></td>
                <td>
                    <button type="reset" class="btn btn-danger" name="cancel" tabindex=8>Poništi</button>
                    <input type="submit" class="btn btn-info" name="submit" value="Snimi" tabindex=8>
                </td>
            </tr>
        </form>
    </table> 

</body>
</html>
