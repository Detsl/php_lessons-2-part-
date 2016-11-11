<?php

trait IdentytiTrait {
    public function generaitId(){
        return uniqid();
    }

}


trait PriceUtilities {

    private $taxRate = 17;

    function calculateTax($price){
        return(($this->taxRate/100) * $price);
    }


}

class ShopProduct {
    use PriceUtilities, IdentytiTrait;

}

$p = new ShopProduct();

print $p->calculateTax(100)."</br>";
print $p->generaitId()."</br>";