<?php
namespace Ace;

use Ace\Offer\Offer;

class Basket {
    public  $catalog;
    public  $items = [];
    public DeliveryRule $delivery;
    public  $offers;

    public function __construct(array $catalog, DeliveryRule $delivery, array $offers = []) {
        $this->catalog = $catalog;
        $this->delivery = $delivery;
        $this->offers = $offers;
    }

    public function add(string $code): void {
        if (!isset($this->catalog[$code])) {
          //  throw new \InvalidArgumentException("Invalid product code: $code");
          echo 'Invalid product code :' .$code ;
        }
        $this->items[] = $this->catalog[$code];
    }

    public function total(): float {
        $subtotal = array_sum(array_map(fn($p) => $p->price, $this->items));
        $discount = array_sum(array_map(fn(Offer $offer) => $offer->apply($this->items), $this->offers));
        $delivery = $this->delivery->getCharge($subtotal - $discount);
        return round($subtotal - $discount + $delivery, 2);
    }
}
