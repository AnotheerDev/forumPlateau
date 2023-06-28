<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\MemberManager;
use Model\Managers\CategoryManager;

class ForumController extends AbstractController implements ControllerInterface
{

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


    // public function listTopicsByCat($id)
    // {
    //     $categoryManager = new CategoryManager();
    //     $topicManager = new TopicManager();

    //     return [
    //         "view" => VIEW_DIR . "forum/listTopicsByCat.php",
    //         "data" => [
    //             "category" => $categoryManager->findOneById($id),
    //             "topic" => $topicManager->fetchTopicsByCat($id)
    //         ]
    //     ];
    // }


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
}
