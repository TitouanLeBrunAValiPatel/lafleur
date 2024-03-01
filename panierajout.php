<?php 
    include './includes/header.php'; 
?>

<main>
    <div class="container">

        <?php
            if(isset($_GET['id']) )
            {
                if(!isset($_SESSION['reconnexion']) == false || !isset($_SESSION['connexion']) == false)
                {
                
                    $product = $DB->query("SELECT pdt_ref FROM produit WHERE pdt_ref=:id", ['id' => $_GET['id']]);
                    if($product == array())
                    {
                        echo "<p class='rouge'>le produit sélectionner n'existe pas ou plus</p>";

                    }
                    else
                    {
                        // echo '<p cArticle ajouter au panier';
                        $panier->add($product[0]->pdt_ref);  
                        header("Location: ./panier.php");
                        exit();
                    }
                } 
                else
                {
                    echo '<h2 class="rouge">veuillez vous identifiez</2>';
                    ?>
                    <a class="lien-menu" href="./signin.php">S'inscrire ou se connecter</a>
                    <?php 
                }
                        

            } 
            

        ?>
    </div>
</main>
<?php include './includes/footer.php'; ?>
