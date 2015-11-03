<?php

const SEAT_NOT_FOUND = -1;

public function chooseSeat($seatNumber)
{
    if ($seatNumber <= 0 && $seatNumber > 100) {
        return SEAT_NOT_FOUND;
    }

    //reserve the seat
}

//----------------------------------------------------------------------
public function chooseSeat($seatNumber)
{
    if ($seatNumber <= 0 && $seatNumber > 100) {
        throw new NotFoundException("The seat doesn't exists");
    }

    //reserve the seat
}
