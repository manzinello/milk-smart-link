<?php

add_action('admin_menu', 'milk_settings');
add_action('admin_head', 'milk_style');

function milk_style()
{
    echo('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" />');
}

function milk_settings()
{
    add_menu_page('Milk settings', 'Milk smart link', 'manage_options', 'milk-smartlink', 'milk_settings_page', 'http://localhost:8888/wordpress/wp-content/plugins/milk-smartlink/assets/milk-icon.png');
}

function post_milk_settings()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // ottengo i valori
        $id = $_POST['id'];
        $ios = $_POST['ios'];
        $android = $_POST['android'];

        // check degli url
        if (($ios != "" && filter_var($ios, FILTER_VALIDATE_URL) === FALSE) ||
            ($android != "" && filter_var($android, FILTER_VALIDATE_URL) === FALSE)) {

            echo('<article class="message is-danger"><div class="message-body">Error, not a valid url!</div></article>');

        } else {

            // aggiornamento delle option
            update_option('milk_id', $id);
            update_option('milk_ios', $ios);
            update_option('milk_android', $android);

        }

    }

}


function milk_settings_page()
{

    // tutte le pagine
    $pages = get_pages();

    ?>

    <section class="section">
        <div class="container">

            <p class="title is-1">Milk</p>
            <p>Milk is very simple to use. Choose a <strong>page</strong> and then add different <strong>url</strong> to
                redirect to for Android or iOS.<br/>
                For example, if you want to redirect a user to the correct app store based on his device to download
                your app add the Play Store url under Android section and the App Store url for iOS.</p>
            <br/>

            <?php post_milk_settings(); ?>

            <form method="post" action="">
                <div class="field">
                    <label class="label">Page</label>
                    <div class="control">
                        <div class="control">
                            <div class="select">
                                <select name="id" id="id">
                                    <?php

                                    foreach ($pages as $page) {
                                        if ($page->ID == get_option('milk_id')) {
                                            echo('<option selected value="' . $page->ID . '">' . $page->post_title . '</option>');
                                        } else {
                                            echo('<option value="' . $page->ID . '">' . $page->post_title . '</option>');
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
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
                <button class="button is-primary" type="submit">Save settings</button>
            </form>


        </div>
    </section>


    <?php

}
