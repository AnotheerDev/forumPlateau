<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\CategoryManager;

class HomeController extends AbstractController implements ControllerInterface
{
    public function register()
    {
        $UserManager = new UserManager();

        if (isset($_POST['submitRegister'])) {
            $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Si les filtres passent//
            if ($nickname && $email && $password) {
                $UserManager = new UserManager();

                // Si le mail n'existe pas //
                if (!$UserManager->findOneByEmail($email)) {
                    //Si le pseudo n'existe pas //
                    if (!$UserManager->findOneByUser($nickname)) {
                        //Si les 2 mots de passe concordent et que le mot de passe à un longueur supérieure ou égale à 8
                        if (($password == $confirmPassword) and strlen($password) >= 8) {
                            //hashage du mot de passe
                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                            //ajout en base de données
                            $UserManager->add(["nickname" => $nickname, "email" => $email, "password" => $passwordHash]);

                            $this->redirectTo("security", "login");

                            // Si les passwords correspondent
                        }
                        //Si les passwords ne correspondent pas

                    }
                } // fin submit
            }
        }
        return [
            "view" => VIEW_DIR . "security/register.php",
            "data" => []
        ];
    }
}
