<?php
    ob_start();
  
?>

<body class="body">


    <?php

try
{
    // On se connecte à MySQL
    $db = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
    $db->setAttribute( PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION );
}catch(PDOException $exception)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die("Erreur de connexion PDO mySQL:".$exception-> getMessage());
}
?>


    <form action="listeAmpoule.php" method="post">
        <div class="connect text-center">
            <div class="form-group ">
                <label for="Email">Email </label>
                <input type="email" class="form-control" id="email" name="email">

            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="Password">
            </div>

            <button type="submit" class="btn btn button  m-2">valider</button>
        </div>
    </form>
    <?php

$users_email="ecommerce@pj3";
$users_password="bonjour";


if(isset($_POST['users_email']) && !empty( $_POST['users_email']) && isset($_POST['users_password']) && !empty( $_POST['users_password'])){
    
    if($email==$_POST['users_email'] && $password==$_POST['users_password']){
    $_SESSION['users_email']=$_POST['users_email'];
    echo $_SESSION['users_email'];
    $_SESSION['users_password']=$_POST['users_password'];
    echo $_SESSION['user_password'];
    
    header('location:http://localhost/ampoule/listeampoule.php');

    }else{
       // echo "merci de mettre des valeures valides";
       
    }

}else{
    //echo "<p class='paragraph'>merci de mettre des valeures valides</p>";
   
    
}

    
?>

    <?php
 $content= ob_get_clean();

 require 'template.php';
?>
</body>