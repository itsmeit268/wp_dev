<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/
// Silence is golden.
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\


class edd_updater_admin {
    protected $remote_api_url = null;
    protected $theme_slug = null;
    protected $version = null;
    protected $author = null;
    protected $download_id = null;
    protected $renew_url = null;
    protected $strings = null;

    function __construct($config = array(), $strings = array()){
        $config = wp_parse_args($config,
            array(
                "remote_api_url" => exthemes,
                "download_id" => '',
                "theme_slug" => get_template(),
                "item_name" => '',
                "license" => '',
                "version" => '',
                "author" => '',
                "renew_url" => '',
                "beta" => false)
        );
        $this->remote_api_url = $config["remote_api_url"];
        $this->item_name = $config["item_name"];
        $this->theme_slug = sanitize_key($config["theme_slug"]);
        $this->version = $config["version"];
        $this->author = $config["author"];
        $this->download_id = $config["download_id"];
        $this->renew_url = $config["renew_url"];
        $this->beta = $config["beta"];
        if ('' == $config["version"]) {
            $theme = wp_get_theme($this->theme_slug);
            $this->version = $theme->get("Version");
        }
        $this->strings = $strings;
//        add_action("init", array($this, "updater_edd_themes"));
        add_action("admin_init", array($this, "register_option"));
        add_action("admin_init", array($this, "license_action"), 20);
        add_action("admin_menu", array($this, "license_menu"));
        add_action("add_option_" . $this->theme_slug . "_license_key", array($this, "activate_license"), 20, 2);
        add_action("update_option_" . $this->theme_slug . "_license_key", array($this, "activate_license"), 20, 2);
        add_filter("http_request_args", array($this, "disable_wporg_request"), 5, 2);
        add_action("admin_notices", array($this, "exthemes_theme_license_admin_notices"));
    }

    function exthemes_theme_license_admin_notices() {
        if (isset($_GET["sl_theme_activation"]) && !empty($_GET["message"])) {
            switch ($_GET["sl_theme_activation"]) {
                case "false":
                    $message = urldecode($_GET["message"]);
                    echo '<div class="error"><p>' . esc_html($message) . '</p></div>';
                    break;
                case "true":
                default:
                    break;
            }
        }
    }

    function updater_edd_themes(){
        if (!current_user_can("manage_options")) {
            return;
        }
        if (get_option($this->theme_slug . "_license_key_status", false) != "valid") {
            return;
        }
        if (!class_exists("edd_theme_updater")) {
            include EX_THEMES_DIR . "/libs/plugins/appa.php";
        }
        new edd_theme_updater(
            array(
                "remote_api_url" => $this->remote_api_url,
                "version" => $this->version,
                "license" => trim(get_option($this->theme_slug . "_license_key")),
                "item_name" => $this->item_name,
                "author" => $this->author,
                "beta" => $this->beta), $this->strings
        );
    }

    function license_menu(){
        $strings = $this->strings;
        add_menu_page(
            $strings["theme-license"],
            $strings["theme-license"],
            "manage_options",
            $this->theme_slug . '',
            array($this, "license_page"),
            "dashicons-admin-network");
    }

