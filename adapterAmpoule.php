<?php 
ob_start();
$title="adapter ";      
?>

<h1 class="titre"><b>LA MODIFICATION DES AMPOULES</b></h1>
<div class="text-center tada">
    <h1><mark><b style="color: green;">Voulez vraiment modifier?</b></mark></h1>
</div>
<?php     
try
{
    // On se connecte à MySQL
    $db = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch(PDOException $exception)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die("Erreur de connexion PDO mySQL:".$exception-> getMessage());
}

$sql="SELECT * FROM ampoules WHERE id_ampoule=?";
$resultat=$db->prepare($sql);
$req=$_GET['id'];
$resultat->bindParam(1,$req);
$resultat->execute();
$finish=$resultat->fetch();

?>


<form method="post" action="confirmadapteAmpoule.php?id=<?=$finish['id_ampoule']?>">
    <div class="form-group">
        <label for="exampleFormControlInput1">date de changement</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" name="date_changement">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Etage</label>
        <select class="form-control" id="exampleFormControlSelect1" name="etage">
            <option value="rez de chazussé">rez de chaussé</option>
            <option value="etage 1">etage 1</option>
            <option value="etage 2">etage 2</option>
            <option value="etage 3">etage 3</option>
            <option value="etage 4">etage 4</option>
            <option value="etage 5">etage 5</option>
            <option value="etage 6">etage 6</option>
            <option value="etage 7">etage 7</option>
            <option value="etage 8">etage 8</option>
            <option value="etage 9">etage 9</option>
            <option value="etage 10">etage 10</option>
            <option value="etage 11">etage 11</option>

        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Position</label>
        <select class="form-control" id="exampleFormControlSelect1" name="position">
            <option value="droite">droite</option>
            <option value="gauche">gauche</option>
            <option value="fond">fond</option>

        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">prix</label>
        <input type="number" class="form-control" name="prix">

    </div>

    <button type="submit" class="btn btn-info">enregistrer l'operation</button>
</form>


<?php
 $content= ob_get_clean();
 require "template.php";