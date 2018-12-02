<?php
require_once "Animals.php";

abstract class AnimalCreator
{
    abstract function Create();
}

class ZebraCreator extends AnimalCreator
{
    public function Create()
    {
        return new Zebra();
    }
}

class LionCreator extends AnimalCreator
{
    public function Create()
    {
        return new Lion();
    }
}

class MonkeyCreator extends AnimalCreator
{
    public function Create()
    {
        return new Monkey();
    }
}

class CrocodileCreator extends AnimalCreator
{
    public function Create()
    {
        return new Crocodile();
    }
}

class KangarooCreator extends AnimalCreator
{
    public function Create()
    {
        return new Kangaroo();
    }
}
