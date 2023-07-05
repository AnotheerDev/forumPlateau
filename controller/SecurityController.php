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

        if (isset($_POST['submitRegisteration'])) {
            $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = "ROLE_MEMBER";

            // Si filtres OK
            if ($nickname && $email && $password) {
                $UserManager = new UserManager();

                // Si le mail n'existe pas 
                if (!$UserManager->findOneByEmail($email)) {
                    //Si le pseudo n'existe pas 
                    if (!$UserManager->findOneByUser($nickname)) {
                        //Si les 2 mots de passe corespondent et que longueur supérieure ou égale à 12
                        if (($password == $confirmPassword) and strlen($password) >= 12) {
                            //hashage du mot de passe
                            $passwordHash = self::getPasswordHash($password);
                            //ajout en BDD
                            $UserManager->add(["nickname" => $nickname, "email" => $email, "password" => $passwordHash, "role" => $role]);
                            $this->redirectTo("security", "login");
                        }
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR . "security/register.php",
            "data" => []
        ];
    }


    public function login()
    {
        $UserManager = new UserManager();

        if (isset($_POST['submitLogin'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($email && $password) {
                $dbUser = $UserManager->findOneByEmail($email);

                if ($dbUser && password_verify($password, $dbUser->getPassword())) {
                    // Le mot de passe est correct, effectuez les actions appropriées
                    Session::setUser($dbUser);
                    $this->redirectTo('forum', 'listCategories');
                } else {
                    // Le mot de passe est incorrect
                    $this->redirectTo('security', 'login');
                }
            }
        }

        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => []
        ];
    }


    private static function getPasswordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function logout()
    {
        $user = null;
        Session::setUser($user);

        //affichage dans ma views
        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => []
        ];
    }


    public function viewProfile($id)
    {
        $userManager = new UserManager();
        // Récupérer l'utilisateur à partir de l'identifiant
        $user = $userManager->findOneById($id);

        // Vérifier si l'utilisateur existe
        if ($user) {
            // var_dump($user);
            // die;
            // Retourner le chemin du fichier de vue et les données utilisateur
            return [
                "view" => VIEW_DIR . "security/viewProfile.php",
                "data" => ["user" => $user]
            ];
        } else {
            // Gérer le cas où l'utilisateur n'existe pas
            // Par exemple, rediriger vers une page d'erreur ou afficher un message approprié
            return [
                "view" => VIEW_DIR . "security/login.php",
                "data" => []
            ];
        }
    }

    public function dashboard()
    {
        return [
            "view" => VIEW_DIR . "security/dashboard.php",
            "data" => []
        ];
    }
}
