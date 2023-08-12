<?php 
class Add_Product_Tab_IN_Admin{
    public function __construct(){
        // Add Tab in product page
        add_action('woocommerce_product_data_tabs',array($this,'Add_Product_Tab'));
        add_action('woocommerce_product_data_panels',array($this,'Add_Product_Tab_Content'));
        add_action('woocommerce_process_product_meta',array($this,'Save_Product_Tab_Data'));
    }

    public function Add_Product_Tab($tabs){
        $tabs['news_tab'] = array(
            'label' => __( 'News Tab', 'wordpress-connect-to-woocommerce' ), // translatable
            'target' => 'news_tab_content',
            'priority'  => 50,
        );
        return $tabs;
    }

    public function Add_Product_Tab_Content(){
        global $post;
        
        echo '<div id="news_tab_content" class="panel woocommerce_options_panel">';
        
        wp_dropdown_pages( array(
            'id'                => 'product_news',
            'name'              => 'product_news',
            'label'         => __('Select News', 'wordpress-connect-to-woocommerce'),
            'post_type'      => 'news',
            'show_option_none'  => __('Select News', 'wordpress-connect-to-woocommerce'),
            'selected' => get_post_meta($post->ID, 'product_news', true),
        ) );

        echo '</div>';
    }

    public function Save_Product_Tab_Data($product_id){
        if(isset($_POST['product_news'])){
            update_post_meta($product_id,'product_news',$_POST['product_news']);
        }
    }
}
?>