//1. Go to wp-admin
//2. Product
//3. Edit Product
//4. Variations
//5. Choose "Default Form Values"
//then use this code to remove Options string

add_filter('woocommerce_dropdown_variation_attribute_options_args', 'custom_woocommerce_product_add_to_cart_text', 10, 2);

function custom_woocommerce_product_add_to_cart_text($args){
 $args['show_option_none'] = 0;
  return $args;
}
