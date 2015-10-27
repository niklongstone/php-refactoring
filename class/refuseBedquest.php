<?php

interface Animal
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
interface Animal
{
    public function eat()
}
interface SeaAnimal implements Animal
{
    public function swim()
}
class Fish implements SeaAnimal
