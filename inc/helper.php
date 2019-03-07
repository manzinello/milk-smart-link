<?php

// redirect WordPress
function milk_redirect($location, $status)
{
    wp_redirect($location, $status);
    exit;
}
