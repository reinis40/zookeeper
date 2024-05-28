<?php

require 'vendor/autoload.php'; // Require the autoload.php file generated by Composer

use Carbon\Carbon;

class Animal {
    // Properties
    private $name;
    private $happiness;
    private $favoriteFood;
    private $foodReserves; // Add food reserves property

    // Constructor
    public function __construct($name, $favoriteFood, $initialFoodReserves) {
        $this->name = $name;
        $this->favoriteFood = $favoriteFood;
        $this->happiness = 50; // Default happiness level
        $this->foodReserves = $initialFoodReserves;
    }

    // Methods
    public function feed($food) {
        if ($food === $this->favoriteFood) {
            $this->happiness += 10;
            echo "{$this->name} loves {$food}! Happiness increased to {$this->happiness}.\n";
        } else {
            echo "{$this->name} doesn't like {$food}. Happiness remains at {$this->happiness}.\n";
        }
    }

    public function play() {
//        $start = Carbon::now(); // Record the start time
//        $playDuration = 5; // Duration of play in seconds
//        while (Carbon::now()->diffInSeconds($start) < 1) {
//            echo "Playing...\n";
//        }
//
//        // After the specified duration
//        $end = Carbon::now();
//        $playDurationInSeconds = $end->diffInSeconds($start);
        $this->happiness += 5;

        echo "{$this->name} enjoys playing for seconds! Happiness increased to {$this->happiness}.\n";
        $foodConsumed =  5;
        $this->foodReserves -= $foodConsumed;
        echo "Food reserves decreased to {$this->foodReserves}.\n";
    }

    // Getter for happiness level
    public function getHappiness() {
        return $this->happiness;
    }

    // Getter for food reserves
    public function getFoodReserves() {
        return $this->foodReserves;
    }
}

// Example usage:
$cat = new Animal("cat", "meat", 100);
$dog = new Animal("dog", "hay", 150);
$bear = new Animal("bear", "hay", 150);




$chosenAnimal = "";
$choice = readline("pick");
switch ($choice) {
    case 1:
        $chosenAnimal = $cat;
        break;
    case 2:
        $chosenAnimal = $dog;
        break;
    case 3:
        $chosenAnimal = $bear;
        break;
    default:
}

$chosenAnimal->feed("hay"); // Elephant doesn't like fish. Happiness remains at 50.
$chosenAnimal->play(); // Elephant enjoys playing! Happiness increased to 55.
