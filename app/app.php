<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/", function(){

      return"

      <!DOCTYPE html>
      <html>
      <head>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          <title>Find a Car</title>
      </head>
      <body>
          <div class='container'>
              <h1>Find a Car!</h1>
              <form action='/deal'>
                  <div class='form-group'>
                      <label for='price'>Enter Maximum Price:</label>
                      <input id='price' name='price' class='form-control' type='number'>
                      <label for='miles'>Enter Maximum Miles:</label>
                      <input id='miles' name='miles' class='form-control' type='number'>
                  </div>
                  <button type='submit' class='btn-success'>Submit</button>
              </form>
          </div>
      </body>
      </html>";

    });


    $app->get("/deal",function (){
          $porsche = new Car("2014 Porsche 911", 114991, 7864);
          $ford = new Car("2011 Ford F450", 55995, 14241);
          $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);
          $lexus = new Car("2013 Lexus RX 350", 44700, 20000);

          $cars = array($porsche, $ford, $lexus, $mercedes);

          $cars_matching_search = array();
          foreach ($cars as $car) {
              if ($car->getPrice() <= $_GET["price"] && $car->getMiles() <= $_GET["miles"]) {
                  array_push($cars_matching_search, $car);
              }
          }


          $len = count($cars_matching_search);
          if($len>0){
            foreach ($cars_matching_search as $car) {
              $car_price = $car->getPrice();
              $car_make = $car->getMake();
              $car_miles = $car->getMiles();

              return "
              <h1>Your Car Dealership</h1>
              <ul>
                <li> $car_make </li>
                <ul>
                <li> $$car_price </li>
                <li> Miles: $car_miles </li>
                </ul>
              </ul>
              ";
            }
          }else {
            return "
            <h1>Your Car Dealership</h1>
            <h1>No cars</h1>
            ";
          }
    });

    return $app;

 ?>
