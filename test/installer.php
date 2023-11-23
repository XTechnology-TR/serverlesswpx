<?php

// Do not use this on a live site! For testing purposes only!

define('WP_INSTALLING', true);

require_once dirname(__DIR__) . '/wp/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/upgrade.php';
require_once ABSPATH . 'wp-admin/includes/translation-install.php';
require_once ABSPATH . WPINC . '/class-wpdb.php';

if (!is_blog_installed()) {
    $weblog_title = 'XTechnology ServerlessWP Site';
    $user_name = 'root';
    $admin_email = 'info@xtechnology.co';
    $public = TRUE;

    $result = wp_install($weblog_title, $user_name, $admin_email, $public);
    update_user_meta( 1, 'default_password_nag', false );
} else {
    echo 'WordPress zaten yüklü.';
}