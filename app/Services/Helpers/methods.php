<?php  

/**
 * Format price
 * 
 * @param  integer  $price
 * @param  integer $decimals
 * @return float          
 */
function formatNumber($price, $decimals=2)
{
    $formatted_price = number_format($price, $decimals);

    return $formatted_price;
    
}

function presentPrice($price)
{
    return config('app.currency') . $price;
}

/**
 * Get query string.
 * 
 * @param  array  $array 
 * @return $array
 */
function getQueryString(array $query)
{
    $query_string = array_merge(request()->query(), $query);

    $filtered_query = array_except($query_string, ['page']);

    return $filtered_query;
}

/**
 * Remove query string.
 * 
 * @param  string $filter 
 * @return $array
 */
function removeQueryString($filter)
{
    $query_string = request()->query();

    $filtered_query = array_except($query_string, [$filter, 'page']);

    return $filtered_query;
}