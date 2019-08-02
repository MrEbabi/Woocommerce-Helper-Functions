function test_coupon()
{   
    $_newCouponID = 0;
    $isCreatedBefore = false;
    $args = array(
        //get all coupons that starts with string GC
        'posts_per_page'   => -1,
        'orderby'          => 'title',
        'order'            => 'asc',
        'post_type'        => 'shop_coupon',
        'post_status'      => 'publish',
    );

    $coupons = get_posts( $args );
    foreach( $coupons as $coupon )
    {
        $_coupon = wc_get_coupon_code_by_id($coupon->ID);

        if($_coupon == "test_coupon")
        {
            $isCreatedBefore = true;
            $_newCouponID = $coupon->ID;
        }
    }

    if(!$isCreatedBefore)
    {
        $_couponName = "test_coupon"; 
        $_couponAmount = 10; //discount value
        $_couponType = "fixed_cart"; //or "percent"

        //create new coupon
        $_newCoupon = array(
            'post_title' => $_couponName,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type'     => 'shop_coupon',
            );
        $_newCouponID = wp_insert_post( $_newCoupon );

        $randomaizeEmail = rand();
        $tempEmail = "noone$randomaizeEmail@noone.com";
        update_post_meta( $_newCouponID, 'discount_type', $_couponType );
        update_post_meta( $_newCouponID, 'coupon_amount', $_couponAmount );
        update_post_meta( $_newCouponID, 'usage_limit_per_user', '1' );
        update_post_meta( $_newCouponID, 'individual_use', 'yes' );
        update_post_meta( $_newCouponID, 'customer_email', $tempEmail );
        wp_update_post($_newCouponID);
    }

    //check user registration date and first order
    $users = get_users();
    $emails = array();
    $count_active_users = 0;

    foreach( $users as $user ) 
    {
        $udata = get_userdata( $user->ID );
        $registered = $udata->user_registered;
        $register_date = date("d m y", strtotime( $registered ) );

        $register_day = substr($register_date, 0, 2);
        $register_mon = substr($register_date, 3, 2);
        $register_year = substr($register_date, 5, 4);

        $today = date("d m y");
        $today_day = substr($today, 0, 2);
        $today_mon = substr($today, 3, 2);
        $today_year = substr($today, 5, 4);

        $isRegisteredTwoWeeks = false;

        if($today_year == $register_year && $today_mon == $register_mon && (($today_day-$register_day)<14) ) $isRegisteredTwoWeeks = true;
        if($today_year == $register_year && (($today_mon-$register_mon)==1) && (($today_day-$register_day+30)<14) ) $isRegisteredTwoWeeks = true;

        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => $user->ID,
            'post_type'   => wc_get_order_types(),
            //only for on-hold, processing and completed orders
            'post_status' => array('wc-on-hold','wc-processing','wc-completed'),
        ) );

        $isThisFirstOrder = false;
        $user_info = get_userdata($user->ID);
        $customer_email = $user_info->user_email;

        if(count($customer_orders)==0) $isThisFirstOrder = true;

        if($isThisFirstOrder && $isRegisteredTwoWeeks)
        {
            array_push($emails, $customer_email);
            $count_active_users++;
        }
    }

    if($count_active_users)
    {
        update_post_meta( $_newCouponID, 'customer_email', $emails );
        $update_post = array(
            'ID' => $_newCouponID,
            'post_excerpt' => 'New Customer - First Order - 14 Days',
        );
        wp_update_post($update_post);
    }

}

add_action( 'admin_menu', 'testtttt' );
function testtttt() {
    add_menu_page( 'testtt', 'testtt', 'manage_options' , 'testtttt' , 'test_coupon', 'dashicons-warning' , '1');
}
