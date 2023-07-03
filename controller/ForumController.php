<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\UserManager;
use Model\Managers\CategoryManager;

class ForumController extends AbstractController implements ControllerInterface
{
    // La classe ForumController étend la classe AbstractController et implémente l'interface ControllerInterface.

    // La méthode index() récupère tous les sujets de discussion à afficher dans la vue listTopics.php.
    public function index()
    {
        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["dateCreation", "DESC"])
            ]
        ];
    }


    // La méthode listCategories() récupère toutes les catégories de discussion à afficher dans la vue listCategories.php.
    public function listCategories()
    {
        $categoryManager = new CategoryManager();

        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "data" => [
                "categories" => $categoryManager->findAll(["Name", "ASC"])
            ]
        ];
    }


    // La méthode listTopicsByCat($id) récupère les sujets de discussion d'une catégorie spécifique à afficher dans la vue listTopicsByCat.php.
    public function listTopicsByCat($id)
    {
        $categoryManager = new CategoryManager();
        $topicManager = new TopicManager();

        $category = $categoryManager->findOneById($id); // Récupérer la catégorie par ID
        $topics = $topicManager->fetchTopicsByCat($id); // Récupérer les sujets par ID de catégorie

        return [
            "view" => VIEW_DIR . "forum/listTopicsByCat.php",
            "data" => [
                "category" => $category,
                "topics" => $topics,
            ]
        ];
    }


    // La méthode listPostsByTopic($id) récupère les messages d'un sujet de discussion spécifique à afficher dans la vue listPostsByTopic.php.
    public function listPostsByTopic($id)
    {
        $postManager = new postManager();
        $topicManager = new TopicManager();

        // Récupérer les messages d'un sujet de discussion spécifique
        $posts = $postManager->displayPostsByTopic($id);
        $topic = $topicManager->findOneById($id);

        return [
            "view" => VIEW_DIR . "forum/listPostsByTopic.php",
            "data" => [
                "posts" => $posts,
                "topic" => $topic,
            ]
        ];
    }


    // La méthode addTopic($id) ajoute un nouveau sujet de discussion dans une catégorie spécifique.
    public function addTopic($id)
    {
        $topicManager = new TopicManager();
        $postManager = new PostManager();
        // $user_id= Session::getUser();

        if (isset($_POST['submit'])) {

            if (isset($_POST['post']) && (!empty($_POST['post']))) {
                $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $user_id = $_SESSION['user']->getId();

                if ($post && $title && $user_id) {
                    // Ajouter un nouveau sujet de discussion dans une catégorie spécifique
                    $newTopicId = $topicManager->add([
                        "title" => $title,
                        "dateCreation" => date('y-m-d h:i:s'),
                        "user_id" => $user_id,
                        "locked" => "0",
                        "category_id" => $id,
                    ]);

                    // Ajouter le premier message du sujet
                    $postManager->add([
                        "content" => $post,
                        "dateCreation" => date('y-m-d h:i:s'),
                        "topic_id" => $newTopicId,
                        "user_id" => $user_id
                    ]);
                }

                header("Location:index.php?ctrl=forum&action=listTopicsByCat&id=$id");
            }
        }
    }


    // La méthode addPost($id) ajoute un nouveau message dans un sujet de discussion spécifique.
    public function addPost($id)
    {
        $topicManager = new TopicManager();
        $postManager = new PostManager();
        // $user_id= Session::getUser();


        if (isset($_POST['submit']) && isset($_SESSION['user'])) {

            if (isset($_POST['post']) && (!empty($_POST['post']))) {
                $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $user_id = $_SESSION['user']->getId();

                if ($post && $user_id) {
                    // Ajouter un nouveau message dans un sujet de discussion spécifique
                    $postManager->add([
                        "content" => $post,
                        "dateCreation" => date('y-m-d h:i:s'),
                        "topic_id" => $id,
                        "user_id" => $user_id,
                    ]);
                }

                header("Location:index.php?ctrl=forum&action=listPostsByTopic&id=$id");
            }
        }
    }


    // La méthode deletePost($id) supprime un message spécifique d'un sujet de discussion.
    public function deletePost($id)
    {
        $postManager = new PostManager();

        $post = $postManager->findOneById($id);
        $topicId = $post->getTopic()->getId();
        // Supprimer un message spécifique d'un sujet de discussion
        $postManager->deletePost($id);

        $this->redirectTo("forum", "listPostsByTopic", $topicId);
    }


    // La méthode updatePost($id) met à jour le contenu d'un message spécifique dans un sujet de discussion.
    public function updatePost($id)
    {
        $postManager = new PostManager;

        $content = $postManager->findOneById($id)->getContent();

        if (isset($_POST['submit'])) {
            $content = filter_input(INPUT_POST, "contentPost", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // Mettre à jour le contenu d'un message spécifique dans un sujet de discussion
            $postManager->updatePost($content, intval($id));
            $topic_id = $postManager->findOneByid($id)->getTopic()->getId();
            $this->redirectTo("forum", "listPostsByTopic", $topic_id);
        }

        return [
            "view" => VIEW_DIR . "forum/updatePost.php",
            "data" => [
                "content" => $content
            ]
        ];
    }
}
