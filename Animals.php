<?php
abstract class Animal
{
    protected $name;

    public function getName()
    {
        return $this->name;
    }
}

class Zebra extends Animal
{
    static $zebrasCount;

    function __construct()
    {
        Zebra::$zebrasCount++;
        $this->name = 'Zebra' . Zebra::$zebrasCount;
    }
}

Zebra::$zebrasCount = 0;

class Lion extends Animal
{
    static $lionsCount;

    function __construct()
    {
        Lion::$lionsCount++;
        $this->name = 'Lion' . Lion::$lionsCount;
    }
}

Lion::$lionsCount = 0;

class Monkey extends Animal
{
    static $monkeyCount;

    function __construct()
    {
        Monkey::$monkeyCount++;
        $this->name = 'Monkey' . Monkey::$monkeyCount;
    }
}

Monkey::$monkeyCount = 0;

class Crocodile extends Animal
{
    static $crocodileCount;

    function __construct()
    {
        Crocodile::$crocodileCount++;
        $this->name = 'Crocodile' . Crocodile::$crocodileCount;
    }
}

Crocodile::$crocodileCount = 0;

class Kangaroo extends Animal
{
    static $kangaroosCount;

    function __construct()
    {
        Kangaroo::$kangaroosCount++;
        $this->name = 'Kangaroo' . Kangaroo::$kangaroosCount;
    }
}

Kangaroo::$kangaroosCount = 0;