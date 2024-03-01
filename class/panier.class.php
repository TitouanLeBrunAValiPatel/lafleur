<?php 

class panier{

    private $DB;

    public function __construct($DB)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        if(!isset($_SESSION['panier'])) // si le panier n'est pas créer je le crée
        {
            $_SESSION['panier'] = array(); // on créer un panier vide
               
        }

        $this->DB = $DB;

        if(isset($_POST['panier']['quantity']))
        {
            $this->recalc();
        }
    }



    public function recalc()
    {
        foreach ($_SESSION['panier'] as $product_id => $value)
        {
            if(isset($_POST['panier']['quantity'][$product_id]))
            {
                if($_POST['panier']['quantity'][$product_id] <= 0)
                {
                    unset($_SESSION['panier'][$product_id]);
                }
                else
                {
                    $_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id];
                }
                
                
            }
        }
        
    }

    public function add($product_id)
    {

        if(!isset($_SESSION['panier'][$product_id]))
        {
            $_SESSION['panier'][$product_id] = 1;
        }
        else
        {
            $_SESSION['panier'][$product_id] += 1;
        }
    }

    public function count()
    {
        $nbr = 0;
        foreach ($_SESSION['panier'] as $key => $value) 
        {
            $nbr += $value;
        }
        return $nbr;
    }

    public function total()
    {
        $total = 0;
        $key_panier = array_keys($_SESSION['panier']); // je recupere les clés de chaque élément de mon panier 
        $produit_panier = $this->DB->query("SELECT * FROM produit WHERE pdt_ref IN (". implode(',',$key_panier). ")"); // implode prend de maniere dynamique les elements du panier
        foreach ($produit_panier as $key) 
        {
            $total += $_SESSION['panier'][$key->pdt_ref] * $key->pdt_prix;
        }
        return $total;
    }

    public function del($key)
    {
        unset($_SESSION['panier'][$key]);
    }
}

?>