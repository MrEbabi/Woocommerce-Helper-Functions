function is_it_a_shop_order($givenNumber)
{   
    if(get_post_type($givenNumber) == "shop_order")
    {
        echo "yes this is a valid order number";
    }
    else
    {
        echo "no go away";
    }
}


//Wordpress stores all posts (pages, orders, products etc.) in wp_posts table and orders are stored with post type named "shop_order".
