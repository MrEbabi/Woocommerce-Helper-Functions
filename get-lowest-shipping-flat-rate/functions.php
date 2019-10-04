function get_lowest_shipping_flat_rate_1()
{
    $delivery_zones = WC_Shipping_Zones::get_zones(); 

    //define the array outside of the loop
    $shipping_costs = [];

    //get all costs in a loop and store them in the array
    foreach ((array) $delivery_zones as $key => $the_zone ) {

    foreach ($the_zone['shipping_methods'] as $value) {
        $shipping_costs[] = $value->cost;
        }
    }
    
    $content = get_woocommerce_currency_symbol() . " " . min($shipping_costs);
    
    return $content;
}

//or

function get_lowest_shipping_flat_rate_2()
{
    $delivery_zones = WC_Shipping_Zones::get_zones(); 

    //define the array outside of the loop
    $shipping_costs = [];

    //get all costs in a loop and store them in the array
    foreach ((array) $delivery_zones as $key => $the_zone ) {

    foreach ($the_zone['shipping_methods'] as $value) {
        $shipping_costs[] = $value->cost;
        }
    }

    //display currency symbol if you want
    echo get_woocommerce_currency_symbol();

    //after the loop, print the minimum item in the array
    echo (min($shipping_costs));
}
