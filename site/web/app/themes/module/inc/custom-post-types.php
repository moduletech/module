<?php

//
// Register Post Types
// ----------------------------------------
add_action('init', 'inq_init');
function inq_init()
{

    //
    // Register News
    // ----------------------------------------
    $news_labels = array(
        'name' => _x('News', 'post type general name'),
        'singular_name' => _x('News', 'post type singular name'),
        'all_items' => __('All News'),
        'add_new' => _x('Add News', 'News'),
        'add_new_item' => __('Add News'),
        'edit_item' => __('Edit News'),
        'new_item' => __('New News'),
        'view_item' => __('View News'),
        'search_items' => __('Search in News'),
        'not_found' => __('No News found'),
        'not_found_in_trash' => __('No News found in trash'),
        'parent_item_colon' => ''
    );

    $news_args = array(
        'labels' => $news_labels,
        'public' => true,
        'public_queryable' => false,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'taxonomies' => array(),
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail'),
        'has_archive' => 'news'
    );
    register_post_type('news', $news_args);

    //
    // Register Press
    // ----------------------------------------
    $press_labels = array(
        'name' => _x('Press', 'post type general name'),
        'singular_name' => _x('Press', 'post type singular name'),
        'all_items' => __('All Press'),
        'add_new' => _x('Add Press', 'Press'),
        'add_new_item' => __('Add Press'),
        'edit_item' => __('Edit Press'),
        'new_item' => __('New Press'),
        'view_item' => __('View Press'),
        'search_items' => __('Search in Press'),
        'not_found' => __('No Press found'),
        'not_found_in_trash' => __('No Press found in trash'),
        'parent_item_colon' => ''
    );

    $press_args = array(
        'labels' => $press_labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'taxonomies' => array(),
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => 'press'
    );
    register_post_type('press', $press_args);

    // Register Jobs
    // ----------------------------------------
    $job_labels = array(
        'name' => _x('Jobs', 'post type general name'),
        'singular_name' => _x('Job', 'post type singular name'),
        'all_items' => __('All Jobs'),
        'add_new' => _x('Add Job', 'Jobs'),
        'add_new_item' => __('Add Job'),
        'edit_item' => __('Edit Job'),
        'new_item' => __('New Job'),
        'view_item' => __('View Job'),
        'search_items' => __('Search in Jobs'),
        'not_found' => __('No Jobs found'),
        'not_found_in_trash' => __('No Jobs found in trash'),
        'parent_item_colon' => ''
    );

    $job_args = array(
        'labels' => $job_labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'taxonomies' => array(),
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => 'jobs'
    );
    register_post_type('jobs', $job_args);

    //
    // Register Models
    // ----------------------------------------
    $model_labels = array(
        'name' => _x('Models', 'post type general name'),
        'singular_name' => _x('Model', 'post type singular name'),
        'all_items' => __('All Models'),
        'add_new' => _x('Add Model', 'Models'),
        'add_new_item' => __('Add Model'),
        'edit_item' => __('Edit Model'),
        'new_item' => __('New Model'),
        'view_item' => __('View Model'),
        'search_items' => __('Search in Models'),
        'not_found' => __('No Models found'),
        'not_found_in_trash' => __('No Models found in trash'),
        'parent_item_colon' => ''
    );

    $model_args = array(
        'labels' => $model_labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'taxonomies' => array(),
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => 'models'
    );
    register_post_type('models', $model_args);
}
