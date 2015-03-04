<?php

/**
 * Add body classes if certain regions have content.
 */
function masintegral_preprocess_html(&$variables) {
    // Add body class related to tnid attribute
    $node_loaded = menu_get_object();
    if (isset($node_loaded)) {
        $variables['classes_array'][] = 'page-tnid-'.$node_loaded->tnid;
    }

}

/**
 * Override or insert variables into the page template.
 */
function masintegral_process_page(&$variables) {

    if (isset($variables['node']->tnid) && $variables['node']->tnid != 0 && $variables['node']->type == 'page') {
        // Background for all pages
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_'.$variables['node']->tnid.'.jpg';
    } elseif (arg(0) == 'blog' || arg(0) == 'comment' || arg(0) == 'taxonomy' || (isset($variables['node']->type) && $variables['node']->type == 'blog')) {
        // Background for all blog url's
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_blog.jpg';
    } elseif (isset($variables['title']) && strtolower(str_replace(' ','_',$variables['title'])) == 'newsletter') {
        // Background for system pages
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_'.strtolower(str_replace(' ','_',$variables['title'])).'.jpg';
    } else {
        // Otherwise Default background
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_1.jpg';
    }

    // Disable node tabs. Only enable for user page
    if (arg(0) == 'user' && user_is_logged_in()) {
        $variables['tabs_enabled'] = true;
    } else {
        $variables['tabs_enabled'] = false;
    }
}

/**
 * Override or insert variables into the page template.
 */
function masintegral_preprocess_node(&$variables) {
    // Add node content class related to tnid attribute
    if ($variables['view_mode'] == 'full' && isset($variables['node']->tnid)) {
        $variables['classes_array'][] = 'node-full-tnid-'.$variables['node']->tnid;
    }

}

/**
 * Reorganize quicktabs rendered html to print container before tabs
 *
 * @param $variables
 * @return string
 */
function masintegral_qt_quicktabs($variables) {
    $element = $variables['element'];
    $output = '<div ' . drupal_attributes($element['#options']['attributes']) . '>';
    $output .= drupal_render($element['container']);
    $output .= drupal_render($element['tabs']);


    $output .= '</div>';
    return $output;
}

/**
 * Remove blog_usernames_blog from node links
 * @param $build
 */

function masintegral_node_view_alter(&$build) {
    /*
    //var_dump($build['links']);die();
    if (isset($build['links']['blog']['#links']['blog_usernames_blog'])) {
        unset($build['links']['blog']['#links']['blog_usernames_blog']);
    }
    */

    $node = $build['#node'];
    if (!empty($node->nid)) {
        $build['#contextual_links']['node'] = array('node', array($node->nid));
    }
}
