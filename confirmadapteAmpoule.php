<?php
ob_start();
$title='confirmadapte';

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

if(isset($_POST['etage'])&& !empty($_POST['etage'])){
    $etage=$_POST['etage'];
    
    }else{
        echo "merci de remplir le champ ";
    }
    if(isset($_POST['date_changement'])&& !empty($_POST['date_changement'])){
        $date_changement=$_POST['date_changement'];
        
        }else{
            echo "merci de remplir le champ ";
        }
        if(isset($_POST['position'])&& !empty($_POST['position'])){
            $position=$_POST['position'];
            
            }else{
                echo "merci de remplir le champ ";
            }
            if(isset($_POST['prix'])&& !empty($_POST['prix'])){
                $prix=$_POST['prix'];
                
                }else{
                    echo "merci de remplir le champ";
                }

               

?>

<?php


$sql="UPDATE ampoules SET etage=?,date_changement=?,position=?,prix=? WHERE id_ampoule=?";
$resultat=$db->prepare($sql);

$resultat->bindParam(1,$etage);
$resultat->bindParam(2,$date_changement);
$resultat->bindParam(3,$position);
$resultat->bindParam(4,$prix);
$id=$_GET['id'];

if($resultat->execute(array($etage,$date_changement,$position,$prix,$id))){
    echo "votre ampoule a ete ajouté";
    header('location:http://localhost/ampoule/listeAmpoule.php');
}else{
    echo'merci de remplir tout les champs';
}