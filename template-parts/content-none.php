<?php

/**
 * Template part for displaying a message that posts cannot be found
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title">Nic nie znaleziono</h1>
    </header>

    <div class="page-content">
        <?php
        if (is_search()) :
        ?>
            <p>Przepraszamy, ale nic nie pasuje do twojego wyszukiwania. Spróbuj ponownie z innymi słowami kluczowymi.</p>
        <?php
            get_search_form();
        else :
        ?>
            <p>Wygląda na to, że nie możemy znaleźć tego, czego szukasz.</p>
        <?php
        endif;
        ?>
    </div>
</section>
