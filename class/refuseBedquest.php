<?php

class Animal
{
    public function fly()
    public function swim()
    public function eat()
}
class Fish extends Animal {
    public function swim()
    public function fly()
    {
        //trow Exception
    }
}

//----------------------------------------------------------------------
interface GenericAnimal
{
    public function eat()
}
interface SeaAnimal
{
    public function swim()
}
class Fish implements GenericAnimal, SeaAnimal
