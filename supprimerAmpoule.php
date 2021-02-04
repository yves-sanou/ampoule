<?php
ob_start();


try{
    $db=new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8;","root","");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "connexion a la base de donnée";

}catch(PDOException $e){

    echo "Erreur de connexion a PDO";
}
?>



<div class="alert-danger p-5 tada">
    <h1 class="text-center"><mark><b style="color: red;">ATTENTION L'ACTION EST IRREVERSIBLE</b></mark></h1>
</div>
<div class="">

    <?php
//requète sql
$sql=" SELECT * FROM ampoules WHERE id_ampoule=?";
//requète dans une variable
$requete=$db->prepare($sql);
//objet qui return la declaration AOP

//recuperation de id avec $_GET
$id=$_GET['id'];
//var_dump($id);
//faire heriter le'?' a tout les $_GET['id']

$requete->bindParam(1,$id);

//execution requète passé a 'id'
$requete->execute();

//afficher les valeur par 'id'
$resultat=$requete->fetch();

?>

    <ul class="liste-detail">
        <li class="liste-detail"><b><?php echo $resultat['position']?></b></li>
        <li><b>etage n°<?php echo $resultat['etage']?></b></li>
        <li><b>le prix <?php echo $resultat['prix']?>€</b></li>
        <li class="liste-detail"><b>la date est <?php echo $resultat['date_changement']?></b></li>
    </ul>
    <a href="confirmSuppression.php?id=<?= $resultat['id_ampoule'] ?>" class="btn btn-danger">supprimer</a>

    <?php
 $content= ob_get_clean();
 require "template.php";


?>