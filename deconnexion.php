
<?php include './includes/header.php'; ?>

    <main>

        <div class="container">
            <form class="form-frame" action="./deconnexion.php" method="post">
                <h2 class="form-title">Déconnexion</h2>
                <input class="btn-submit-login" type="submit" value="Se Déconnecter" name="deco">
                <?php     
                    if(isset($_POST['deco']))
                    {
                        unset($_SESSION['connexion']);
                        unset($_SESSION['reconnexion']);
                        unset($_SESSION['panier']);
                        session_destroy();
                        header('Location: ./index.php');
                        exit();
                        // echo "<a href='./index.php'>Retourner à l'accueil</a>";
                    } 
                ?>            
            </form>

        </div>
    </main>


<?php include './includes/footer.php'; ?>