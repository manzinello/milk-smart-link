<?php

// redirect WordPress
function _milk_redirect($location, $status)
{
    wp_redirect($location, $status);
    exit;
}
