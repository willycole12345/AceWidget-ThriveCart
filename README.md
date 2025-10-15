# AceWidget-ThriveCart

# Requirements
- PHP >= 8.1
- Composer
- PHPUnit (optional for testing)

# How to Run
1. Clone the repository ( https://github.com/willycole12345/AceWidget-ThriveCart.git )

2. Install dependencies
   composer install
   composer require phpunit

3. Run the test script
   php index.php

4. Run PHPUnit tests
   ./vendor/bin/phpunit tests/test

   ------

# Assumptions
- Offers are applied before delivery charges.
- Offer discounts are calculated based on product price in catalog.
- Delivery charge rules are evaluated from highest to lowest threshold.
 
## Example
| Basket | Total |
|---------|--------|
| B01, G01 | $37.85 |
| R01, R01 | $54.37 |
| R01, G01 | $60.85 |
| B01, B01, R01, R01, R01 | $98.27 |
