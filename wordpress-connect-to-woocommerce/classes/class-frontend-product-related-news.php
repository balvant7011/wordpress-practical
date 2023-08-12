<?php
class Product_Related_News {
    public function __construct() {
        add_filter( 'woocommerce_product_tabs', array( $this, 'Add_Product_Related_News_Tab' ) );
    }

    public function Add_Product_Related_News_Tab( $tabs ) {
        // Adds the Attribute Description tab
        $tabs['attrib_desc_tab'] = array(
            'title'     => __( 'Product Related News', 'wordpress-connect-to-woocommerce' ),
            'priority'  => 50,
            'callback'  => array( $this, 'Product_Related_News_Tab_Data' ),
        );

        return $tabs;
    }

    public function Product_Related_News_Tab_Data() {
        global $product;

        $related_news_id = get_post_meta( $product->id, 'product_news', true );

        if ( $related_news_id ) {
            $news_title = get_the_title( $related_news_id );
            $news_image = get_the_post_thumbnail( $related_news_id );
            $news_description = get_the_content( $related_news_id );
            $news_viewers = get_post_meta( $related_news_id, 'news_viewers', true );

            echo '<div class="product-related-news-tab">';
            echo '<h2>Related News</h2>';
            echo '<div class="product-related-news-image">';
            echo $news_image;
            echo '</div>';
            echo '<div class="product-related-news-description">';
            echo '<h3>' . $news_title . '</h3>';
            echo '<p>' . $news_description . '</p>';
            echo '<p>Viewers: ' . $news_viewers . '</p>';
            echo '</div>';
        }else{
            echo '<p>No related news found.</p>';
        }

        
    }
}
?>