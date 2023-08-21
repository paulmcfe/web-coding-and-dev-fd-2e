<?php
    // Define the class
    class Invoice {
        // These are the properties
        public $customer_id;
        public $subtotal;
        public $tax_rate;
    
        // This function initializes the property values
        public function __construct($Customer_ID, $Subtotal, $Tax_Rate) {
            $this->customer_id = $Customer_ID;
            $this->subtotal = $Subtotal;
            $this->tax_rate = $Tax_Rate;
        }
    
        // This is the method
        public function calculate_total() {
            $total = $this->subtotal * (1 + $this->tax_rate);
            return round($total, 2);
        }
    }
    
    // Create a new instance of the class
    $inv = new Invoice('BONAP', 59.85, .07);
    
    // Give the object a whirl
    echo '<br>The invoice total for ' . $inv->customer_id . ' is $' . $inv->calculate_total();

?>