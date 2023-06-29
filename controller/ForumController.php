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


    public function listPostsByTopic($id)
    {
        $postManager = new postManager();
        $topicManager = new TopicManager();

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


    public function addTopic($id)
    {
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        if (isset($_POST['submit'])) {

            if (isset($_POST['post']) && (!empty($_POST['post']))) {
                $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


                if ($post && $title) {
                    $newTopicId = $topicManager->add([
                        "title" => $title,
                        "dateCreation" => date('y-m-d h:i:s'),
                        "member_id" => 3,
                        "locked" => "0",
                        "category_id" => $id,
                    ]);

                    $postManager->add([
                        "content" => $post,
                        "dateCreation" => date('y-m-d h:i:s'),
                        "topic_id" => $newTopicId,
                        "member_id" => 3
                    ]);
                }

                header("Location:index.php?ctrl=forum&action=listTopicsByCat&id=$id");
            }
        }
    }


    public function addPost($id)
    {
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        if (isset($_POST['submit'])) {

            if (isset($_POST['post']) && (!empty($_POST['post']))) {
                $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($post) {

                    // var_dump($post);
                    // die;
                    $postManager->add([
                        "content" => $post,
                        "dateCreation" => date('y-m-d h:i:s'),
                        "topic_id" => $id,
                        "member_id" => 1,
                    ]);
                }

                header("Location:index.php?ctrl=forum&action=listPostsByTopic&id=$id");
            }
        }
    }
}
