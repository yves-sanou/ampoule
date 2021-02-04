<?php
ob_start();

try
{
    // On se connecte à MySQL
    $db = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch(PDOException $exception)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die("Erreur de connexion PDO mySQL:".$exception->getMessage());
}



$sql="SELECT * FROM  ampoules WHERE id_ampoule=?";
$resultat=$db->prepare($sql);
$id=$_GET['id'];

if($resultat){
    echo "voici le detail";
    header('location:http://localhost/ampoule/listeAmpoule.php');
}else{
    echo'merci de remplir tout les champs';
}