# About Books Post Type Plugin
This plugin is made to add a new post type feature with the title of book to WordPress. Tested on WordPress version **6.2** and PHP version **7.3.29**.
- **Plugin Name:** Books Post Type
- **Creator:** Iman Ghorbani
- **Contact Creator:** imanghorbani.ir@gmail.com


# Sections
### Classes
- **Add_Single_Page:** to create a fontend single page
- **Register_Custom_Fields:** to register custom fields for each book. Including:
    - Book price
    - Book ISBN
    - Author Name
- **Register_Books_Post_Type:** to register "book" post type and also following taxonomies:
    - **Author:** to categorize using book author.
    - **Genre:** to categorize using book genre.

### Templates
- **Book single page template file** (inside templates folder).

### Functions
- **get_taxonomy_terms** function: It returns title and term of taxonomies for each book.

### Styles
- **Editor:** includes styles for wp admin editor
- **Front:** includes styles for front-end page
