// define the woocommerce_variable_price_html callback 

function filter_woocommerce_variable_price_html( $wc_format_price_range, $instance ) { 
    $index = strpos($wc_format_price_range, "&ndash; ");
    $wc_format_price_range = substr($wc_format_price_range, $index+7);
    
    //This will remove the first price by dividing the standard string with dash
    //You may add a prefix like, $wc_format_price_range = "Max Price: $wc_format_price_range";
    
    return $wc_format_price_range; 
}; 

// add the filter 
add_filter( 'woocommerce_variable_price_html', 'filter_woocommerce_variable_price_html', 10, 2 ); 
