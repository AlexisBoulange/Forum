<?php
    namespace App;

    abstract class Router
    {
        
        public static function handleRequest($get){
            $ctrlname = "Controller\HomeController";
            $method = "index";
            
            if(isset($get['ctrl'])){
                $ctrlname = "Controller\\".ucfirst($get['ctrl'])."Controller";
            }
            
            $ctrl = new $ctrlname();

            if(isset($get['method']) && method_exists($ctrl, $get['method'])){  //"method_exists" vérifie si la méthode existe pour une classe
                $method = $get['method'];
            }
            
            return $ctrl->$method();
        }

        public static function redirectTo($ctrl = null, $method = null){

            header("Location:?ctrl=".$ctrl."&method=".$method);
            die();
        
        }

        
        public static function CSRFProtection($token){
            // si mon formulaire n'est pas vide
            if(!empty($_POST)){
                // je vérifie que le champ hidden token de mon formulaire n'est pas vide
                if(isset($_POST['token'])){
                    $form_crsf = $_POST['token'];
                    if(hash_equals($form_crsf, $token)){

                        return true;
                    }
                }return false;
            }
            return true;
        }

    }

    