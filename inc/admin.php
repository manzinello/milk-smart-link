<?php

add_action('admin_menu', 'milk_settings');
add_action('admin_enqueue_scripts', 'load_milk_style');

function load_milk_style($hook)
{
    if ($hook != 'toplevel_page_milk-smart-link') {
        return;
    }
    wp_enqueue_style('bulma_css', site_url() . '/wp-content/plugins/milk-smart-link/css/bulma.min.css');
}

function milk_settings()
{
    add_menu_page('Milk smart link', 'Milk smart link', 'manage_options', 'milk-smart-link', 'milk_settings_page', site_url() . '/wp-content/plugins/milk-smart-link/img/milk-icon.png');
}

function post_milk_settings()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // ottengo i valori
        $id = sanitize_text_field($_POST['id']);

        $ios = esc_url($_POST['ios']);
        $android = esc_url($_POST['android']);

        // check degli url
        if ($ios != "" && filter_var($ios, FILTER_VALIDATE_URL) === FALSE) {

            echo('<article class="message is-danger"><div class="message-body">' . __("Error, iOS is not a valid url!", "milk-smart-link") . '</div></article>');

        } else if ($android != "" && filter_var($android, FILTER_VALIDATE_URL) === FALSE) {

            echo('<article class="message is-danger"><div class="message-body">' . __("Error, Android is not a valid url!", "milk-smart-link") . '</div></article>');

        } else {

            // aggiornamento delle option
            update_option('milk_id', $id);
            update_option('milk_ios', $ios);
            update_option('milk_android', $android);

            // mostro avviso success
            echo('<article class="message is-success"><div class="message-body">' . __("Everything saved!", "milk-smart-link") . '</div></article>');

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

            <p class="title is-1"><?php echo(__('Milk', 'milk-smart-link')) ?></p>
            <p><?php echo(__("Milk is very simple to use. Choose a <strong>page</strong> and then add different <strong>url</strong> to
                redirect to for Android or iOS.<br/>
                For example, if you want to redirect a user to the correct app store based on his device to download
                your app add the Play Store url under Android section and the App Store url for iOS.", "milk-smart-link")) ?></p>
            <br/>
            <p><?php echo(__('a plugin by', 'milk-smart-link')) ?> <a target="_blank"
                                                                      href="https://matteomanzinello.com">matteo
                    manzinello</a></p>
            <br/>

            <?php post_milk_settings(); ?>

            <form method="post" action="">
                <div class="field">
                    <label class="label"><?php echo(__('Page', 'milk-smart-link')) ?></label>
                    <div class="control">
                        <div class="control">
                            <div class="select">
                                <select name="id" id="id">
                                    <?php

                                    $milk_id = get_option('milk_id');

                                    if ($milk_id == "" || !isset($milk_id)) {
                                        echo('<option selected value="">' . __('(none)', 'milk-smart-link') . '</option>');
                                    } else {
                                        echo('<option value="">' . __('(none)', 'milk-smart-link') . '</option>');
                                    }

                                    foreach ($pages as $page) {
                                        if ($page->ID == $milk_id) {
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
                    <label class="label"><?php echo(__('iOS', 'milk-smart-link')) ?></label>
                    <div class="control">
                        <input class="input" type="text" name="ios" value="<?php echo(get_option('milk_ios')) ?>">
                    </div>
                </div>
                <div class="field">
                    <label class="label"><?php echo(__('Android', 'milk-smart-link')) ?></label>
                    <div class="control">
                        <input class="input" type="text" name="android"
                               value="<?php echo(get_option('milk_android')) ?>">
                    </div>
                </div>
                <br/>
                <button class="button is-primary"
                        type="submit"><?php echo(__('Save settings', 'milk-smart-link')) ?></button>
            </form>
        </div>
    </section>


    <?php

}
