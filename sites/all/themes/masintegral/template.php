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

    if (isset($variables['node']->tnid)) {
        $variables['bg_url'] = $variables['base_path'].$variables['directory'].'/images/bg_'.$variables['node']->tnid.'.jpg';
    }
    //var_dump($variables['bg_url']);die();
}

