<?php get_header(); ?>
<div class="news-single-content">
    <div class="news-single-content-container">
        <?php
        $news_viewers = get_post_meta( get_the_ID(), 'news_viewers', true );
        $viewers = ($news_viewers == '') ? 1 : intval($news_viewers) + 1;
        update_post_meta( get_the_ID(), 'news_viewers', $viewers );
        
        the_title('<h1>', '</h1>');
        the_content();
        
        // Display published date
        echo '<p class="news-date">Published on: '.get_the_date().'</p>';
        
        the_post_thumbnail('large');

        // Display visit counter
        echo '<p class="news-visit-counter">Viewers: '.$viewers.'</p>';

        ?>
    </div>
</div>
<div class="content-area">
    <textarea id="inupttrxtarea" maxlength="50" placeholder="Write your comment here..."></textarea>
    <p id="characters-remaining">0 characters remaining</p>

    <div>
        <p>PHP Exercises</p>
        <p>WordPress Exercises</p>
        <p>Drupal Exercises</p>
        <p>Python Exercises</p>
        <p>.NET Exercises</p>
        <p>Laravel Exercises</p>
        <p>ReactJS Exercises</p>
    </div>

    <div id="exercises">
        <p>PHP Exercises</p>
        <p>WordPress Exercises</p>
        <p>Drupal Exercises</p>
        <p>Python Exercises</p>
        <p>.NET Exercises</p>
        <p>Laravel Exercises</p>
        <p>ReactJS Exercises</p>
    </div>

</div>
<div class="highest-order-area">
<?php 
global $wpdb;

$highest_order_id = $wpdb->get_var("SELECT p.ID FROM $wpdb->posts AS p JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id WHERE p.post_type = 'shop_order' AND p.post_status = 'wc-completed' AND pm.meta_key = '_order_total' ORDER BY CAST(pm.meta_value AS DECIMAL(10,2)) DESC LIMIT 1");

$highest_order = wc_get_order($highest_order_id);

if($highest_order){
    echo "Highest Order ID: ".$highest_order->get_order_number()."<br>";
    echo "Highest Order Total: ".$highest_order->get_total()."<br>";
}

$smallest_order_id = $wpdb->get_var("SELECT p.ID FROM $wpdb->posts AS p JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id WHERE p.post_type = 'shop_order' AND p.post_status = 'wc-completed' AND pm.meta_key = '_order_total' ORDER BY CAST(pm.meta_value AS DECIMAL(10,2)) ASC LIMIT 1");

$smallest_order = wc_get_order($smallest_order_id);

if($smallest_order){
    echo "Smallest Order ID: ".$smallest_order->get_order_number()."<br>";
    echo "Smallest Order Total: ".$smallest_order->get_total()."<br>";
}
?>
</div>
<div class="employees-area">
    <?php
    $query = "
        SELECT e.emp_id, e.emp_name, e.salary, d.dep_name 
        FROM {$wpdb->prefix}employees AS e 
        INNER JOIN {$wpdb->prefix}department AS d ON e.dep_id = d.dep_id 
        WHERE e.job_name IN ('MANAGER', 'ANALYST') 
        AND d.dep_location NOT IN ('SYDNEY', 'MELBOURNE') 
        AND DATEDIFF(CURDATE(), e.hire_date) > 3650 
        AND e.commission IS NOT NULL 
        ORDER BY e.emp_name DESC, e.hire_date DESC";

    $results = $wpdb->get_results($query);

    if($results){
        foreach($results as $result){
            echo "Employee Name: ".$result->emp_id."<br>";
            echo "Employee Name: ".$result->emp_name."<br>";
            echo "Salary: ".$result->salary."<br>";
            echo "Department: ".$result->dep_name."<br>";
        }
    }else{
        echo "No results found";
    }
?>
</div>
<?php get_footer(); ?>
