<?php
use Carbon\Carbon;
class Animal {
    private string $name;
    private int $happiness;
    private int $food;
    private string $favoriteFood;
    private string $art;
    public function __construct($name, $favoriteFood, $art) {
        $this->name = $name;
        $this->happiness = 50;
        $this->food = 50;
        $this->favoriteFood = $favoriteFood;
        $this->art = $art;
    }
    public function feed($food) {
        if ($food === $this->favoriteFood) {
            $this->food += 5;
            echo "feeding ". $this->name;
            $currentTime = Carbon::now();
            while (Carbon::now() <= $currentTime->copy()->addSeconds(5))
            {
                echo'.';
                $this->happiness++;
                usleep(0.5 * 1000000);
            };
        } else {
            $this->food += 5;
            $this->happiness -= 10;
        }
    }
    public function play() {
        echo $this->name. " is playing";
        $currentTime = Carbon::now();
        while (Carbon::now() <= $currentTime->copy()->addSeconds(5))
        {
            echo'.';
            $this->happiness++;
            $this->food--;
            usleep(0.5 * 1000000);
        }
    }
    public function pet() {
        echo "petting ". $this->name; ;
        $currentTime = Carbon::now();
        while (Carbon::now() <= $currentTime->copy()->addSeconds(5))
        {
            $this->happiness++;
            echo'.';
            usleep( 0.5 * 1000000);
        };
    }
    public function getHappinessLevel(): int {
        return $this->happiness;
    }
    public function getFood(): string {
        return $this->food;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getArt(): string {
        return $this->art;
    }
}
