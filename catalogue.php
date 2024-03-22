<?php include './includes/header.php' ?>

<main>

    <div class="grid">
        

        <?php
                $set = $DB->query('SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image, pdt_categorie FROM produit INNER JOIN categorie ON cat_code=pdt_categorie WHERE cat_code='.$_GET["categ"]);            
                foreach ($set as $key) {
                    echo '<div class="product"><a class="full-a" href="./catalogue.php?categ='.$key->pdt_categorie.'"">
                    <img class="full-img" src="Images/'.$key->pdt_image .'.jpg"/>
                    <p>' . $key->pdt_designation .'</p><br>
                    <p class="price">' . $key->pdt_prix .'€</p><br>
                    <a class="ajout-panier" href="./panierajout.php?id=' . $key->pdt_ref . '">Ajouter au panier</a>
                    
                    </a></div>';
                }
                ?>
            <?php
            // $nom_cat = $DB->query('SELECT cat_libelle FROM categorie WHERE cat_code='. $_GET["categ"] .' LIMIT 1') ; ?>
            <!-- // <h2><?php // echo $nom_cat[0]->cat_libelle; ?></h2> -->
        </div>
</main>
        
        
<?php include './includes/footer.php' ?>
