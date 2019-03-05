<?php

add_action('admin_menu', 'milk_settings');

function milk_settings()
{
    add_menu_page('Milk settings', 'Milk settings', 'manage_options', 'wp-milk', 'milk_settings_page');
}

function post_milk_settings()
{
}


function milk_settings_page()
{

    post_milk_settings();

    ?>

    <link rel="stylesheet" href="<?php echo(WP_PLUGIN_DIR) ?>/wp-milk/assets/css/bulma.min.css"/>

    <h1>Milk settings</h1>

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
        <input class="button is-primary" type="submit" value="Milk!">
    </form>

    <?php

}
