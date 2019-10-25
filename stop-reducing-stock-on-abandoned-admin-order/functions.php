// define the woocommerce_order_item_add_action_buttons callback 
function action_woocommerce_order_item_add_action_buttons( $order ) { 
    $orderID = $order->ID;
    //check if this is the admin manual order creation 
    if(get_post_status($orderID) == "auto-draft" && get_post_type($orderID) == "shop_order")
    {
        foreach( $order->get_items() as $item_id => $item )
        {
            $product_id = $item->get_product_id();
            $variation_id = $item->get_variation_id();
            $product_quantity = $item->get_quantity();

            if($variation_id == 0)
            {
                $product = wc_get_product($product_id);
                wc_update_product_stock($product, $product_quantity, 'increase');
            }
            else
            {
                $variation = wc_get_product($variation_id);
                wc_update_product_stock($variation, $product_quantity, 'increase' );
            }

            // The text for the note
            $note = __("Stock incremented due to the auto draft post type. Stock for each item will be decremented when this order created.");
            // Add the note
            $order->add_order_note( $note );
        }
    }
}; 

// add the action 
add_action( 'woocommerce_order_item_add_action_buttons', 'action_woocommerce_order_item_add_action_buttons', 10, 1 );


add_action( 'woocommerce_process_shop_order_meta', 'woocommerce_process_shop_order', 10, 2 );
function woocommerce_process_shop_order ( $post_id, $post ) {
    $order = wc_get_order( $post_id );

    //check if this is order create action, not an update action
    if(get_post_status($post_id) == "draft" && get_post_type($post_id) == "shop_order")
    {
        foreach( $order->get_items() as $item_id => $item )
        {
            $product_id = $item->get_product_id();
            $variation_id = $item->get_variation_id();
            $product_quantity = $item->get_quantity();

            if($variation_id == 0)
            {
                $product = wc_get_product($product_id);
                wc_update_product_stock($product, $product_quantity, 'decrease');
            }
            else
            {
                $variation = wc_get_product($variation_id);
                wc_update_product_stock($variation, $product_quantity, 'decrease' );
            }

            // The text for the note
            $note = __("Stock decremented for all items in this order.");
            // Add the note
            $order->add_order_note( $note );
        }
    }
}
