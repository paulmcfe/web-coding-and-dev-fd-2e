<?php
    $preTipTotal = 100.00;
    $tipPercentage = 0.15;
    
    function calculate_tip($preTip, $tipPercent) {
        $tipResult = $preTip * $tipPercent;
        return $tipResult;
    }
    $tipCost = calculate_tip($preTipTotal, $tipPercentage);
    $totalBill = $preTipTotal + $tipCost;
    echo "Your total bill is \$$totalBill";
?>