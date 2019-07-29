//function to get orders - completed, pending and processing
function lets_get_all_orders()
{
    $customer_orders = wc_get_orders( array(
    'limit'    => -1,
    'status'   => array('completed','pending','processing')
    ) );
    return $customer_orders;
}

//function to get and print all used coupons in those orders
function lets_get_all_used()
{
    $orders = lets_get_all_orders();

    //traverse all users and echo coupon codes
    foreach($orders as $order)
    {
        $order_discount = $order->discount_total;
        $order_used_coupons = $order->get_used_coupons();
        $order_id = $order->ID;

        //check if any coupon is used in this order
        if($order_discount>0) 
        {
            echo "Order No: $order_id <br> Used Coupons:";
            //display coupon code(s)
            foreach($order_used_coupons as $order_used_coupon)
            {
                echo " - $order_used_coupon";
                echo "<br>";
            }
        }
    }
}
