<?php
namespace Ace;

class DeliveryRule {
    private array $rules;

    public function __construct(array $rules) {
        usort($rules, fn($a, $b) => $b['threshold'] <=> $a['threshold']);
        $this->rules = $rules;
    }

    public function getCharge(float $subtotal): float {
        foreach ($this->rules as $rule) {
            if ($subtotal >= $rule['threshold']) return $rule['cost'];
        }
        return end($this->rules)['cost'];
    }
}
