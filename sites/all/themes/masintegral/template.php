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

    if (isset($variables['node']->tnid) && $variables['node']->tnid != 0) {
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_'.$variables['node']->tnid.'.jpg';
    } else {
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_1.jpg';
    }
    $variables['tabs_enabled'] = false;
    //var_dump($variables['bg_url']);die();
}

/**
 * Override or insert variables into the page template.
 */
function masintegral_preprocess_node(&$variables) {

    if ($variables['view_mode'] == 'full' && isset($variables['node']->tnid)) {
        $variables['classes_array'][] = 'node-full-tnid-'.$variables['node']->tnid;
    }
}