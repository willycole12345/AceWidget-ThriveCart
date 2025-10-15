<?php
require 'vendor/autoload.php';

use Ace\{Product, Basket, DeliveryRule};
use Ace\Offer\RedWidgetOffer;

$catalog = [
    'R01' => new Product('R01', 'Red Widget', 32.95),
    'G01' => new Product('G01', 'Green Widget', 24.95),
    'B01' => new Product('B01', 'Blue Widget', 7.95),
];

$delivery = new DeliveryRule([
    ['threshold' => 90, 'cost' => 0],
    ['threshold' => 50, 'cost' => 2.95],
    ['threshold' => 0, 'cost' => 4.95],
]);

$offers = [new RedWidgetOffer()];
$basket = new Basket($catalog, $delivery, $offers);
      $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
// $basket->add('R01');
// $basket->add('R01');

echo "Total: $" . $basket->total(); // Expected: 54.37
