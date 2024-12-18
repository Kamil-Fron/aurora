<?php

/**
 * Template Name: Strona Główna
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!-- Sekcja Hero -->
        <section class="hero-section">
            <div class="container">
                <h1><?php echo get_bloginfo('name'); ?></h1>
                <p><?php echo get_bloginfo('description'); ?></p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('kontakt'))); ?>" class="button">Skontaktuj się z nami</a>
            </div>
        </section>

        <!-- Aktualności -->
        <section class="news-section">
            <div class="container">
                <h2>Aktualności</h2>
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_type' => 'post'
                ));

                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                        get_template_part('template-parts/content', 'excerpt');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Dokumenty -->
        <section class="documents-section">
            <div class="container">
                <h2>Ważne dokumenty</h2>
                <!-- Tu dodaj listę dokumentów -->
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>
