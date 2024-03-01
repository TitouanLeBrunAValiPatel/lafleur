<?php include './includes/header.php' ?>

    <main>

        <div class="container">
            <!-- zone de connexion -->
            
            <form class="form-frame" action="./signin.php" method="POST">
                <h2>Connexion</h2>
                
                <label class="form-text">Email</label>
                <input type="text" placeholder="Entrer votre email" name="lemail" required>
    
                <label class="form-text">Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="lpassword" required>
    
    
                <input class="btn-submit-login" type="submit" id='submit' value='LOGIN' name="login">
                <?php
                if(isset($_POST['login']))
                {
                    
                    if(!empty($_POST['lemail']) && !empty($_POST['lpassword']))
                    {
                        $lemail = $_POST['lemail'];
                        $lpassword = $_POST['lpassword'];
                        
                        $verifemail = $DB->query('SELECT * FROM users WHERE email= :email;',['email' => $lemail]);
                        if ($verifemail == array())
                        {
                            echo "<p class='rouge'>Aucun compte n'existe avec cet email veuillez creer un compte</p>";
                        }
                        else
                        {                        
                            foreach ($verifemail as $verifpassword)
                            {
                                $verif =  $verifpassword->password;
                            }
                            if (password_verify($lpassword, $verif)) {
                                // echo '<p class="vert">Le mot de passe est valide ! Connexion en cours</p>';
                                $_SESSION['reconnexion'] = $lemail;
                                $connexion = $_SESSION['reconnexion'];
                                echo $connexion;
                                $_SESSION['password']= $lpassword;
                                echo $_SESSION['password'];
                                sleep(0.5);
                                header('Location: ./index.php');
                                exit();
                            }
                            else 
                            {
                                echo '<p class="rouge">Le mot de passe est invalide.</p>';
                            }                         
                        }
                    }
                    else
                    {
                        echo "<p class='rouge'>Veuillez entrez tous les champs</p>";
                    }
                }
                ?>
            </form>
        </div> 
        <div class="container">
            <!-- zone de connexion -->
            
            <form class="form-frame" action="./signin.php" method="POST">
                <h2>Créer un compte</h2>
                
                <label class="form-text">Email</label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="semail" required>
    
                <label class="form-text">Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="spassword" required>
    
                <label class="form-text">Confirmer le mot de passe</label>
                <input type="password" placeholder="Confirmer le mot de passe" name="cspassword" required>
    
                <input class="btn-submit-login" type="submit" id='submit' value='LOGIN' name="signin">
                <?php
                if(isset($_POST['signin']))
                {
                    if(!empty($_POST['semail']) && !empty($_POST['spassword']) && !empty($_POST['cspassword']))
                    { 
                        $semail = $_POST['semail'];
                        $spassword = $_POST['spassword'];
                        $cspassword = $_POST['cspassword'];
                        $verifemail = $DB->query('SELECT * FROM users WHERE email= :email;',['email' => $semail]);
                        // var_dump($verifemail);
                        if ($verifemail == array()) 
                        {
                            if($spassword == $cspassword)
                            {
                                $options = ['cost' => 12,];
                                $haspass =  password_hash($spassword, PASSWORD_BCRYPT, $options);

                                $q = $DB->query("INSERT INTO `users`(`email`, `password`) VALUES (:email, :password);", [
                                    'email' => $semail,
                                    'password' => $haspass
                                    ]);
                                
                                $_SESSION['connexion'] = $semail;
                                $connexion = $_SESSION['connexion'];
                                echo $connexion;              
                                echo "<p class='vert'>Votre compte à bien été créer</p>";
                                sleep(0.5);
                                header('Location: ./index.php');
                                exit();
                            }
                            else
                            {
                                echo "<p class='rouge'>La confirmation du mot de passe est différent du mot de passe inscrit.</p>";
                            }
                            
                        }
                        else
                        {
                            echo " <p class='rouge'>Email existant dans la bdd</p>";
                        }
                    }
                    else
                    {
                        echo " <p class='rouge'>Veuillez entrez tous les champs</p>";
                    }           
                }
                ?>
            </form>
        </div>   
    </main>
    

<?php include './includes/footer.php' ?>




