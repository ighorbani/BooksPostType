<?php

/**
 * The template for displaying a single book.
 */
wp_head();
include_once(plugin_path . "functions.php");
while (have_posts()) : the_post();
    $book_meta_data = get_post_meta(get_the_ID(), '', true);

?>
    <div class="single-book-page-flex">

        <div class="single-book">
            <div class="single-book-title-image">
                <div class="single-book-title">
                    <h1><?php the_title(); ?></h1>

                    <div class="book-taxonomies">
                        <?php
                        get_taxonomy_terms('genre', 'Genre');
                        get_taxonomy_terms('author', 'Author');
                        ?>
                    </div>

                    <div class="hr-line"></div>

                    <div class="single-book-meta">
                        <div class="single-book-meta-field">
                            <span>
                                <div class="meta-icon"></div>Author Name
                            </span>
                            <p><?php echo $book_meta_data['meta_box_author_name'][0]; ?></p>
                        </div>
                        <div class="single-book-meta-field">
                            <span>
                                <div class="meta-icon"></div>ISBN
                            </span>
                            <p><?php echo $book_meta_data['meta_box_isbn'][0]; ?></p>
                        </div>
                        <div class="single-book-meta-field">
                            <span>
                                <div class="meta-icon"></div>Price
                            </span>
                            <p><?php echo $book_meta_data['meta_box_price'][0]; ?></p>
                        </div>
                    </div>

                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-book-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="single-book-content"><?php the_content();  ?></div>
        </div>

        <div class="single-book-widgets-bar">
            <h4>Widgets</h4>
        </div>

    </div>

<?php
endwhile;
// get_footer();
?>