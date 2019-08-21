function update_this_coupon($coupon_id)
{
  update_post_meta( $coupon_id, 'product_ids', "130, 131");

  //or

  $product_ids = "130, 131";
  update_post_meta( $coupon_id, 'product_ids', $product_ids);

  //still use wp_update_post at the end of your code
  wp_update_post( $coupon_id );
}
