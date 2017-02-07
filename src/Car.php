<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;


        function __construct($make_model, $price, $miles) {
          $this->price = $price;
          $this->make_model = $make_model;
          $this->miles = $miles;
        }

        function setCar($new_model, $new_price, $new_miles)
        {
            $this->make_model = $new_model;
            $this->price = $new_price;
            $this->miles = $new_miles;

        }

        function getPrice()
        {
          return $this->price;
        }

        function getMake()
        {
          return $this->make_model;
        }

        function getMiles()
        {
          return $this->miles;
        }
    }
 ?>
