<?php

/**
 * Template Name: Dokumenty
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <div class="documents-grid">
                <?php
                // Tu dodaj logikę wyświetlania dokumentów
                // Możesz użyć Custom Post Type dla dokumentów
                $documents = new WP_Query(array(
                    'post_type' => 'document',
                    'posts_per_page' => -1
                ));

                if ($documents->have_posts()) :
                    while ($documents->have_posts()) : $documents->the_post();
                        get_template_part('template-parts/content', 'document');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
