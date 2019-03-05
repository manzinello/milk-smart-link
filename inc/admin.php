<?php

add_action('admin_menu', 'milk_settings');

function milk_settings()
{
    add_menu_page('Milk settings', 'Milk settings', 'manage_options', 'wp-milk', 'milk_settings_page');
}

function post_milk_settings()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        $ios = $_POST['ios'];
        $android = $_POST['android'];

    }

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
                        <input class="input" type="text" name="id">
                    </div>
                </div>
                <div class="field">
                    <label class="label">iOS</label>
                    <div class="control">
                        <input class="input" type="text" name="ios">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Android</label>
                    <div class="control">
                        <input class="input" type="text" name="android">
                    </div>
                </div>
                <button class="button is-primary is-large" type="submit">Milk</button>
            </form>
        </div>
    </section>


    <?php

}
