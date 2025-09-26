<?php
/**
 * Configuration pour le système de mise à jour Smartfox Cookies
 * @author Fabrice Simonet | Webglobal
 */

if ( ! defined('ABSPATH') ) exit;

return [
    // Informations GitHub
    'github' => [
        'username' => 'Weblogbal',
        'repository' => 'smartfox-cookies',
        'branch' => 'main'
    ],
    
    // Configuration du plugin
    'plugin' => [
        'name' => 'Smartfox Cookies',
        'slug' => 'smartfox-cookies',
        'text_domain' => 'smartfox-cookies',
        'author' => 'Fabrice Simonet | Webglobal',
        'author_uri' => 'https://webglobal.fr',
        'plugin_uri' => 'https://github.com/Weblogbal/smartfox-cookies',
        'requires_wp' => '5.0',
        'tested_up_to' => '6.3',
        'requires_php' => '7.4'
    ],
    
    // Configuration des mises à jour
    'updates' => [
        'check_interval' => 12, // heures
        'enable_cache' => true,
        'show_update_notice' => true,
        'auto_check_updates' => true
    ],
    
    // URLs de base
    'urls' => [
        'version_file' => 'https://raw.githubusercontent.com/Weblogbal/smartfox-cookies/main/version.json',
        'download_zip' => 'https://github.com/Weblogbal/smartfox-cookies/archive/refs/heads/main.zip',
        'repository' => 'https://github.com/Weblogbal/smartfox-cookies',
        'changelog' => 'https://github.com/Weblogbal/smartfox-cookies/blob/main/CHANGELOG.md',
        'issues' => 'https://github.com/Weblogbal/smartfox-cookies/issues'
    ]
];