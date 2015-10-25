<?php

const SEAT_NOT_EXIXST = -1;

public function chooseSeat($seatNumber)
{
    if ($seatNumber <= 0 && $seatNumber > 100) {
        return SEAT_NOT_EXIST;
    }
    
    //reserve the seat
}

public function chooseSeat($seatNumber)
{
    if ($seatNumber <= 0 && $seatNumber > 100) {
        throw new NotFoundException("The seat doesn't exists");
    }
    
    //reserve the seat
}
