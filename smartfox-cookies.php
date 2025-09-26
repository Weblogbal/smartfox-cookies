<?php
/**
 * Plugin Name: Smartfox Cookies
 * Description: Gestion intelligente du consentement aux cookies et intégration Google Analytics GA4 avec support multilingue (Polylang/WPML). Interface simple et conforme RGPD.
 * Version: 1.0.2
 * Author: Fabrice Simonet
 * Author URI: https://web-global.ch
 * Plugin URI: https://github.com/Weblogbal/smartfox-cookies
 * Update URI: https://github.com/Weblogbal/smartfox-cookies
 * Text Domain: smartfox-cookies
 * Requires at least: 5.0
 * Tested up to: 6.3
 * Requires PHP: 7.4
 * Network: false
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined('ABSPATH') ) exit;

// Inclusion du système de mise à jour
if (file_exists(__DIR__ . '/includes/class-update-checker.php')) {
    require_once __DIR__ . '/includes/class-update-checker.php';
}

class Smartfox_Cookies {
    const OPTION_KEY = 'smartfox_scripts';
    const NONCE_KEY  = 'smartfox_cookies_nonce';
    const CAP        = 'manage_options'; // admin uniquement
    
    private $update_checker;

    public function __construct() {
        // Initialisation du système de mise à jour
        $this->init_update_checker();
        
        // Admin UI
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'maybe_handle_form']);
        // Injection tout en haut du head
        add_action('wp_head', [$this, 'print_head_html'], 0);

        // Lien rapide "Réglages"
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), [$this, 'add_settings_link']);

        // Nettoyage à la désinstallation
        register_uninstall_hook(__FILE__, ['Smartfox_Cookies','on_uninstall']);
    }
    
    /**
     * Initialise le système de mise à jour
     */
    private function init_update_checker() {
        if (class_exists('Smartfox_Update_Checker')) {
            $this->update_checker = new Smartfox_Update_Checker(
                __FILE__,
                'Weblogbal', // Nom d'utilisateur GitHub
                'smartfox-cookies' // Nom du repository GitHub
            );
            
            // Debug temporaire - à supprimer après résolution
            if (isset($_GET['smartfox_debug']) && current_user_can('manage_options')) {
                add_action('admin_notices', [$this, 'show_debug_info']);
            }
        }
    }
    
    /**
     * Fonction de debug temporaire
     */
    public function show_debug_info() {
        if ($this->update_checker) {
            $debug = $this->update_checker->get_debug_info();
            $remote = $this->update_checker->force_check();
            
            echo '<div class="notice notice-info"><pre>';
            echo "=== SMARTFOX DEBUG ===\n";
            echo "Plugin Version: " . $debug['current_version'] . "\n";
            echo "Plugin Slug: " . $debug['plugin_slug'] . "\n";
            echo "GitHub URL: " . $debug['github_url'] . "\n";
            echo "Version JSON URL: " . $debug['version_json_url'] . "\n";
            echo "\nRemote Data:\n";
            if ($remote) {
                echo "Remote Version: " . $remote->version . "\n";
                echo "Download URL: " . $remote->download_url . "\n";
            } else {
                echo "ERREUR: Impossible de récupérer les données distantes\n";
            }
            echo '</pre></div>';
        }
    }

    /** Ajoute le lien "Réglages" dans la liste des extensions */
    public function add_settings_link($links) {
        if ( current_user_can(self::CAP) ) {
            $url = admin_url('options-general.php?page=smartfox-cookies');
            $settings_link = '<a href="' . esc_url($url) . '">' . esc_html__('Réglages', 'smartfox-cookies') . '</a>';
            array_unshift($links, $settings_link);
        }
        return $links;
    }

    /** Page Réglages */
    public function add_settings_page() {
        add_options_page(
            __('Smartfox Cookies', 'smartfox-cookies'),
            __('Smartfox Cookies', 'smartfox-cookies'),
            self::CAP,
            'smartfox-cookies',
            [$this, 'render_settings_page']
        );
    }

    /** Sauvegarde du formulaire */
    public function maybe_handle_form() {
        if ( ! isset($_POST['smartfox_cookies_submit']) ) return;
        if ( ! current_user_can(self::CAP) ) wp_die(__('Accès refusé.', 'smartfox-cookies'));
        if ( ! isset($_POST[self::NONCE_KEY]) || ! wp_verify_nonce($_POST[self::NONCE_KEY], 'smartfox_cookies_save') ) {
            wp_die(__('Nonce invalide.', 'smartfox-cookies'));
        }

        $cookies = isset($_POST['cookies']) ? (array) $_POST['cookies'] : [];
        $cookies = array_map(function($code) {
            return stripslashes(trim($code));
        }, $cookies);

        $ga = isset($_POST['ga']) ? (array) $_POST['ga'] : [];
        $ga = array_map(function($code) {
            return stripslashes(trim($code));
        }, $ga);

        update_option(self::OPTION_KEY, ['cookies' => $cookies, 'ga' => $ga], false);

        // Redirection propre pour éviter le resoumission
        wp_redirect( add_query_arg(['page'=>'smartfox-cookies','updated'=>'1'], admin_url('options-general.php')) );
        exit;
    }

    /** Rendu de la page de réglages */
    public function render_settings_page() {
        if ( ! current_user_can(self::CAP) ) wp_die(__('Accès refusé.', 'smartfox-cookies'));
        $scripts = get_option(self::OPTION_KEY, ['cookies' => [], 'ga' => []]);
        $languages = $this->get_languages();
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Smartfox Cookies & Analytics', 'smartfox-cookies'); ?></h1>

            <?php if ( isset($_GET['updated']) ) : ?>
                <div class="notice notice-success is-dismissible"><p><?php esc_html_e('Enregistré.', 'smartfox-cookies'); ?></p></div>
            <?php endif; ?>

            <form method="post" action="">
                <?php wp_nonce_field('smartfox_cookies_save', self::NONCE_KEY); ?>

                <h2><?php esc_html_e('Consentement aux cookies', 'smartfox-cookies'); ?></h2>
                <p><?php esc_html_e('Entrez les codes d\'embed pour le consentement aux cookies par langue.', 'smartfox-cookies'); ?></p>

                <?php foreach ($languages as $lang) : ?>
                    <p>
                        <label for="cookies_<?php echo esc_attr($lang); ?>"><?php printf(__('Code cookies pour %s:', 'smartfox-cookies'), strtoupper($lang)); ?></label><br>
                        <input type="text" name="cookies[<?php echo esc_attr($lang); ?>]" id="cookies_<?php echo esc_attr($lang); ?>" value="<?php echo esc_attr($scripts['cookies'][$lang] ?? ''); ?>" style="width:100%;font-family:monospace;" placeholder="ex: aaaaa-bbbbb-ccccc-ddddd-eeeee/<?php echo esc_attr($lang); ?>" />
                    </p>
                <?php endforeach; ?>

                <h2><?php esc_html_e('Google Analytics GA4', 'smartfox-cookies'); ?></h2>
                <p><?php esc_html_e('Entrez les IDs de mesure GA4 par langue (ex: G-XXXXXXXXXX).', 'smartfox-cookies'); ?></p>

                <?php foreach ($languages as $lang) : ?>
                    <p>
                        <label for="ga_<?php echo esc_attr($lang); ?>"><?php printf(__('GA4 ID pour %s:', 'smartfox-cookies'), strtoupper($lang)); ?></label><br>
                        <input type="text" name="ga[<?php echo esc_attr($lang); ?>]" id="ga_<?php echo esc_attr($lang); ?>" value="<?php echo esc_attr($scripts['ga'][$lang] ?? ''); ?>" style="width:100%;font-family:monospace;" placeholder="ex: G-XXXXXXXXXX" />
                    </p>
                <?php endforeach; ?>

                <p><button type="submit" name="smartfox_cookies_submit" class="button button-primary">
                    <?php esc_html_e('Enregistrer', 'smartfox-cookies'); ?>
                </button></p>
            </form>
        </div>
        <?php
    }

    /** Impression au plus haut dans wp_head */
    public function print_head_html() {
        if ( is_admin() ) return; // ne rien injecter dans l'admin
        $scripts = get_option(self::OPTION_KEY, ['cookies' => [], 'ga' => []]);
        $current_lang = $this->get_current_language();

        echo "\n<!-- Smartfox Scripts start -->\n";

        // Cookie consent
        $cookie_code = $scripts['cookies'][$current_lang] ?? '';
        if ( $cookie_code ) {
            echo '<script type="text/javascript" src="https://gettermscmp.com/cookie-consent/embed/' . esc_attr($cookie_code) . '"></script>' . "\n";
        }

        // GA4
        $ga_code = $scripts['ga'][$current_lang] ?? '';
        if ( $ga_code ) {
            echo '<!-- Google tag (gtag.js) -->' . "\n";
            echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_attr($ga_code) . '"></script>' . "\n";
            echo '<script>' . "\n";
            echo '  window.dataLayer = window.dataLayer || [];' . "\n";
            echo '  function gtag(){dataLayer.push(arguments);}' . "\n";
            echo '  gtag(\'js\', new Date());' . "\n";
            echo '  gtag(\'config\', \'' . esc_js($ga_code) . '\');' . "\n";
            echo '</script>' . "\n";
        }

        echo "<!-- Smartfox Scripts end -->\n";
    }

    /** Désinstallation: nettoyage */
    public static function on_uninstall() {
        delete_option(self::OPTION_KEY);
    }

    /** Récupère la liste des langues actives */
    private function get_languages() {
        if (function_exists('pll_languages_list')) {
            return pll_languages_list(array('fields' => 'slug'));
        } elseif (function_exists('icl_get_languages')) {
            $langs = icl_get_languages('skip_missing=0');
            return array_keys($langs);
        } else {
            return ['fr']; // langue par défaut
        }
    }

    /** Récupère la langue actuelle */
    private function get_current_language() {
        if (function_exists('pll_current_language')) {
            return pll_current_language('slug');
        } elseif (function_exists('icl_get_current_language')) {
            return icl_get_current_language();
        } elseif (defined('ICL_LANGUAGE_CODE') && !empty(ICL_LANGUAGE_CODE)) {
            return ICL_LANGUAGE_CODE;
        } else {
            return 'fr'; // langue par défaut
        }
    }
}

new Smartfox_Cookies();