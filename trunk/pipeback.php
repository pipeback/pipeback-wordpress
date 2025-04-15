<?php
/**
 * Plugin Name: Pipeback
 * Plugin URI: http://wordpress.org/plugins/pipeback/
 * Description: Pipeback Live Chat - Pipeback provides a comprehensive live chat widget solution with an AI chatbot, CRM, help center, and more. Seamlessly integrated with WordPress and WooCommerce, it automatically displays the names and emails of logged-in visitors. Create a free account or log in with an existing one to get started.
 * Author: Pipeback
 * Version: 1.0.0
 * Author URI: https://pipeback.com
 * Text Domain: pipeback
*/

if (!defined('ABSPATH')) {
    exit;
}

// Carrega a página de configuração
require_once plugin_dir_path(__FILE__) . 'settings-page.php';

// Injeta o script do Pipeback no front
add_action('wp_head', function () {
    $workspace_id = get_option('pipeback_workspace_id');
    if (!$workspace_id) return;

    echo '<script type="text/javascript">';
    echo 'window.$pipeback=[];';
    echo 'window.PIPEBACK_ID="' . esc_js($workspace_id) . '";';
    echo '(function(){d=document;s=d.createElement("script");s.src="https://widget.pipeback.com/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();';
    echo '</script>';
});