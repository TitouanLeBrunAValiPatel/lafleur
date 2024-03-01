<?php include './includes/header.php'; ?>
<?php 
    if(isset($_GET['del']))
    {
        $panier->del($_GET['del']);
    }
?>
    <main>
        <div class="container max-w900">
            <form class="panier-form" action="panier.php" method="post">

                <h2>Votre Panier</h2>
                
                <?php
                    
                    $key_panier = array_keys($_SESSION['panier']); // je recupere les clés de chaque élément de mon panier 
                    $produit_panier = $DB->query("SELECT * FROM produit WHERE pdt_ref IN (". implode(',',$key_panier). ")"); // implode prend de maniere dynamique les elements du panier ?>
                <table>
                    <tr>
                        <th>Désignation</th>
                        <th>Photo</th>
                        <th>Prix unité</th>
                        <th>Nombre d'article</th>
                        <th>Prix total</th>
                        <th>Effacer</th>
                    </tr>

                    <?php
                    foreach ($produit_panier as $key) 
                    { ?>
                        <tr class="tableau_tr">
                            <td data-label="Désignation"><p class="text_panier"><?php echo $key->pdt_designation ?></p></td>
                            <td data-label="Photo"><img class="img_panier" src="./Images/<?php echo $key->pdt_image?>.jpg" alt=""></td>
                            <td data-label="Prix unité"><p class="text_panier"><?php echo $key->pdt_prix ?>€</p></td>
                            <td data-label="Nombre d'article"><p class="text_panier"><input class="input-number" type="number" name="panier[quantity][<?= $key->pdt_ref;?>]" id="" value="<?php echo $_SESSION['panier'][$key->pdt_ref] ?>"></p></td>
                            <td data-label="Prix Total"><p class="text_panier"><?php echo $_SESSION['panier'][$key->pdt_ref] * $key->pdt_prix; ?>€</p></td>
                            <td data-label="Effacer"><a class="link_panier" href="./panier.php?del=<?php echo $key->pdt_ref; ?>">Supprimer</a></td>
                        </tr>
                            <?php
                    }
                    ?>
                </table>
                <div>
                    <p><input class="btn-submit-login" type="submit" value="Recalculer le prix"></p>
                    <div class="flex">

                        <p class="top-info">Nombre total d'article : <?php echo $panier->count(); ?></p>
                        <p class="top-info">Prix Total : <?php echo $panier->total(); ?>€</p>
                    </div>
                </div>
            </form>
        </div>

        
    </main>
<?php include './includes/footer.php'; ?>