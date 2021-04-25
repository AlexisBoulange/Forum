<?php

    namespace Controller;

    use Model\Manager\UserManager;
    use App\Router;
    use App\Session;

    class SecurityController {

        public function register(){

            //On vérifie si notre form est rempli
            if(!empty($_POST)){

                //S'il est rempli, je nettoie les inputs
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                $verifPassword = filter_input(INPUT_POST, "verifPassword", FILTER_SANITIZE_STRING);

                //Je vérifie si tous les champs ont été renseignés correctement et filtré
                if($username && $password && $verifPassword){

                    //Si les 2 mdp correspondent
                    if($password == $verifPassword){

                        //On instancie notre usermanager
                        $model = new UserManager();

                        //on cherche si l'id n'existe pas en BDD
                        if(!$model->findOneByUsername($username)){

                            //On hache le mdp
                            $hash = password_hash($password, PASSWORD_ARGON2I);
                            //Puis on rejoute l'user en BDD
                            if($model->addUser($username, $hash)){
                                Router::redirectTo("home", "index");
                            }
                        }else var_dump("Pseudo déjà existant");

                    }else var_dump("Mdp différents");

                }else var_dump("champs manquants");
                
            }


            return [
                "view" => "security/register.php",
                "data" => null,
            ];
        }

        public function login(){

            if(!empty($_POST)){

                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

                $model = new UserManager();

                    if($user = $model->findOneByUsername($username)){

                        if(password_verify($password, $user->getPassword())){

                            Session::setUser($user);
                            Router::redirectTo("home");
                            

                        }else var_dump("mdp ne correspond pas");

            }else var_dump("user n'existe pas");
        }

        return [
            "view" => "security/login.php",
            "data" => null,
        ];
    }

        public function logout(){

            Session::removeUser();
            Router::redirectTo("home");

        }
    }