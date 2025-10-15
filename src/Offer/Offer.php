<?php
namespace Ace\Offer;

interface Offer {
    public function apply(array $items): float;
}