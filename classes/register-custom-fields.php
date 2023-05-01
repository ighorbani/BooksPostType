<?php

// this class register custom fields for ISBN, author name, price
class Register_Custom_Fields
{

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'Book_Meta_Box']);
        add_action('save_post', [$this, 'Save_Book_Meta_Data']);
    }

    public function Book_Meta_Box()
    {
        add_meta_box(
            'book_meta_data', // $id
            'Book Meta Data', // $title
            [$this, 'Book_Author_Meta_Fields'], // $callback
            'book', // $screen
            'normal', // $context
            'high' // $priority
        );
    }

    // this function outputs fields to the editor
    public function Book_Author_Meta_Fields($post)
    {
        wp_head();
        $values = get_post_custom($post->ID);
        $author_value = isset($values['meta_box_author_name']) ? $values['meta_box_author_name'][0] : '';
        $isbn_value = isset($values['meta_box_isbn']) ? $values['meta_box_isbn'][0] : '';
        $price_value = isset($values['meta_box_price']) ? $values['meta_box_price'][0] : '';

        wp_nonce_field('book_meta-box_nonce', 'meta_box_nonce');
        ?>

        <div class="book-mata-box">
            <div>
                <div class="book-mata-field">
                    <label for="meta_box_author_name">
                        Author Name
                    </label>
                    <input placeholder="Book Author" name="meta_box_author_name" id="meta_box_author_name" value="<?php echo $author_value; ?>" />
                </div>

                <div class="book-mata-field">
                    <label for="meta_box_isbn">
                        ISBN
                    </label>
                    <input placeholder="Book ISBN" name="meta_box_isbn" id="meta_box_isbn" value="<?php echo $isbn_value; ?>" />
                </div>

                <div class="book-mata-field">
                    <label for="meta_box_price">
                        Price
                    </label>
                    <input placeholder="Price" name="meta_box_price" id="meta_box_price" value="<?php echo $price_value; ?>" />
                </div>
            </div>
            <div class="book-meta-image"></div>
        </div>

        <?php

    }

    // this function save book meta data from inputs to database
    public function Save_Book_Meta_Data($post_id)
    {
        if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'book_meta-box_nonce')) return;

        // if (!current_user_can('edit_post')) return;

        if (isset($_POST['meta_box_author_name']))
            update_post_meta($post_id, 'meta_box_author_name', $_POST['meta_box_author_name']);

        if (isset($_POST['meta_box_isbn']))
            update_post_meta($post_id, 'meta_box_isbn', $_POST['meta_box_isbn']);

        if (isset($_POST['meta_box_price']))
            update_post_meta($post_id, 'meta_box_price', $_POST['meta_box_price']);
    }
}

new Register_Custom_Fields();
