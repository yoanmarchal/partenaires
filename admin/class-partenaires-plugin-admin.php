<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @author     Your Name <marchalyoan@gmail.com>
 */
class partenaires_plugin_Admin
{
    /**
         * The ID of this plugin.
         *
         * @since    1.0.0
         *
         * @var string The ID of this plugin.
         */
        private $partenaires_plugin;

        /**
         * The version of this plugin.
         *
         * @since    1.0.0
         *
         * @var string The current version of this plugin.
         */
        private $version;

         /**
          * Initialize the class and set its properties.
          *
          * @since    1.0.0
          *
          * @param      string    $partenaires_plugin       The name of this plugin.
          * @param      string    $version    The version of this plugin.
          */

         /**
          * Holds the values to be used in the fields callbacks.
          */
         private $options;

    public function __construct($partenaires_plugin, $version)
    {
        $this->partenaires_plugin = $partenaires_plugin;
        $this->version = $version;
        add_action('init', [$this, 'init_cpt_partenaires']);
    }

        /**
         * Register the stylesheets for the admin area.
         *
         * @since    1.0.0
         */
        public function enqueue_styles()
        {

            /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in partenaires_plugin_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The partenaires_plugin_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

            wp_enqueue_style($this->partenaires_plugin, plugin_dir_url(__FILE__).'css/slider-plugin-admin.css', [], $this->version, 'all');
        }

        /**
         * Register the JavaScript for the admin area.
         *
         * @since    1.0.0
         */
        public function enqueue_scripts()
        {

            /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in partenaires_plugin_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The partenaires_plugin_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

            wp_enqueue_script($this->partenaires_plugin, plugin_dir_url(__FILE__).'js/slider-plugin-admin.js', ['jquery'], $this->version, false);
        }

    public function init_cpt_partenaires()
    {
        $labels = [
        'name'                => _x('partenaires', 'Post Type General Name', 'text_domain'),
        'singular_name'       => _x('Partenaire', 'Post Type Singular Name', 'text_domain'),
        'menu_name'           => __('Partenaire', 'text_domain'),
        'parent_item_colon'   => __('Parent Partenaire:', 'text_domain'),
        'all_items'           => __('All partenaires', 'text_domain'),
        'view_item'           => __('View Partenaire', 'text_domain'),
        'add_new_item'        => __('Add New Partenaire', 'text_domain'),
        'add_new'             => __('New Partenaire', 'text_domain'),
        'edit_item'           => __('Edit Partenaire', 'text_domain'),
        'update_item'         => __('Update Partenaire', 'text_domain'),
        'search_items'        => __('Search partenaires', 'text_domain'),
        'not_found'           => __('No partenaires found', 'text_domain'),
        'not_found_in_trash'  => __('No partenaires found in Trash', 'text_domain'),
    ];

        $args = [
        'label'               => __('partenaires', 'text_domain'),
        'description'         => __('partenaires', 'text_domain'),
        'labels'              => $labels,
        'supports'            => ['title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'],
        'taxonomies'          => ['category', 'post_tag'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => '',
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    ];

        register_post_type('partenaires', $args);
    }
}
