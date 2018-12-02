<?php
require_once "Creators.php";

class Zoo
{
    private $zebras = array(), $lions = array(), $monkeys = array(), $crocodiles = array(), $kangaroos = array();

    public function Generate()
    {
        $zebraCreator = new ZebraCreator();
        $lionCreator = new LionCreator();
        $monkeyCreator = new MonkeyCreator();
        $elephantCreator = new CrocodileCreator();
        $penguinCreator = new KangarooCreator();

        for ($i = 0; $i < 20; $i++) {
            switch (mt_rand(0, 4)) {
                case 0:
                    $this->zebras[] = $zebraCreator->Create();
                    break;
                case 1:
                    $this->lions[] = $lionCreator->Create();
                    break;
                case 2:
                    $this->monkeys[] = $monkeyCreator->Create();
                    break;
                case 3:
                    $this->crocodiles[] = $elephantCreator->Create();
                    break;
                case 4:
                    $this->kangaroos[] = $penguinCreator->Create();
                    break;
            }
        }
    }

    public function ShowAnimals()
    {
        echo count($this->zebras) . " Zebras:" . "<br>";
        foreach ($this->zebras as $zebra) {
            echo $zebra->getName() . "<br>";
        }

        echo count($this->lions) . " Lions:" . "<br>";
        foreach ($this->lions as $lion) {
            echo $lion->getName() . "<br>";
        }

        echo count($this->monkeys) . " Monkeys:" . "<br>";
        foreach ($this->monkeys as $monkey) {
            echo $monkey->getName() . "<br>";
        }

        echo count($this->crocodiles) . " Crocodiles:" . "<br>";
        foreach ($this->crocodiles as $crocodile) {
            echo $crocodile->getName() . "<br>";
        }

        echo count($this->kangaroos) . " Kangaroo:" . "<br>";
        foreach ($this->kangaroos as $kangaroo) {
            echo $kangaroo->getName() . "<br>";
        }
    }
}

$zoo = new Zoo();
$zoo->Generate();
$zoo->ShowAnimals();