<?php

/**
 * Template for displaying single posts
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'single');

            // Nawigacja między postami
            the_post_navigation(array(
                'prev_text' => '&larr; %title',
                'next_text' => '%title &rarr;'
            ));

            // Komentarze
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile;
        ?>
    </main>
</div>

<?php
get_sidebar();
get_footer();
