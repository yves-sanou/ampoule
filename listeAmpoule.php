<?php 
ob_start();
$title="liste ";      
?>

<h1 class="titre"><b>LA MISE A NIVEAU DES AMPOULES</b></h1>
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

$sql= "SELECT * FROM ampoules ";

?>
<div id="table">
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ETAGE</th>
                <th scope="col">POSITION</th>
                <th scope="col">DATE CHANGEMENT</th>
                <th scope="col">PRIX</th>
            </tr>
        </thead>
        <?php
    foreach($db->query($sql) as $row)
{
  ?>
        <tbody>
            <?php $date=new DateTime($row['date_changement'])?>
            <tr>

                <td><b><?php echo $row['id_ampoule'] ;?></b></td>
                <td><b><?php echo 'N° '. $row ['etage'] ?></b></td>
                <td><b><?php echo $row['position'] ;?></b></td>
                <td><b><?php echo $date->format('d/m/Y  à  H:i:s'); ?></b></td>
                <td><b><?php echo $row['prix'] ;?>€</b></td>
                <td>
                    <button type="button" class="btn btn button" data-toggle="modal" data-target="#ajoutermodal">
                        ajouter
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ajoutermodal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ajouter ampoule</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="ajouterampoule.php">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">date de changement</label>
                                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                                name="date_changement">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Etage</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="etage">
                                                <option value="rez de chazussé">rez de chazussé</option>
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
                                        <button class="btn btn-danger" type="submit">valider</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><a href="supprimerAmpoule.php?id=<?= $row['id_ampoule']?>" class="btn btn button">supprimer</a></td>
                <td><a href="adapterAmpoule.php?id=<?= $row['id_ampoule']?>" class="btn btn button">adapter</a></td>
                <td><a href="detailAmpoule.php?id=<?= $row['id_ampoule']?>" class="btn btn button">detail
                    </a></td>
            </tr>
        </tbody>
</div>
<?php 
}
?>
</table>
<?php
 $content= ob_get_clean();
 require "template.php";


?>