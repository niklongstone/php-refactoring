<?php

switch ($city) {
    case 'Oslo':
        return getWinterClothes();
    case 'Miami':
        return getSummerClothes();
    case 'Brno':
        return getNormalClothes();
}

interface City
{
    public function getClothes();
}

class Brno implements City
{
    function getClothes()
    {
        return 'normalClothes';
    }
}

class Oslo implements City
{
    //code...
}

class Miami implements City
{
    //code...
}

$cityClothes = new $city();
$cityClothes->getClothes();
