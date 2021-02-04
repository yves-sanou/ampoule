<?php 
ob_start();
$title="detail ";      
?>

<h1 class="titre"><b>LE DETAIL DES AMPOULES</b></h1>
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
$sql="SELECT* FROM id_produit WHERE id_produit=?";
$req=$db->prepare($sql);

$sql="SELECT * FROM ampoules WHERE id_ampoule=?";
$resultat=$db->prepare($sql);
$req=$_GET['id'];
$resultat->bindParam(1,$req);
$resultat->execute();
$req=$resultat->fetch();


//var_dump($resultat);
if($resultat){
?>
<form action="detailAmpoule.php" method="POST">

    <div id="image" class="card text-center" style="width: 18rem;">
        <img class="card-img-top"
            src="https://previews.123rf.com/images/sonoosmine/sonoosmine1404/sonoosmine140400004/27704633-ampoule-d-id%C3%A9e-avec-l-index-jusqu-%C3%A0.jpg"
            alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">detail</h5>
            <p class="card-text"><?php echo  $req['etage']?></p>
            <p class="card-text">la position <?php echo $req['position']?>.</p>
            <p class="card-text">changé le <?php echo $req['date_changement']?>.</p>
            <p class="card-text">le prix est <?php echo $req['prix']?>.</p>
            <a href="listeampoule.php" class="btn btn button">retour</a>
        </div>
    </div>

</form>
<?php
}else{
    echo "id inconnu";
}
?>


<?php
 $content= ob_get_clean();
 require "template.php";