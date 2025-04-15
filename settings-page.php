<?php

add_action('admin_menu', function () {
    add_menu_page(
        'Pipeback',
        'Pipeback',
        'manage_options',
        'pipeback',
        'pipeback_settings_page',
        plugins_url('/assets/images/icon-light.png', dirname(__FILE__, 1) . '/pipeback.php'),
        60
    );
});

add_action('admin_init', function () {
    register_setting('pipeback_settings_group', 'pipeback_workspace_id');

    add_settings_section(
        'pipeback_settings_section',
        'Configurações do Pipeback',
        null,
        'pipeback'
    );

    add_settings_field(
        'pipeback_workspace_id',
        'Workspace ID',
        'pipeback_workspace_id_input',
        'pipeback',
        'pipeback_settings_section'
    );
});

function pipeback_workspace_id_input()
{
    $value = get_option('pipeback_workspace_id');
    echo '<input type="text" name="pipeback_workspace_id" value="' . esc_attr($value) . '" class="regular-text">';
}

function pipeback_settings_page()
{
?>
    <div class="wrap">
        <h1>Pipeback</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('pipeback_settings_group');
            do_settings_sections('pipeback');
            submit_button();
            ?>
        </form>
    </div>
<?php
}
