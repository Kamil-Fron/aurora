<?php

/**
 * Template Name: Strona Kontaktowa
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <article class="contact-page">
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="contact-content">
                    <div class="contact-info">
                        <h2>Dane kontaktowe</h2>
                        <!-- Tu dodaj dane kontaktowe -->
                    </div>

                    <div class="contact-form">
                        <?php
                        // Wyświetlenie formularza kontaktowego (np. Contact Form 7)
                        if (shortcode_exists('contact-form-7')) {
                            echo do_shortcode('[contact-form-7 id="TWOJE-ID" title="Formularz kontaktowy"]');
                        }
                        ?>
                    </div>
                </div>
            </article>
        </div>
    </main>
</div>

<?php get_footer(); ?>
