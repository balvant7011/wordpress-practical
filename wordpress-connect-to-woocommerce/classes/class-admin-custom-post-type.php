<?php
class News_Custom_Post_Type {
    public function __construct() {
        // Add custom post type News
        add_action( 'init', array( $this, 'News_register_Custom_Post_Type' ) );
        // Add meta box for custom post type News
        add_action( 'add_meta_boxes', array( $this, 'Add_No_of_Viewers_Meta_Box' ) );
        // Save meta box data
        add_action( 'save_post', array( $this, 'Save_No_of_Viewers_Data' ) );

        // Add sidebar template
        add_filter( 'single_template', array( $this, 'Load_Signle_News_Template' ) );

        // JS for custom post type News
        add_action( 'wp_enqueue_scripts', array( $this, 'Add_News_Custom_Post_Type_JS' ) );
    }

    // Add js file
    public function Add_News_Custom_Post_Type_JS() {
        wp_enqueue_script( 'custom-js', TEMPLATEURL .'/wordpress-connect-to-woocommerce/assest/js/custom.js', array( 'jquery' ), '1.0.0', true );
    }

    // Register custom post type News
    public function News_register_Custom_Post_Type() {
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'News', 'wordpress-connect-to-woocommerce' ),
            'singular_name'       => _x( 'News', 'wordpress-connect-to-woocommerce' ),
            'menu_name'           => __( 'News', 'wordpress-connect-to-woocommerce' ),
            'parent_item_colon'   => __( 'Parent News', 'wordpress-connect-to-woocommerce' ),
            'all_items'           => __( 'All News', 'wordpress-connect-to-woocommerce' ),
            'view_item'           => __( 'View News', 'wordpress-connect-to-woocommerce' ),
            'add_new_item'        => __( 'Add New News', 'wordpress-connect-to-woocommerce' ),
            'add_new'             => __( 'Add New', 'wordpress-connect-to-woocommerce' ),
            'edit_item'           => __( 'Edit News', 'wordpress-connect-to-woocommerce' ),
            'update_item'         => __( 'Update News', 'wordpress-connect-to-woocommerce' ),
            'search_items'        => __( 'Search News', 'wordpress-connect-to-woocommerce' ),
            'not_found'           => __( 'Not Found', 'wordpress-connect-to-woocommerce' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'wordpress-connect-to-woocommerce' ),
        );

        // Set other options for Custom Post Type
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail'),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'has_archive'         => true,
        );

        // Registering your Custom Post Type
        register_post_type( 'news', $args );
    }

    // Add No of Viewers Meta Box
    public function Add_No_of_Viewers_Meta_Box() {
        add_meta_box( 'number_of_viewers', 'Number of Viewers', array( $this, 'No_of_Viewers_Meta_Box_Callback' ), 'news', 'side', 'high' );
    }

    // No of Viewers Meta Box Callback
    public function No_of_Viewers_Meta_Box_Callback( $post ) {
        $viewers = get_post_meta( $post->ID, 'news_viewers', true );
        ?>
        <label for="news_viewers">Enter the Number of Viewers:</label>
        <input type="number" id="news_viewers" name="news_viewers" value="<?php echo esc_attr($viewers); ?>" />
        <?php
    }

    // Save data in No of Viewers Meta Box
    public function Save_No_of_Viewers_Data( $post_id ) {
        // Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        if(isset($_POST['news_viewers'])) {
            $viewers = esc_html($_POST['news_viewers']);
            update_post_meta( $post_id, 'news_viewers', $viewers );
        }
    }

    // Signle template for single News
    public function Load_Signle_News_Template( $template ) {
        global $post;
        
        if( $post->post_type == 'news' ) {
            if( file_exists( TEMPLATEPATH . 'template-part/single-news.php' ) ) {
                return TEMPLATEPATH . 'template-part/single-news.php';
            }
        }

        return $template;
    }
}

// class Visit_News_Counter {
//     public function __construct() {
//         add_action( 'wp', array( $this, 'Visit_News_Counter_Function' ) );
//     }

//     public function Visit_News_Counter_Function() {

//         echo '<pre>';
//             print_r($news_id);
//             echo '<pre>';
//             exit;
//         if( is_single() && get_post_type() == 'news')  {
//             $news_id = get_the_ID();
            
//             $news_viewers = get_post_meta( $news_id, 'news_viewers', true );
//             $viewers = ($news_viewers == '') ? 1 : intval($news_viewers) + 1;
//             update_post_meta( $news_id, 'news_viewers', $viewers );
//         }
//     }

//     public function Get_News_Viewers($news_id) {
//         $viewers = get_post_meta( $news_id, 'news_viewers', true );
//         return ($viewers == '') ? 0 : intval($viewers);
//     }
// }
?>