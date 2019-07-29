add_filter( 'woocommerce_cart_item_price', 'customizing_cart_item_name', 10, 3 );
function customizing_cart_item_name( $product_name, $cart_item, $cart_item_key ) {
    $product = $cart_item['data']; // Get the WC_Product Object

    if ( $value = $product->get_meta('pro_price_extra_info') ) {
        $product_name .= '<a class="gt_price" href="example.com/cart/?add-to-cart=250">Get this price</a>';
    }

    WC()->cart->calculate_totals();

    return $product_name;
}

//alternatively

add_action( 'woocommerce_cart_collaterals', 'custom_add_to_cart_redirect' );
function custom_add_to_cart_redirect() {
      echo '<button class="de-button-admin de-button-anim-4"><a href="example.com/cart/?add-to-cart=250" style="color:white">Get Your Discounted Product!</a></button>';
}
