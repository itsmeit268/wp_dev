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


function ex_themes_not_activate_front_end(){
    ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <style>
        body {
            background: #000 !important;
            overflow: hidden
        }

        #warning span {
            font-size: 50px
        }

        #warning {
            z-index: 999999999;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            padding: 20% 0;
            height: 100%;
            text-align: center;
            background: rgba(0, 0, 0, 0.97);
            color: #fff
        }

        h4.ex_themes, a.ex_themes {
            font-weight: 800;
            font-size: 40px;
            color: #ffd800 !important;
            line-height: 1.3em;
            text-align: center;
            text-shadow: 0.02em 0.05em 0em rgba(0, 0, 0, 0.4);
        }</style>
    <div id="warning"><h4 class="ex_themes"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Need
            Activate <?php echo THEMES_NAMES; ?>
            v.<?php echo VERSION; ?>
            Themes <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h4>
        <p>Please Login On <b><a class="ex_themes" href="<?php echo EXTHEMES_MEMBER_URL; ?>"
                                 target="_blank"><?php echo EXTHEMES_AUTHOR; ?>
                </a></b> To Get Your License Key</p><span id="aktivasi"> </span></div>
<?php }

function ex_themes_notices_not_activate_admin() {
    if (empty($lis) && $_GET["page"] != 'ex_theme') {
        printf(
            "<style>.notice-error, div.error {border-left-color: deepskyblue!important;}.landingpress-message {padding: 20px !important; font-size: 16px !important;}.landingpress-message-inner {overflow: hidden;}.landingpress-message-icon {float: left; width: 35px; height: 35px; padding-right: 20px;}.landingpress-message-button {float: right; padding: 3px 0 0 20px;}</style>
            <div class='error landingpress-message'>
                <div class='landingpress-message-inner'>
                    <div class='landingpress-message-icon' style='font-size: 16px!important; text-transform: capitalize'>
                        <img src='" . get_template_directory_uri() . "/assets/img/xthemes.png' width='35' height='35' alt=''/>
                    </div>
                    <div class='landingpress-message-button'>
                        <a href='" . admin_url("admin.php?page=reload") . "' class='button button-primary'>Enter License Code</a>
                    </div>
                    <strong style='text-transform: capitalize;'>Welcome to " . THEMES_NAMES . " WordPress Themes.</strong>
                    <strong style='text-transform: capitalize; font-weight: 800; font-size: 20px; color: orangered!important; text-shadow: 0.02em 0.05em 0 rgba(0, 0, 0, 0.4);'>Please Activate " . THEMES_NAMES . " license</strong>
                    <br>
                    <i style='text-transform: capitalize;'>to get automatic updates, technical support, and access to " . THEMES_NAMES . " Options Panel</i>.
                </div>
            </div>"
        );
    }
}


if ("valid" == get_option(ex . theme . "_license_key_status", false)) {
    if (!class_exists("ReduxFramework") && file_exists(get_template_directory() . "/libs/panel/inc/ReduxCore/framework.php")) {
        require_once get_template_directory() . "/libs/panel/inc/ReduxCore/framework.php";
    }
    if (!isset($redux_demo) && file_exists(get_template_directory() . "/libs/core/pengaturan.php")) {
        require_once get_template_directory() . "/libs/core/pengaturan.php";
    }
    if (current_user_can("editor") || current_user_can("administrator")) {
        require_once get_template_directory() . "/libs/addons/setting.php";
    }
}

if ("valid" != get_option(ex . theme . "_license_key_status", false)) {
    add_action("admin_notices", "ex_themes_notices_not_activate_admin");
    add_action("wp_footer", "ex_themes_not_activate_front_end");
}


add_action("after_setup_theme", "themes_updater");
function themes_updater(){
    require get_template_directory() . "/libs/plugins/ruwa.php";
}

function noindex_nofollow_page_login($redirect_to, $request, $user){
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array("administrator", $user->roles)) {
            return home_url("/wp-admin/admin.php?page=" . ex . theme);
        } else {
            return home_url("/wp-admin/");
        }
    } else {
        return home_url("/wp-admin/");
    }
}

ini_set("display_errors", ERRORS);
