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

function getQueryString(array $array)
{
    $query_string = array_merge(request()->query(), $array);

    $filtered_query = array_except($query_string, ['page']);

    return $filtered_query;
}

function removeQueryString($filter)
{
    $query_string = request()->query();

    $filtered_query = array_except($query_string, [$filter, 'page']);

    return $filtered_query;
}