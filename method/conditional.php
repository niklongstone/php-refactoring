<?php

if ($currentDate < $christmasDate && $currentDate > $summerDate) {
    $saleDiscount = ($yearBasicRate + $christmasRate) * $quantity;
} else {
    $saleDiscount = ($yearBasicRate + $normalDiscount) * $quantity;
}

$saleDiscount = getNormalDiscount(quantity);
if (isChristmas($currentDate)) {
    $saleDiscount = getCristhmasDiscount(quantity);
}
