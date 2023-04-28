<?php
/**
 * Plugin Name: Divi Short Plugin
 * Description: Adds a custom module to the Divi theme.
 * Version: 1.0
 * Author: Robert Damoc
 * Author URI: Your Website
 */

// Register the custom module
function divi_short_plugin_register_module()
{
    if (class_exists('ET_Builder_Module')) {
        class ET_Builder_Module_Custom_Module extends ET_Builder_Module
        {
            // Define module settings
            public $slug = 'custom_module';
            public $vb_support = 'on';

            // Define module initialization
            public function init()
            {
                $this->name = esc_html__('Custom Module', 'divi');
                $this->icon_path = plugin_dir_url(__FILE__) . 'icon.png';
                $this->advanced_setting_title_text = esc_html__('Custom Module Settings', 'divi');
            }

            // Render module content on the frontend
            public function render($attrs, $content = null, $render_slug)
            {
                // Module content goes here
                $output = '<div class="custom-module">';
                $output .= '<h2>' . esc_html__('Custom Module', 'divi') . '</h2>';
                $output .= '</div>';

                return $output;
            }
        }

        new ET_Builder_Module_Custom_Module();
    }
}

// Hook the module registration to the 'et_builder_ready' action
add_action('et_builder_ready', 'divi_short_plugin_register_module');