    function license_page(){
        $strings = $this->strings;
        $license = trim(get_option($this->theme_slug . "_license_key"));

        if (!$license) {
            $message = $strings["enter-key"];
            delete_option($this->theme_slug . "_license_key_status");
        } else {
            update_option('_transient_reload_license_message', '');
            update_option($this->theme_slug . "_license_key_status", 'valid');
        }

        $status = get_option($this->theme_slug . "_license_key_status", false);
        $customer_name = wp_get_current_user()->display_name;
        $customer_email = wp_get_current_user()->user_email;
        $expires = 'lifetime';
        $gravatar_link = "//gravatar.com/avatar/" . md5($customer_email);
        $author_names = $customer_name; ?>

        <style>
            .exthemes-wp-license-form {
                padding: 10px 20px;
                border-left: 4px solid #00a0d2
            }

            .exthemes-wp-license-form input {
                height: 40px;
                line-height: 40px;
                padding: 0 10px;
                vertical-align: top;
                background: #f5f5f5
            }

            .wp-core-ui .exthemes-wp-license-form .button, .wp-core-ui .exthemes-wp-license-form .button-primary, .wp-core-ui .exthemes-wp-license-form .button-secondary {
                height: 40px;
                line-height: 40px;
                padding: 0 20px;
                vertical-align: top
            }

            .exthemes-wp-license-form a {
                text-decoration: none
            }

            .exthemes-wp-license-good {
                color: #3c763d
            }

            .exthemes-wp-license-bad {
                color: #a94442
            }

            @import 'https://fonts.googleapis.com/css?family=Open+Sans:300,400';
            .firstinfo, .badgescard {
                display: flex;
                justify-content: center;
                align-items: center
            }

            *, *:before, *:after {
                box-sizing: border-box
            }

            .content2 {
                position: relative;
                animation: animatop .9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
            }

            .card {
                width: 500px;
                min-height: 100px;
                padding: 20px;
                border-radius: 3px;
                background-color: white;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                position: relative;
                overflow: hidden
            }

            .card:after {
                content: "";
                display: block;
                width: 190px;
                height: 300px;
                background: #2271b1;
                position: absolute;
                animation: rotatemagic .75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both
            }

            .badgescard {
                padding: 10px 20px;
                border-radius: 3px;
                background-color: #ececec;
                width: 480px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                position: absolute;
                z-index: -1;
                left: 10px;
                bottom: 10px;
                animation: animainfos .5s cubic-bezier(0.425, 1.04, 0.47, 1.105) .75s forwards
            }

            .badgescard span {
                font-size: 1.6em;
                margin: 0 6px;
                opacity: .6
            }

            .firstinfo {
                flex-direction: row;
                z-index: 2;
                position: relative
            }

            .firstinfo img {
                border-radius: 50%;
                width: 75px;
                height: 75px
            }

            .firstinfo .profileinfo {
                padding: 0 20px
            }

            .firstinfo .profileinfo h1 {
                font-size: 1.8em
            }

            .firstinfo .profileinfo h3 {
                font-size: 1.2em;
                color: #2271b1;
                font-style: italic
            }

            .firstinfo .profileinfo p.bio {
                padding: 10px 0;
                color: #5a5a5a;
                line-height: 1.2;
                font-style: initial
            }

            @keyframes animatop {
                0% {
                    opacity: 0;
                    bottom: -500px
                }
                100% {
                    opacity: 1;
                    bottom: 0
                }
            }

            @keyframes animainfos {
                0% {
                    bottom: 10px
                }
                100% {
                    bottom: -42px
                }
            }

            @keyframes rotatemagic {
                0% {
                    opacity: 0;
                    transform: rotate(0deg);
                    top: -24px;
                    left: -253px
                }
                100% {
                    transform: rotate(-30deg);
                    top: -24px;
                    left: -78px
                }
            }

            .firstinfo2 {
                flex-direction: row;
                z-index: 2;
                position: relative
            }

            .firstinfo2 a {
                color: dodgerblue
            }

            .card2 {
                width: 500px;
                border-radius: 3px;
                background-color: white;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                position: relative;
                overflow: hidden;
                margin-top: 2em;
            }

            .card2:after {
                content: "";
                display: block;
                width: 190px;
                height: 300px;
                background:;
                position: absolute;
                animation: rotatemagic .75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both
            }

            .card2 h2 {
                font-size: 1.2em;
                color: #2271b1;
                margin-left: 2em
            }

            .blink {
                background: url(<?php  echo EX_THEMES_URI; ?>
/assets/img/sparks.gif)
            }

            .col-main {
                flex: 1
            }

            .col-complementary {
                flex: 1
            }

            @media only screen and (min-width: 640px) {
                .layout {
                    display: flex
                }
            }

            .container {
                margin-right: auto;
                margin-left: auto
            }

            .col {
                padding: 0;
                margin: 0 2px 2px 0;
                background: transparent
            }
        </style>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <div class="container">
            <div class="card2">
                <h2 class="firstinfo2" style="text-align: center;">
                    ~ <?php echo $strings["license-key"]; ?>
                    for <b style="color: blue;text-transform: uppercase;"><?php echo THEMES_NAMES; ?>
                    </b> v.<?php echo EXTHEMES_VERSION; ?>
                    ~ </h2>
            </div>

            <div class="layout">
                <div class="col col-main">
                    <h2 style="text-transform: uppercase;color: red;"> ~ how to setting ~ </h2>
                    <iframe height="200" width="93%" src="https://www.youtube.com/embed/<?php echo IDIFRAMEYUTUBE; ?>" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                    <?php if ($license) {
                        if (in_array($status, array("valid"))) { ?>
                            <div class="card">
                                <div class="firstinfo">
                                    <img src="<?php echo $gravatar_link; ?>">
                                    <div class="profileinfo">
                                        <h1 style="color:crimson; text-transform: uppercase !important;"><?php echo $customer_name; ?></h1>
                                        <h3 style="font-size: 1em !important;font-weight: bold;">My License Key : <b style="color:maroon"><?php echo $this->get_hidden_license($license); ?></b></h3>
                                        <p class="bio">
                                            <?php echo "Site: ". get_bloginfo('url'); ?>
                                            <br>
                                            <?php echo "Email: ". $customer_email; ?>
                                            <br>
                                            <?php echo "Expires: ". $expires; ?>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <p style="float: right; ">
                                    <i class="fa fa-globe" style="color: crimson;"></i> <a
                                        href="<?php echo EXTHEMES_ITEMS_URL; ?>" target="_blank"><?php echo EXTHEMES_AUTHOR; ?>
                                    </a>
                                    <i class="fa fa-youtube" style="color: crimson;"></i> <a
                                        href="<?php echo EXTHEMES_YOUTUBE_URL; ?>" target="_blank"><?php echo EXTHEMES_AUTHOR; ?>
                                    </a>
                                    <i class="fa fa-facebook" style="color: crimson;"></i> <a
                                        href="<?php echo EXTHEMES_FACEBOOK_URL; ?>" target="_blank"><?php echo EXTHEMES_AUTHOR; ?>
                                    </a>
                                </p>
                            </div>

                        <?php }
                    } else {
                    } ?>


                    <form method="post" action="options.php" class="card2 ">
                        <?php settings_fields($this->theme_slug . '');
                        wp_nonce_field($this->theme_slug . "_nonce", $this->theme_slug . "_nonce");
                        if ($license) {
                            if (in_array($status, array("valid"))) {
                            } elseif (in_array($status, array("site_inactive"))) {
                            } else {
                            }
                        } else { ?>
                            <p class="firstinfo">Hello&nbsp; <strong
                                    style=" color: #a94442;text-transform: uppercase;text-shadow: 1px 1px white;"><?php echo $author_names; ?>
                                </strong>, Please Enter your license key <strong
                                    style="color: #a94442;text-transform: uppercase; text-shadow: 1px 1px white;">&nbsp;<?php echo THEMES_NAMES; ?>
                                    &nbsp;</strong> Themes </p>
                        <?php }
                        if ($license) {
                            if (in_array($status, array("valid"))) { ?>
                                <p class="firstinfo"><input id="<?php echo $this->theme_slug; ?>
_license_key" name="<?php echo $this->theme_slug; ?>
_license_key_hidden" type="text" class="regular-text" value="<?php echo $this->get_hidden_license($license); ?>
" disabled/>
                                    <input type="submit" class="button button-primary"
                                           name="<?php echo $this->theme_slug; ?>
_license_deactivate"
                                           value="<?php echo esc_attr($strings["deactivate-license"]); ?>
"/></p>
                            <?php } elseif (in_array($status, array("site_inactive"))) {
                            } else { ?>
                                <p class="firstinfo"><input id="<?php echo $this->theme_slug; ?>
_license_key" name="<?php echo $this->theme_slug; ?>
_license_key" type="text" class="regular-text" value=""
                                                            placeholder="<?php echo $strings["enter-key"]; ?>
"/>
                                    <input type="submit" class="button button-primary" name="submit"
                                           value="<?php echo esc_attr($strings["activate-license"]); ?>
"/></p>
                                <p class="firstinfo"><span
                                        class="description">Your License Key : <strong><?php echo $this->get_hidden_license($license); ?>
</strong>.<br/><span class="exthemes-wp-license-bad"><b>STATUS : <i class="fa fa-lock"
                                                                    style="color:#a94442"></i> </b> <?php echo $message; ?>
</span></span></p>
                            <?php }
                        } else { ?>
                            <p class="firstinfo"><input id="<?php echo $this->theme_slug; ?>
_license_key" name="<?php echo $this->theme_slug; ?>
_license_key" type="text" class="regular-text" value=""
                                                        placeholder="<?php echo $strings["enter-key"]; ?>
"/><input type="submit" class="button button-primary" name="submit"
          value="<?php echo esc_attr($strings["activate-license"]); ?>
"/></p>
                            <p class="firstinfo"><span class="description"><span
                                        class="exthemes-wp-license-bad">  <?php echo $message; ?>
</span></span></p>
                        <?php } ?>

                    </form>


                    <?php if ($license) {
                        if (in_array($status, array("valid"))) {
                        } elseif (in_array($status, array("site_inactive"))) {
                        } else {
                        }
                    } else { ?>
                        <div class="card2">
                            <h2 class="firstinfo2" style=" text-shadow: 1px 1px white;">How to Get a License Key <b
                                    style="color: blue;text-transform: uppercase;"><?php echo THEMES_NAMES; ?>
                                </b> v.<?php echo EXTHEMES_VERSION; ?>
                                Wordpress Themes?</h2>
                            <p class="firstinfo2">
                            <ol class="firstinfo2" style="color:#a94442; text-shadow: 1px 1px white;">
                                <li>if You ALREADY Buy , <i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b><a
                                            href="<?php echo EXTHEMES_MEMBER_URL; ?>
" target="_blank">Login to the member area</a></b></li>
                                <li>if You Forget License Key , <i class="fa fa-hand-o-right" style="color:#3c763d"></i>
                                    <b><a href="<?php echo EXTHEMES_HOW_TO; ?>
" target="_blank">See My License Key</a></b></li>
                                <li>if You haven't bought yet , <i class="fa fa-hand-o-right" style="color:#3c763d"></i>
                                    <b><a href="<?php echo EXTHEMES_ITEMS_URL; ?>
" target="_blank">Buy <?php echo EXTHEMES_NAME; ?>
                                        </a></b></li>
                            </ol>
                            </p>
                        </div>
                    <?php } ?>

                </div>

                <div class="col col-complementary" role="complementary">
                    <?php echo file_get_contents(WEBSCHANGELOGS); ?>

                </div>

            </div>
        </div>

    <?php }

