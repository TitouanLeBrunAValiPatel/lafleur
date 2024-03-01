<?php 
    include './class/db.class.php';
	include './class/panier.class.php';
    $DB = new DB();
	$panier = new panier($DB);
?>