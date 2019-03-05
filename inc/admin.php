<?php

add_action('admin_menu', 'milk_settings');

function milk_settings()
{
    add_menu_page('Milk settings', 'Milk smart link', 'manage_options', 'milk-smartlink', 'milk_settings_page');
}

function post_milk_settings()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        $ios = $_POST['ios'];
        $android = $_POST['android'];

        update_option('milk_id', $id);
        update_option('milk_ios', $ios);
        update_option('milk_android', $android);

    }

}


function milk_settings_page()
{

    post_milk_settings();

    ?>

    <link rel="stylesheet" href="<?php echo(WP_PLUGIN_DIR) ?>/milk-smartlink/assets/css/bulma.min.css"/>
    <link rel="stylesheet"
          href="http://localhost:8888/wordpress/wp-content/plugins/milk-smartlink/assets/css/bulma.min.css"/>

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
                        <input class="input" type="text" name="android"
                               value="<?php echo(get_option('milk_android')) ?>">
                    </div>
                </div>
                <button class="button is-primary is-large" type="submit">Milk</button>
            </form>
        </div>
    </section>


    <?php

}
