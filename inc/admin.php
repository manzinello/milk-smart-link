<?php

add_action('admin_menu', 'milk_settings');

function milk_settings()
{
    add_menu_page('Milk settings', 'Milk settings', 'manage_options', 'wp-milk', 'milk_settings_page');
};

function milk_settings_page()
{
    ob_start();
    ?>

<?php

return ob_get_clean();
}
