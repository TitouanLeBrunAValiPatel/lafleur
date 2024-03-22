<?php
class DB{

    private $HOST = 'localhost';
    private $database = 'lafleur';
    private $user = 'root';
    private $pass = '';
    private $cnx;


    public function __construct($HOST = null, $database = null,$user = null, $pass = null)
    {
        if($HOST != null)
        {
            $this->HOST = $HOST;
            $this->database = $database;
            $this->user = $user;
            $this->pass = $pass;
        }
        

        try 
        {
            $this->cnx = new PDO('mysql:host=' . $this->HOST . ';dbname=' . $this->database, $this->user, $this->pass, 
            array([
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE
            ]));
        } 
        catch (PDOException $th) 
        {
            echo $th;
        }

    }
    public function query($sql, $et = array())
    {
        $e = $this->cnx->prepare($sql);
        $e->execute($et);
        // echo 'je suis la ';
        
        return $e->fetchAll(PDO::FETCH_OBJ);
    }
    public function session(){
        if(isset($_SESSION['reconnexion']))
        {
            echo $_SESSION['reconnexion'];
        }
        else if(isset($_SESSION['connexion']))
        {
            echo $_SESSION['connexion'];
        }
        else
        {
            echo 'veuillez vous connectez à votre compte';
        }
    }



}


?>