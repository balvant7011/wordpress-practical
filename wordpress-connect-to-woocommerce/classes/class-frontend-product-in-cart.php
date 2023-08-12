<?php 
class News_Feature_Logo_in_Cart {
    public function __construct() {
        add_filter( 'woocommerce_cart_item_name', array( $this, 'Display_New_Logo_in_Cart_Page' ), 10, 3);
    }

    public function Display_New_Logo_in_Cart_Page( $item_name,  $cart_item,  $cart_item_key ) {
        // Check if the product is a logo
        if ($this->Has_News_Feature_Logo_in_Cart( $cart_item['product_id'] ) ) {
            $news_image = get_the_post_thumbnail_url( get_post_meta( $cart_item['product_id'], 'product_news', true ) );
            if($news_image){
                $news_thumbnail = '<a href="'.$this->Get_News_Feature_Logo_in_Cart($cart_item['product_id']).'"><img src="'.$news_image.'" alt="'.get_the_title($cart_item['product_id']).'" /></a>';
                $item_name = $news_thumbnail . '<a href="'.$this->Get_News_Feature_Logo_in_Cart($cart_item['product_id']).'">'.$item_name.'</a>';
            }
        }
        return $item_name;
    }

    // Check if the News product is a logo
    public function Has_News_Feature_Logo_in_Cart( $product_id ) {
        return get_post_meta( $product_id, 'product_news', true ) !== '';
    }

    // Get the News product logo link
    private function Get_News_Feature_Logo_in_Cart( $product_id ) {
        return get_permalink(get_post_meta( $product_id, 'product_news', true ));
    }

}

?>