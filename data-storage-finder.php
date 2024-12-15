<?php
/**
 * 
 * Data Storage Finder
 *
 * @package     DataStorageFinder
 * @author      Kamaljit Aulakh
 * @copyright   2025 Kamaljit Aulakh
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Data Storage Finder
 * Plugin URI: 
 * Description: Handles all CSS and JavaScript assets from the Finder theme
 * Version: 1.0
 * Author: Your Name
 * Author URI: 
 * License: GPL v2 or later
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

class data_storage_finder
{
    public function __construct()
    {
        // Register our hooks
        add_action('wp_enqueue_scripts', array($this, 'load_css'));
        add_action('wp_enqueue_scripts', array($this, 'load_js'));
        add_shortcode('modal', array($this, 'modal_shortcode'));
        add_shortcode('questions_table', array($this, 'questions_shortcode'));
        add_shortcode('copyright', array($this, 'copyright_shortcode'));
        add_shortcode('details_table', array($this, 'details_table_shortcode'));
    }

    //contains code for header welcome message and feedback modal form
    function modal_shortcode()
    {
        ob_start();
        include plugin_dir_path(__FILE__) . 'templates/modal-template.php';
        return ob_get_clean();
    }

    function questions_shortcode()
    {
        ob_start();
        include plugin_dir_path(__FILE__) . 'templates/questions-template.php';
        return ob_get_clean();
    }

    function copyright_shortcode()
    {
        ob_start();
        include plugin_dir_path(__FILE__) . 'templates/copyright-template.php';
        return ob_get_clean();
    }

    function details_table_shortcode()
    {
        ob_start();
        include plugin_dir_path(__FILE__) . 'templates/table-template.php';
        return ob_get_clean();
    }


    public function load_css()
    {
        // Custom Finder CSS
        wp_register_style(
            'finder_css',
            plugins_url('css/finder-style.css', __FILE__),
            array(),
            '1.0.0',
            'all'
        );
        wp_enqueue_style('finder_css');

        wp_enqueue_style(
            'font_awesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css',
            array(),
            '6.6.0'
        );

        // Syracuse CSS (CDN)
        wp_enqueue_style(
            'syracuse-css-cdn',
            'https://assets.cdn.syr.edu/dds/latest/dds.min.css',
            array(),
            'latest'
        );
    }

    public function load_js()
    {
        // Ensure jQuery is loaded
        wp_enqueue_script('jquery');

        // Custom Button JS
        wp_register_script(
            'js_for_buttons',
            plugins_url('js/button.js', __FILE__),
            array(),
            '1.0.1',
            false
        );
        wp_enqueue_script('js_for_buttons');

        // wp_register_script(
        //     'js_for_modal',
        //     plugins_url('js/modal.js', __FILE__),
        //     array(),
        //     '1.0.1',
        //     false
        // );
        // wp_enqueue_script(handle: 'js_for_modal');

        // Storage Card JS
        wp_register_script(
            'js_for_cards',
            plugins_url('js/storageCard.js', __FILE__),
            array(),
            '1.0.0',
            false
        );
        wp_enqueue_script('js_for_cards');

        // Forms JS
        wp_register_script(
            'js_for_forms',
            plugins_url('js/form.js', __FILE__),
            array(),
            '1.0.0',
            false
        );
        wp_enqueue_script('js_for_forms');

        //Log Scale for JS
        wp_register_script(
            'js_for_log_scale',
            plugins_url('js/logScale.js', __FILE__),
            array(),
            '1.0.0',
            false
        );
        wp_enqueue_script('js_for_log_scale');

        //JQuery for modal open and close
        wp_register_script(
            'js_for_modal',
            plugins_url('js/triggerModal.js', __FILE__),
            array('jquery'),
            '1.0.0',
            false
        );
        wp_enqueue_script('js_for_modal');

        wp_localize_script('js_for_cards', 'pluginData', array(
            'jsonUrl' => plugins_url('/templates/data/storage-services.json', __FILE__),
        ));
    }

    // Activation Hook
    public static function activate()
    {
        // Add any activation code here if needed
    }

    // Deactivation Hook
    public static function deactivate()
    {
        // Add any cleanup code here if needed
    }
}

// Initialize the plugin
$data_storage_finder = new data_storage_finder();

// Register activation and deactivation hooks
register_activation_hook(__FILE__, array('data_storage_finder', 'activate'));
register_deactivation_hook(__FILE__, array('data_storage_finder', 'deactivate'));