<?php
class Restaurant
{
    use Client, Menu, Food;
}

class Bill
{
   use Client, Menu, Food;
}



class Restaurant
{
    use ClientBookingTrait, MenuTrait, FoodTrait;
}

class Bill
{
    use ClientFeedback, MenuTrait, FoodPriceTrait;
}
