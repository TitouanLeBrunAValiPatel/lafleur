<?php include './includes/header.php' ?>

	<main>
		<h2>Nos Best Sellers</h2>
		<div class="grid">
			<?php
				$sql = "select * from produit where pdt_ref IN(1,4,9);";
				$req = $DB->query($sql);
				foreach ($req as $key) {
					echo '<div class="product"><a class="full-a" href="./catalogue.php?categ='.$row->cat_code.'"">
							<img class="full-img" src="Images/'.$key->pdt_image .'.jpg"/>
							<p>' . $key->pdt_designation .'</p><br>
							<p class="price">' . $key->pdt_prix .'€</p><br>
							<a class="ajout-panier" href="./panierajout.php?id=' . $key->pdt_ref . '">Ajouter au panier</a>
					
							</a></div>';
				}
	
			?>
			
		</div>
	</main>

<?php include './includes/footer.php' ?>

