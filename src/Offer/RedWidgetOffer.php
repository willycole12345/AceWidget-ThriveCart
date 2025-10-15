<?php
namespace Ace\Offer;
require_once 'Offer.php';

class RedWidgetOffer implements Offer {
    public function apply(array $items): float {
        $redWidgets = array_filter($items, fn($item) => $item->code === 'B01');
        $count = count($redWidgets);
        $discountPairs = intdiv($count, 2);
        return $discountPairs * (32.95 / 2);
    }
}
//BO1,G01 68.85