<?php
use Dariuszp\CliProgressBar;
require 'vendor/autoload.php';
require 'animal_art.php';
require 'animal.php';
function displayAnimalDetails(Animal $animal) {
    $happinessBar = new CliProgressBar( 100,$animal->getHappinessLevel());
    $happinessBar->display();
    $happinessBar->end();
    $foodBar = new CliProgressBar(100, $animal->getFood());
    $foodBar->display();
    $foodBar->end();
    echo "\n \n \n \n";
    echo $animal->getArt() . "\n";
    echo "Name: {$animal->getName()}\n";
    echo "Happiness: ". $happinessBar->display() ."\n";
    echo "Hunger: ".  $foodBar->display() ."\n";
}
$animalArt[] = "";
$cat = new Animal("cat", "tuna", $animalArt['cat']);
$dog = new Animal("dog", "meat", $animalArt['dog']);
$bear = new Animal("bear", "fish",$animalArt['bear']);
$gameExit = false;
while ($gameExit === false)
{
    echo "Welcome to the Zookeeper game!\n";
    echo "Choose an animal:\n";
    echo "1. Cat\n2. Dog\n3. Bear\n4. EXIT GAME\n";

    $chosenAnimal = null;
    while ($chosenAnimal === null) {
        $choice = readline("Enter your choice (1, 2, 3, 4): ");
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
            case 4:
                $gameExit = true;
                exit();
            default:
                echo "Invalid choice. Please enter (1, 2, 3, 4)\n";
        }
    }
    $exit = true;
    while($exit === true)
    {
        displayAnimalDetails($chosenAnimal);
        echo "1. Feed\n2. Play\n3. Pet\n4. Pick different animal\n";

        $action = readline("Enter your choice (1, 2, 3, 4): ");

        switch ($action) {
            case 1:
                $food = readline("Enter the food to feed ".$chosenAnimal->getName(). ": ");
                $chosenAnimal->feed($food);
                break;
            case 2:
                $chosenAnimal->play();
                break;
            case 3:
                $chosenAnimal->pet();
                break;
            case 4:
                $exit = false;
                break;
            default:
                echo "Invalid choice. Please enter 1, 2, 3, 4\n";
        }
    }
}


