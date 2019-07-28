add_action( 'woocommerce_reduce_order_stock', 'lets_reduce_parent' );

function lets_reduce_parent( $order_id ) {
  $order = wc_get_order( $order_id );
  foreach( $order->get_items() as $item_id => $item ){
      $parent_id = $item->get_product_id();
      $child_id = $item->get_variation_id();
      $quantity = $item->get_quantity();

      if($child_id == 0) return;
      else
      {
          $parent_product = wc_get_product( $parent_id );
          $stock = $parent_product->get_stock_quantity();
          $new_stock = $stock - $quantity;
          wc_update_product_stock( $parent_product, $quantity, 'decrease' );
          $order->add_order_note( "Parent Product ID: $parent_id - Stock Reduced: $stock -> $new_stock");
      }
  }
}
