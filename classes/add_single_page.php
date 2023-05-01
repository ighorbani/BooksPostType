<?php

// this class adds book single page for frontend
class Add_Single_Page
{

    public function __construct()
    {
        add_filter('single_template', [$this, 'Book_Single_Page']);
    }

    // get the single page template from templates folder
    public function Book_Single_Page($single_template)
    {
        global $post;
        $file = plugin_path . '/templates/single-' . $post->post_type . '.php';
        if (file_exists($file)) $single_template = $file;
        return $single_template;
    }
}
new Add_Single_Page();
