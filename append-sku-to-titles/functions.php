function append_sku_to_titles() {

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

    $new_title = $_title . " " . $_sku;

    /*
    *   Tested.
    *   echo $_title + $_sku;
    *   echo("<script>console.log('Old: ".$_title. " - ". $_sku."');</script>");
    *   echo("<script>console.log('New: ".$new_title."');</script>");
    */

    $updated = array();
    $updated['ID'] = $id;
    $updated['post_title'] = $new_title;

    wp_update_post( $updated );
}}

//Call the function with footer (*Attention)
add_action( 'wp_footer', 'append_sku_to_titles' );
