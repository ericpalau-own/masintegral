<?php

/**
 * Add body classes if certain regions have content.
 */
function masintegral_preprocess_html(&$variables) {

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
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_'.$variables['node']->tnid.'.jpg';
    } elseif (isset($variables['title'])) {
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_'.strtolower(str_replace(' ','_',$variables['title'])).'.jpg';
        //} elseif (isset($variables['title']) && strtolower($variables['title']) == 'blog') {
    //    $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_blog.jpg';
    } else {
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_1.jpg';
    }
    $variables['tabs_enabled'] = false;
    //var_dump($variables);die();
}

/**
 * Override or insert variables into the page template.
 */
function masintegral_preprocess_node(&$variables) {

    if ($variables['view_mode'] == 'full' && isset($variables['node']->tnid)) {
        $variables['classes_array'][] = 'node-full-tnid-'.$variables['node']->tnid;
    }

}

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
/*
function masintegral_node_view_alter(&$build) {
    //var_dump($build['links']);die();
    if (isset($build['links']['blog']['#links']['blog_usernames_blog'])) {
        unset($build['links']['blog']['#links']['blog_usernames_blog']);
    }
}
*/