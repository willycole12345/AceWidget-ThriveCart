<?php
use PHPUnit\Framework\TestCase;
use Ace\{Product, Basket, DeliveryRule};
use Ace\Offer\RedWidgetOffer;

class BasketTest extends TestCase {
    private function createBasket(): Basket {
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
        return new Basket($catalog, $delivery, $offers);
    }

    public function testExampleTotals() {
        $basket = $this->createBasket();
//B01, B01, R01, R01, R01
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals(98.27, $basket->total());
    }
}
