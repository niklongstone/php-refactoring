<?php

switch ($city) {
    case 'Oslo':
        return getWinterClothes();
    case 'Miami':
        return getSummerClothes();
    case 'Brno':
        return getNormalClothes();
}

interface City {
  public function getClothes();
}

class Oslo implements City {
  function getClothes() {
    return 'winterClothes';
  }
}

class Miami implements City {
  function getClothes() {
    return 'summerClothes';
  }
}

class Brno implements City {
  function getClothes() {
    return 'normalClothes';
  }
}

$cityClothes = new $city();
$cityClothes->getClothes();
