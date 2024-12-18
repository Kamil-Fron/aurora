<?php

/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php
                // Data publikacji
                echo '<span class="posted-on">' . get_the_date() . '</span>';
                // Autor
                echo '<span class="byline"> przez ' . get_the_author() . '</span>';
                ?>
            </div>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
            echo '<a href="' . esc_url(get_permalink()) . '" class="read-more">Czytaj więcej</a>';
        endif;
        ?>
    </div>
</article>
