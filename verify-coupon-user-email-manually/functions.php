//hook: woocommerce_applied_coupon

add_action( 'woocommerce_applied_coupon', 'restrict_coupon_usage_with_my_email_list' );
function restrict_coupon_usage_with_my_email_list( $coupon_code )
{
    //create an array with your email list
    $emailArr = array("a@a.com", "b@b.com");
    $isSpecialCoupon = false;

    //check the $coupon_code 
    if($coupon_code == "a_b_coupon" && is_user_logged_in())
    {
       //if it is the coupon code you want to restrict with those emails and if user logged in
       $isSpecialCoupon = true;
    }
    if($isSpecialCoupon)
    {
       //check if the logged in user's email is in this array
       $current_user = wp_get_current_user();
       if(in_array($current_user->user_email, $emailArr)) return true;
       else WC()->cart->remove_coupon( $coupon_code );
    }
    else WC()->cart->remove_coupon( $coupon_code );
}
