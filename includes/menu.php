

<input class="none" type="checkbox" name="menu-burger" id="menu-burger">
<label class="menu-burger-label" for="menu-burger"><span class="line"></span></label>

<div class="menu2">

	<nav class="menu-nav">
		<a href="./index.php" class="lien-menu">Accueil</a>  
		<?php
			// $cnx = new PDO ('mysql:dbname=;host=127.0.0.1;charset=UTF8', 'root', '');
			$sql = 'select cat_libelle, cat_code from categorie';
			$req = $DB->query($sql);
			foreach ($req as $row)
			{
				echo '<a class="lien-menu" href="./catalogue.php?categ='.$row->cat_code.'">'.$row->cat_libelle.'</a>'; 
			}
		?>                
	</nav>
	<div class="menu-div">
		<?php
	
			if(isset($_SESSION['connexion']) || isset($_SESSION['reconnexion']))
			{	
				echo '<a class="lien-menu" href="./deconnexion.php">Deconnexion</a>';
				echo '<a class="lien-menu" href="./panier.php">Mon Panier</a>';
	
				if(isset($_SESSION['reconnexion']) == true && $_SESSION['reconnexion'] == 'root@gmail.com')
				{
					echo '<a class="lien-menu" href="./ajout.php">Ajouter un produit</a>';
				}
			}
			else
			{	
				echo '<a class="lien-menu" href="./signin.php">Connexion</a>';
			}
		?>
	</div>
</div>