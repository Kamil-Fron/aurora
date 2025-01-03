// page-templates/template-member-dashboard.php

<?php
/**
 * Template Name: Panel Członkowski
 */

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

get_header();
?>

<div class="member-dashboard">
    <div class="container">
        <div class="dashboard-grid">
            <!-- Sidebar nawigacyjny -->
            <aside class="dashboard-sidebar">
                <nav class="dashboard-nav">
                    <ul>
                        <li><a href="#profile" class="active">Mój profil</a></li>
                        <li><a href="#documents">Moje dokumenty</a></li>
                        <li><a href="#notifications">Powiadomienia</a></li>
                        <li><a href="#meetings">Spotkania</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Główna zawartość -->
            <main class="dashboard-content">
                <!-- Sekcja profilu -->
                <section id="profile" class="dashboard-section">
                    <h2>Mój profil</h2>
                    <?php
                    $current_user = wp_get_current_user();
                    $member_query = new WP_Query(array(
                        'post_type' => 'member',
                        'meta_query' => array(
                            array(
                                'key' => 'member_id',
                                'value' => $current_user->ID,
                            )
                        )
                    ));

                    if ($member_query->have_posts()) :
                        while ($member_query->have_posts()) : $member_query->the_post();
                    ?>
                            <div class="profile-info">
                                <div class="profile-avatar">
                                    <?php echo get_avatar($current_user->ID, 150); ?>
                                </div>
                                <div class="profile-details">
                                    <h3><?php echo esc_html($current_user->display_name); ?></h3>
                                    <p><strong>Email:</strong> <?php echo esc_html($current_user->user_email); ?></p>
                                    <p><strong>Dział:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'department', true)); ?></p>
                                    <p><strong>Telefon:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'phone', true)); ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </section>

                <!-- Sekcja dokumentów -->
                <section id="documents" class="dashboard-section">
                    <h2>Moje dokumenty</h2>
                    <div class="documents-grid">
                        <?php
                        $documents = new WP_Query(array(
                            'post_type' => 'document',
                            'posts_per_page' => -1,
                            'author' => $current_user->ID
                        ));

                        if ($documents->have_posts()) :
                            while ($documents->have_posts()) : $documents->the_post();
                        ?>
                                <div class="document-card">
                                    <div class="document-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="document-info">
                                        <h4><?php the_title(); ?></h4>
                                        <span class="document-date"><?php echo get_the_date(); ?></span>
                                    </div>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="document-download">Pobierz</a>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>Brak dokumentów do wyświetlenia.</p>';
                        endif;
                        ?>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>
