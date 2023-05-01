<?php

// get the terms of specific tsxonomy
function get_taxonomy_terms($slug, $title)
{
    $genre_terms = get_the_terms(get_the_ID(), $slug);
    if (!empty($genre_terms)) {
        echo   "<p>" . $title . ": ";
        foreach ($genre_terms as $term) {
            echo "<span>" . $term->name . "</span>";
        }
        echo   "</p>";
    }
}
