<?php  

/**
 * Format price
 * 
 * @param  integer  $price
 * @param  integer $decimals
 * @return float          
 */
function format_price($price, $decimals=2)
{
    $formatted_price = number_format($price, $decimals);

    return $formatted_price;
    
}