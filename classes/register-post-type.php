<?php

// this class registers "book" post type and "genre" and "author" taxonomies.
class Register_Books_Post_Type
{

    public function __construct()
    {
        add_action('init', [$this, 'Books_Post_Type']);
        add_action('init', [$this, 'Books_Genre_Taxonomy']);
        add_action('init', [$this, 'Books_Author_Taxonomy']);
    }

    // register book post type
    public function Books_Post_Type()
    {
        register_post_type(
            'book',
            array(
                'labels' => array(
                    'name' => __('Book'),
                    'singular_name' => __('Book'),
                    'all_items' => __('Books'),
                    'add_new' => __('New Book'),
                    'add_new_item' => __('New Book'),
                    'edit_item' => __('Edit Book'),
                    'new_item' => __('New Book'),
                    'view_item' => __('View Book'),
                    'search_items' => __('Search in Books'),
                    'not_found' =>  __('No Book Found!'),
                    'not_found_in_trash' => __('No Book Found!'),
                    'archives' =>  __('books'),
                ),
                'public' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-book',
                'thumbnail' => 'Book Thubnail',
                'taxonomies' => ['author','genre'],
                'query_var' => true,
                'show_in_rest' => true,
                'menu_position' => 20,
                'supports'    => array('custom-fields', 'title', 'editor', 'thumbnail')
            )
        );
    }

    // register author taxonomy
    public function Books_Author_Taxonomy()
    {
        register_taxonomy(
            'author',
            array('book'),
            array(
                'labels' => array(
                    'name' => __('Authors'),
                    'singular_name' => __('Author'),
                    'add_new_item' => __('Add Author'),
                    'all_items' => __('All Authors'),
                    'add_new' => __('Add Author'),
                    'edit_item' => __('Edit Author'),
                    'new_item' => __('New Author'),
                    'view_item' => __('View Author'),
                    'search_items' => __('Search Author'),
                    'not_found' =>  __('No Author Found!'),
                    'not_found_in_trash' => __('No Author Found!'),
                    'archives' =>  __('authors'),
                ),
                'public' => true,
                'show_admin_column' => true,
                'show_in_quick_edit' => true,
                'show_in_rest' => true,
                'query_var' => true,
                'hierarchical' => false,
                'rewrite' => [
                    'slug' => 'author'
                ],
            )
        );
    }

    // register genre taxonomy
    public function Books_Genre_Taxonomy()
    {
        register_taxonomy(
            'genre',
            array('book'),
            array(
                'labels' => array(
                    'name' => __('Genres'),
                    'singular_name' => __('Genre'),
                    'add_new_item' => __('Add Genre'),
                    'all_items' => __('All Genres'),
                    'add_new' => __('Add Genere'),
                    'edit_item' => __('Edit Genre'),
                    'new_item' => __('New Genre'),
                    'view_item' => __('View Genre'),
                    'search_items' => __('Search Genere'),
                    'not_found' =>  __('No Genere Found!'),
                    'not_found_in_trash' => __('No Genere Found!'),
                    'archives' =>  __('genres'),
                ),
                'public' => true,
                'show_admin_column' => true,
                'show_in_quick_edit' => true,
                'show_in_rest' => true,
                'query_var' => true,
                'hierarchical' => true,
                'rewrite' => [
                    'slug' => 'genre',
                    'hierarchical' => true,
                ],
            )
        );
    }
}
new Register_Books_Post_Type();
