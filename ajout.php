<?php include './includes/header.php' ?>

<main>
    <div class="container">
    <?php

                if(!isset($_SESSION['reconnexion']) == false || !isset($_SESSION['connexion']) == false)
                {
                    if(isset($_SESSION['reconnexion']) == true && $_SESSION['reconnexion'] == 'root@gmail.com'){

                        $sql = "select * from categorie;";
                    
                        $req = $DB->query($sql);
            
            
                            
                        if(isset($_POST['formsend']))
                        {
            
                                $pdt_categorie = $_POST['pdt_categorie'];
                                $pdt_prix = $_POST['pdt_prix'];
                                $pdt_designation = $_POST['pdt_designation'];
                                /*
                                     TODO : créer la requete SQL pour ajouter un produit à la base de données
                                     tu peux t'appuyer de la requete faite dans le fichier signin.php a la ligne 28

                                
                                     - Montrer la table dans la base de donnée
                                     - Montrer le ficheir signin.php

                                     aide, pour ajouter quelques chose dans une base de donnée il faut UTILISER INSERT INTO
                                     la méthode query prends 2 parametres.
                                     
                                */

                            // echo "La fleur a bien été ajouter.";
                            header('Location: ./catalogue.php?categ='. $pdt_categorie .'');
                        } ?>
                        <form action="ajout.php" method="post">
                        <label class="form-text" for="pdt_categorie">La catégorie de la fleur :</label>
                        <select name="pdt_categorie" id="pdt_categorie">
                            <?php
                            
                                foreach ($req as $key) {
                                    
                                    echo '<option value="' . $key->cat_code . '">' . $key->cat_libelle . '</option>';
                                }
                            ?>
                        </select>
            
                        <label class="form-text" for="pdt_designation">Description de la fleur :</label>
                        <input type="text" name="pdt_designation" id="pdt_designation" required>
                        
                        <label class="form-text" for="pdt_prix">Prix de la fleur :</label>
                        <input type="number" name="pdt_prix" id="pdt_prix" required>
            
                        <input class="btn-submit-login" type="submit" value="Ajouter le produit" name="formsend">
                        <input class="btn-submit-login" type="reset" value="Annuler">
                    </form>
                <?php
                    }
                    
                    else{
                        ?>
                        <h2 class="rouge">Vous n'avez pas les droits</h2>
                        <a class="lien-menu" href="./index.php">Redirection vers la page d'accueil</a>
                        <?php 
                    }	
                }
                else
                {
                    ?>
                    <h2 class="rouge">veuillez vous identifiez</h2>
                    <a class="lien-menu" href="./signin.php">S'inscrire ou se connecter</a>
                    <?php 
                }
            

        ?>
            
        

    </div>
</main>	
<?php include './includes/footer.php' ?>
