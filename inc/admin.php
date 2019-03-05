<?php

add_action('admin_menu', 'milk_settings');

function milk_settings()
{
    add_menu_page('Milk settings', 'Milk settings', 'manage_options', 'wp-milk', 'milk_settings_page');
}

function milk_settings_page()
{
    ob_start();
    ?>

    <form action="/action_page.php">
        ID della pagina Milk<br>
        <input type="text" name="id">
        <br>
        iOS<br>
        <input type="text" name="ios">
        <br>
        Android<br>
        <input type="text" name="android">
        <br><br>
        <input type="submit" value="Milk!">
    </form>

    <?php

    return ob_get_clean();
}
