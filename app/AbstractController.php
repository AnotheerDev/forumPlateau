<?php

namespace App;

abstract class AbstractController
{

    public function index()
    {
        // La méthode index() est définie dans la classe, mais il n'y a pas d'implémentation ici.
        // Cela signifie que les classes qui étendent cette classe abstraite doivent fournir leur propre implémentation de la méthode index().
    }


    public function redirectTo($ctrl = null, $action = null, $id = null)
    {
        // Cette méthode redirectTo() redirige l'utilisateur vers une autre URL en fonction des paramètres passés.
        if ($ctrl != "home") {
            // Si le paramètre $ctrl n'est pas égal à "home", alors construire l'URL en ajoutant les paramètres.
            $url = $ctrl ? "?ctrl=" . $ctrl : "";
            // Si $ctrl a une valeur, ajouter "?ctrl=" suivi de la valeur de $ctrl à l'URL.
            $url .= $action ? "&action=" . $action : "";
            // Si $action a une valeur, ajouter "&action=" suivi de la valeur/méthode de $action à l'URL.
            $url .= $id ? "&id=" . $id : "";
            // Si $id a une valeur, ajouter "&id=" suivi de la valeur de $id à l'URL.
        } else {
            // Si le paramètre $ctrl est égal à "home", alors l'URL sera simplement "/".
            $url = "/";
        }

        header("Location: $url");
        // Rediriger l'utilisateur vers l'URL spécifiée.
        die();
        // Arrêter l'exécution du script après la redirection.
    }


    public function restrictTo($role)
    {
        // Cette méthode restrictTo() vérifie si l'utilisateur actuel a le rôle spécifié.
        if (!Session::getUser() || !Session::getUser()->hasRole($role)) {
            // Vérifier si aucun utilisateur n'est connecté ou si l'utilisateur connecté n'a pas le rôle spécifié.
            $this->redirectTo("security", "login");
            // Rediriger l'utilisateur vers la page de connexion dans le contrôleur de sécurité.
        }
        return;
        // Retourner simplement si l'utilisateur a le rôle spécifié.
    }
}