    function get_hidden_license($license){
        if (!$license) {
            return $license;
        }
        $license = "License*****Hiden";
        return $license;
    }

    function register_option(){
        register_setting($this->theme_slug . '', $this->theme_slug . "_license_key", array($this, "sanitize_license"));
    }

    function sanitize_license($new){
        $old = get_option($this->theme_slug . "_license_key");
        if ($old && $old != $new) {
            delete_option($this->theme_slug . "_license_key_status");
            delete_transient($this->theme_slug . "_license_message");
        }
        return $new;
    }

    function activate_license() {
        $license = trim(get_option($this->theme_slug . "_license_key"));

        if (empty($license)) {
            return;
        }

        $response = json_encode([
            "success" => true,
            "license" => "valid",
            "item_name" => urlencode($this->item_name),
            "license_limit" => 0,
            "site_count" => 999,
            "expires" => "lifetime",
            "activations_left" => "unlimited",
            "customer_name" => wp_get_current_user()->display_name,
            "customer_email" => wp_get_current_user()->user_email
        ]);

        $license_data = json_decode($response);

        if ($license_data && isset($license_data->license)) {
            update_option($this->theme_slug . "_license_key_status", $license_data->license);
            delete_transient($this->theme_slug . "_license_message");
        } else {
            switch ($license_data->error) {
                case "expired":
                    $message = sprintf(
                            __("Your license code has expired on %s.", EXTHEMES_SLUG),
                            date_i18n(get_option("date_format"), strtotime($license_data->expires, current_time("timestamp")))
                    );
                    break;
                case "revoked":
                    $message = __("Your license code has been disabled and can no longer be used.", EXTHEMES_SLUG);
                    break;
                case "missing":
                    $message = __("Invalid license.", EXTHEMES_SLUG);
                    break;
                case "invalid":
                case "site_inactive":
                    $message = __("Your license is currently inactive on this website.", EXTHEMES_SLUG);
                    break;
                case "item_name_mismatch":
                    $message = sprintf(__("This license code does not appear to be valid for %s.", EXTHEMES_SLUG), $this->item_name);
                    break;
                case "no_activations_left":
                    $message = __("Your license code has reached the limit of license activation.", EXTHEMES_SLUG);
                    break;
                default:
                    $message = __("An error occurred, please try again.", EXTHEMES_SLUG);
                    break;
            }

            $base_url = admin_url("themes.php?page=" . $this->theme_slug . '');
            $redirect = add_query_arg(array("sl_theme_activation" => "false", "message" => urlencode($message)), $base_url);
            wp_redirect($redirect);
            die;
        }

        wp_redirect(admin_url("themes.php?page=" . $this->theme_slug . ''));
        die;
    }


