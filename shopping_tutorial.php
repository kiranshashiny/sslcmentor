<?php

class Shopping_Cart {

    private $cart;

    function __construct($cart="") {
        $this->cart = $cart;
    }

    function getCart() {
        return $this->cart;
    }
   
    function addToCart($item) {
        if(isset($this->cart[$item])) {
            $this->cart[$item]++;
        } else {
            $this->cart[$item] = 1;
        }      
    }

    function deleteFromCart($item) {
        if(isset($this->cart[$item])) {
            $this->cart[$item]--;
            if($this->cart[$item] == 0) {
                unset($this->cart[$item]);
            }
        }
    }
   
}


?>


<?php

   $cart = new Shopping_Cart();

   // Add a copy of "Beginning PHP and MySQL 5, Second Edition"
   $cart->addToCart(1);

   // Add two copies of "Pro MySQL"
   $cart->addToCart(3);
   $cart->addToCart(3);

   // Dump cart contents to array
   $items = $cart->getCart();

   // Assign array to session
   $_SESSION["cart"] = $items;


?>

<a href="nextpage.php">Go to the next page</a>
