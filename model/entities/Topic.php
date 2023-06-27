<?php

namespace Model\Entities;

use App\Entity;

final class Topic extends Entity
{

        private $id_topic;
        private $title;
        private $dateCreation;
        private $locked;

        public function __construct($data)
        {
                $this->hydrate($data);
        }


        public function getId()
        {
                return $this->id_topic;
        }


        public function setId($id_topic)
        {
                $this->id_topic = $id_topic;
        }


        public function getTitle()
        {
                return $this->title;
        }


        public function setTitle($title)
        {
                $this->title = $title;
        }


        public function getdateCreation()
        {
                $formattedDate = $this->dateCreation->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        public function setdateCreation($date)
        {
                $this->dateCreation = new \DateTime($date);
                return $this;
        }


        public function getlocked()
        {
                return $this->locked;
        }


        public function setlocked($locked)
        {
                $this->locked = $locked;
        }
}