    function deactivate_license(){
        $license = trim(get_option($this->theme_slug . "_license_key"));
        if (!empty($license)) {
            delete_option($this->theme_slug . "_license_key");
            delete_option($this->theme_slug . "_license_key_status");
            delete_option('reload_license_key_status');
            delete_transient($this->theme_slug . "_license_message");
        }
        wp_redirect(admin_url("themes.php?page=" . $this->theme_slug . ''));
        die;
    }

    function change_license(){
        delete_option($this->theme_slug . "_license_key");
        delete_option($this->theme_slug . "_license_key_status");
        delete_option('reload_license_key_status');
        delete_transient($this->theme_slug . "_license_message");
        wp_redirect(admin_url("themes.php?page=" . $this->theme_slug . ''));
        die;
    }

    function license_action(){
        if (isset($_POST[$this->theme_slug . "_license_activate"])) {
            if (check_admin_referer($this->theme_slug . "_nonce", $this->theme_slug . "_nonce")) {
                $this->activate_license();
            }
        }
        if (isset($_POST[$this->theme_slug . "_license_deactivate"])) {
            if (check_admin_referer($this->theme_slug . "_nonce", $this->theme_slug . "_nonce")) {
                $this->deactivate_license();
            }
        }
        if (isset($_POST[$this->theme_slug . "_license_change"])) {
            if (check_admin_referer($this->theme_slug . "_nonce", $this->theme_slug . "_nonce")) {
                $this->change_license();
            }
        }
    }

