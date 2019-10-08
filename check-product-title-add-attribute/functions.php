function add_brand_in_title_to_product_as_att()
{
  $all_ids = get_posts( array(
      'post_type' => 'product',
      'numberposts' => -1,
      'post_status' => 'publish',
      'fields' => 'ids'
  ));

  foreach ( $all_ids as $id ) {

      $_product = wc_get_product( $id );
      $_sku = $_product->get_sku();
      $_title = $_product->get_title();

      //check if product title contains "pa_brand"
      if(strpos($_title, "pa_brand") != false)
      {
          //ADD PRODUCT ATTRIBUTE HERE USING THE EXTERNAL CODE GIVEN BELOW (wcproduct_set_attributes function)
      }
  }
}

//RESPECT: https://stackoverflow.com/questions/23444319/wordpress-woocommerce-use-update-post-meta-to-add-product-attributes
function wcproduct_set_attributes($post_id, $attributes) {
    $i = 0;
    // Loop through the attributes array
    foreach ($attributes as $name => $value) {
        $product_attributes[$i] = array (
            'name' => htmlspecialchars( stripslashes( $name ) ), // set attribute name
            'value' => $value, // set attribute value
            'position' => 1,
            'is_visible' => 1,
            'is_variation' => 1,
            'is_taxonomy' => 0
        );

        $i++;
    }

    // Now update the post with its new attributes
    update_post_meta($post_id, '_product_attributes', $product_attributes);
}
