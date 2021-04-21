<?php

namespace Model\Entity;

use App\AbstractEntity;

class Category extends AbstractEntity
{


        private $id;
        private $name;
        private $nb = null;

        public function __construct($data)
        {
                parent::hydrate($data, $this);
        }
        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }


        /**
         * Get the value of nb
         */ 
        public function getNb()
        {
                return $this->nb;
        }

        /**
         * Set the value of nb
         *
         * @return  self
         */ 
        public function setNb($nb)
        {
                $this->nb = $nb;

                return $this;
        }
}