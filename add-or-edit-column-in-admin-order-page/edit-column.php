add_action( 'manage_shop_order_posts_custom_column', 'column_content_with_custom_text' );

function column_content_with_custom_text( $column )
{
    global $post;
    
    //this will add "Your Custom Text" at the beginning of billing address column in order page
    //you may change this to edit another column
    if ( 'billing_address' === $column ) 
    {
        echo "<b>Your Custom Text</b><br>";
    }
}

//code goes to functions.php of your child theme (or active theme)
