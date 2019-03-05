<?php

function redirect($location, $status)
{
    wp_redirect($location, $status);
    exit;
}
