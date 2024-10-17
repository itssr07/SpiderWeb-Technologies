<?php
/*
Template Name: Featured Blog Layout
*/
get_header();
?>

<div class="featured-blog-container">
    <div class="row first-row">
        <?php
        // WordPress loop for the first 3 blog posts (1st row with 3 columns)
        $args = array('posts_per_page' => 3, 'category_name' => 'featured');
        $featured_posts = new WP_Query($args);

        if ($featured_posts->have_posts()):
            while ($featured_posts->have_posts()): $featured_posts->the_post();
        ?>
                <div class="col-1">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    </a>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>

    <div class="row second-row">
        <?php
        // WordPress loop for the next 2 blog posts (2nd row with 2 columns)
        $args = array('posts_per_page' => 2, 'offset' => 3, 'category_name' => 'featured');
        $featured_posts = new WP_Query($args);

        if ($featured_posts->have_posts()):
            while ($featured_posts->have_posts()): $featured_posts->the_post();
        ?>
                <div class="col-2">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    </a>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
