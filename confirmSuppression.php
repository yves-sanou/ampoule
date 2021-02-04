<?php
ob_start();


try{
    $db=new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8;","root","");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "connexion a la base de donnée";

}catch(PDOException $e){

    echo "Erreur de connexion a PDO";
}
$sql="DELETE FROM ampoules WHERE id_ampoule=?";
$suppression=$db->prepare($sql);
$suppression->bindParam(1,$id);
$id=$_GET['id'];
$suppression->execute();

if($suppression){

    echo"<p class='alert-danger'>L'ampoule a ete supprimé</p>";
}else{

    echo"<p class='alert-dark'>une erreur est survenue</p>";
}
?>
<a href="index.php" class="btn btn-success">retour</a>
<?php
$content= ob_get_clean();
require "template.php";


?>