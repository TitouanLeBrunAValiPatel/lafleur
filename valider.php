<?php include './includes/header.php'; ?>



<div id="page">
<?php 
    if(isset($_POST['commander']))
    {

        if(isset($_SESSION['connexion']))
        {
            $user = $_SESSION['connexion'];
        }
        else
        {
            $user = $_SESSION['reconnexion'];
        }
        $recup_id_user = $DB->query("SELECT id_users FROM `users` WHERE email=:email", [
            'email' => $user
        ]);
        $tablepanier = $DB->query("INSERT INTO `panier`(`id_user`) VALUES (:id_user)",[
            'id_user' => $recup_id_user
        ]);
        // var_dump($tablepanier);

        // $composerde = $DB->query("INSERT INTO `composerde`(`pdt_ref`, `id_panier`, `qte`) VALUES (:pdt_ref,:id_panier,:qte)")

    }

?>
    </div>


<?php include './includes/footer.php'; ?>