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

$porsche = new Car("2014 Porsche 911", 114991, 7864);
$ford = new Car("2011 Ford F450", 55995, 14241);
$lexus = new Car("2013 Lexus RX 350", 44700, 20000);
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->getPrice() <= $_GET["price"] && $car->getMiles() <= $_GET["miles"]) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
          $len = count($cars_matching_search);
            if($len>0){
              foreach ($cars_matching_search as $car) {
                $car_price = $car->getPrice();
                $car_make = $car->getMake();
                $car_miles = $car->getMiles();


                echo "<li> $car_make </li>";
                echo "<ul>";
                echo "<li> $$car_price </li>";
                echo "<li> Miles: $car_miles </li>";
                echo "</ul>";
              }
            }else {
              echo "<h1>No cars</h1>";
            }

        ?>
    </ul>
</body>
</html>
<!-- The Car class has 3 properties: its make/model, its price, number of miles. Then, we instantiate 4 Car objects, set their properties, and put them in an array called $cars. Next, we create an empty array called $cars_matching_search, which will hold all the cars matching the user's search parameter so that we can display them on the page. Then, we use a loop to fill that array. It checks to see if the price on each Car object is less than the price specified in the form, and if they are, then add the Car to $cars_matching_search to display. Finally, we use another loop in the HTML to show each chosen Car's properties.

Let's create a method called worthBuying which compares the Car's price to the value entered into the form. Add this to the Car class declaration in Car.php:

Car.php
function worthBuying($max_price)
{
    return $this->price < $max_price;
} -->