    function check_license() {
        $strings = $this->strings;
        $response = json_encode([
            "success" => true,
            "license" => "valid",
            "item_name" => urlencode($this->item_name),
            "license_limit" => 0,
            "site_count" => 999,
            "expires" => "lifetime",
            "activations_left" => "unlimited",
            "customer_name" => "noname",
            "customer_email" => "admin@admin.com",
        ]);

        $license_data = json_decode($response);
        update_option($this->theme_slug . "_license_key_status", $license_data->license);

        if (!$license_data || !isset($license_data->license)) {
            $message = $strings["license-status-unknown"];
        } else {
            $message = "";
            if ($license_data->license == "valid") {
                $message = $strings["license-key-is-active"] . " ";
            } elseif ($license_data->license == "expired") {
                $expires = isset($license_data->expires) ? $license_data->expires : "lifetime";
                if ($expires == "lifetime") {
                    $message = $strings["license-key-expired"];
                } else {
                    $message = " <br>" . sprintf($strings["license-key-expired-%s"], $expires);
                }
            } elseif ($license_data->license == "disabled") {
                $message = $strings["license-key-is-disabled"];
            } elseif ($license_data->license == "site_inactive") {
                $message = $strings["site-is-inactive"];
            }
        }

        return $message;
    }

    function disable_wporg_request($r, $url){
        if (0 !== strpos($url, "https://api.wordpress.org/themes/update-check/1.1/")) {
            return $r;
        }
        $themes = json_decode($r["body"]["themes"]);
        $parent = get_option("template");
        $child = get_option("stylesheet");
        unset($themes->themes->{$parent});
        unset($themes->themes->{$child});
        $r["body"]["themes"] = json_encode($themes);
        return $r;
    }
}

