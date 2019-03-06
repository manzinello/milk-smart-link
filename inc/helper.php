<?php

// redirect WordPress
function redirect($location, $status)
{
    wp_redirect($location, $status);
    exit;
}
