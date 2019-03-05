<?php

add_action('admin_menu', 'milk_settings');

function milk_settings()
{
    add_menu_page('Milk settings', 'Milk settings', 'manage_options', 'wp-milk', 'milk_settings_page');
}

function post_milk_settings()
{

    $id = $_POST['id'];
    $ios = $_POST['ios'];
    $android = $_POST['android'];

    add_option('milk_id', $id);
    add_option('milk_ios', $ios);
    add_option('milk_android', $android);

}


function milk_settings_page()
{

    post_milk_settings();

    ?>

    <link rel="stylesheet" href="<?php echo(WP_PLUGIN_DIR) ?>/wp-milk/assets/css/bulma.min.css"/>
    <link rel="stylesheet" href="http://localhost:8888/wordpress/wp-content/plugins/wp-milk/assets/css/bulma.min.css"/>

    <section class="section">
        <div class="container">

            <h1 class="title">Milk</h1>

            <form method="post" action="">
                <div class="field">
                    <label class="label">Id della pagina Milk</label>
                    <div class="control">
                        <input class="input" type="text" name="id" value="<?php echo(get_option('milk_id')) ?>">
                    </div>
                </div>
                <div class="field">
                    <label class="label">iOS</label>
                    <div class="control">
                        <input class="input" type="text" name="ios" value="<?php echo(get_option('milk_ios')) ?>">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Android</label>
                    <div class="control">
                        <input class="input" type="text" name="android" value="<?php echo(get_option('milk_android')) ?>">
                    </div>
                </div>
                <a class="button is-primary is-large" type="submit">Milk</a>
            </form>
        </div>
    </section>


    <?php

}
