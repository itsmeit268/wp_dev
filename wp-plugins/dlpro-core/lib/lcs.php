<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists("dlpro_core_get_home")) {
    function dlpro_core_get_home()
    {
        $y8qnT = array("http://", "https://", "https://www.", "https://www", "www.");
        return str_replace($y8qnT, '', home_url());
    }
}

if (!function_exists("dlpro_core_license_menu")) {
    function dlpro_core_license_menu()
    {
        add_plugins_page("Dlpro License", "Dlpro License", "manage_options", DLPRO_PLUGIN_LICENSE_PAGE, "dlpro_core_license_page");
    }
}

add_action("admin_menu", "dlpro_core_license_menu");
if (!function_exists("dlpro_core_license_page")) {
    function dlpro_core_license_page()
    {
        $plugin_key = md5(dlpro_core_get_home());
        $license_status = trim(get_option("dlpro_core_license_status" . $plugin_key));
        ?>
        <div class="wrap">
            <h2><?php esc_attr_e("Dlpro Licenses", "dlpro-core"); ?></h2>
            <?php
            if (!empty($license_status)): ?>
                <p><?php esc_html_e("Congratulations, your license is active.", "dlpro-core"); ?></p>
            <?php else: ?>
                <p>License Activation Required</p>
                <?php wp_nonce_field("dlpro_core_license_nonce", "dlpro_core_license_nonce"); ?>
                <form method="post" action="options.php">
                    <?php settings_fields("dlpro_core_license"); ?>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row"><label for="dlpro_core_license_key">License Key</label></th>
                            <td><input id="dlpro_core_license_key" name="dlpro_core_license_key" type="text" class="regular-text"/></td>
                        </tr>
                    </table>
                    <p class="submit">
                        <?php submit_button("Activate License", "primary", "submit", false); ?>
                    </p>
                </form>
            <?php endif; ?>
        </div>
        <?php
    }
}


if (!function_exists("dlpro_core_register_option")) {
    function dlpro_core_register_option()
    {
        $plugin_key = md5(dlpro_core_get_home());
        register_setting("dlpro_core_license", "dlpro_core_license_key" . $plugin_key, "sanitize_text_field");
        register_setting("dlpro_core_license", "dlpro_core_license_status" . $plugin_key, "sanitize_text_field");
    }
}

add_action("admin_init", "dlpro_core_register_option");
if (!function_exists("dlpro_core_connect_fs")) {
    function dlpro_core_connect_fs()
    {
        global $wp_filesystem;
        if (!(false === ($credentials = request_filesystem_credentials('')))) {
            goto check_credentials;
        }
        return false;
        check_credentials:
        if (WP_Filesystem($credentials)) {
            goto filesystem_connected;
        }
        request_filesystem_credentials('');
        return false;
        filesystem_connected:
        return true;
    }
}


if (!function_exists("dlpro_core_de_license")) {
    function dlpro_core_de_license($action, $data, $secret_key = "jshKjsnjHfbC6jjjj")
    {
        $result = false;
        $algorithm = "AES-256-CBC";
        $method = $secret_key;
        $iv = "XjskSJHSkkkJsst";
        $key = hash("sha256", $method);
        $iv = substr(hash("sha256", $iv), 0, 16);
        if ("e" === $action) {
            goto encrypt_data;
        }
        if ("d" === $action) {
            goto decrypt_data;
        }
        goto end;
        encrypt_data:
        $result = openssl_encrypt($data, $algorithm, $key, 0, $iv);
        $result = base64_encode($result);
        goto end;
        decrypt_data:
        $result = openssl_decrypt(base64_decode($data), $algorithm, $key, 0, $iv);
        end:
        return $result;
    }
}


if (!function_exists("dlpro_core_remote_get")) {
    function dlpro_core_remote_get($action = "check", $args = '')
    {
        $url = '';
        $message = '';

        if ("check" === $action) {
            $url = esc_url_raw(add_query_arg($args, DLPRO_API_URL_CHECK));
        } elseif ("activated" === $action) {
            $url = esc_url_raw(add_query_arg($args, DLPRO_API_URL));
        } else {
            $url = esc_url_raw(add_query_arg($args, DLPRO_API_URL_DEACTIVATED));
        }

        $response = wp_remote_get($url, array("timeout" => 20, "sslverify" => false));

        if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
            $message = __("Error communicating with server.", "dlpro-core");
        } else {
            $data = json_decode(wp_remote_retrieve_body($response));

            if (!isset($data->code) || "ok" === $data->code) {
                $message = __("Success", "dlpro-core");
            } else {
                switch ($data->code) {
                    case "license_empty":
                        $message = __("Empty or invalid license key submitted.", "dlpro-core");
                        break;
                    case "license_not_found":
                        $message = __("License key not found on our server.", "dlpro-core");
                        break;
                    case "license_disabled":
                        $message = __("License key has been disabled.", "dlpro-core");
                        break;
                    case "license_expired":
                        $message = __("Your license key has expired on", "dlpro-core") . " " . date_i18n(get_option("date_format"), strtotime($data->expires, current_time("timestamp")));
                        break;
                    case "activation_error":
                        $message = __("Activation server error.", "dlpro-core");
                        break;
                    case "invalid_input":
                        $message = __("Activation failed: invalid input.", "dlpro-core");
                        break;
                    case "no_serials":
                        $message = __("No more activations allowed. You must buy a new license key.", "dlpro-core");
                        break;
                    case "no_reactivation_allowed":
                        $message = __("No reactivation allowed.", "dlpro-core");
                        break;
                    case "not_reachable":
                        $message = __("Our server is not reachable.", "dlpro-core");
                        break;
                    default:
                        $message = __("Other Error.", "dlpro-core");
                        break;
                }
            }
        }

        return $message;
    }
}


if (!function_exists("dlpro_core_activate_license")) {
    function dlpro_core_activate_license()
    {
        global $wp_filesystem;
        if (!isset($_POST["dlpro_core_license_activate"])) {
            goto end_function;
        }
        $license_key = !empty($_POST["dlpro_core_license_key"]) ? sanitize_text_field(wp_unslash($_POST["dlpro_core_license_key"])) : '';
        $home_url = dlpro_core_get_home();
        if (!check_admin_referer("dlpro_core_license_nonce", "dlpro_core_license_nonce")) {
            goto end_function;
        }
        $args = array("key" => $license_key);
        $message = dlpro_core_remote_get("check", $args);
        if (empty($message)) {
            goto handle_empty_message;
        }
        $base_url = admin_url("plugins.php?page=" . DLPRO_PLUGIN_LICENSE_PAGE);
        $redirect_url = add_query_arg(array("dlpro_core_license_activation" => "false", "message" => rawurlencode($message)), $base_url);
        wp_safe_redirect($redirect_url);
        exit;
        handle_empty_message:
        $args = array("key" => $license_key, "request[url]" => esc_url($home_url));
        $message = dlpro_core_remote_get("activated", $args);
        if (empty($message)) {
            goto handle_empty_activation_message;
        }
        $base_url = admin_url("plugins.php?page=" . DLPRO_PLUGIN_LICENSE_PAGE);
        $redirect_url = add_query_arg(array("dlpro_core_license_activation" => "false", "message" => rawurlencode($message)), $base_url);
        wp_safe_redirect($redirect_url);
        exit;
        handle_empty_activation_message:
        $license_hash = md5(dlpro_core_get_home());
        $deactivated_license = dlpro_core_de_license("e", $license_key, $license_hash);
        update_option("dlpro_core_license_key" . $license_hash, $deactivated_license);
        update_option("dlpro_core_license_status" . $license_hash, "ok");
        $response = [];
        $response["status"] = "ok";
        $response[] = $response;
        $upload_dir = wp_upload_dir();
        if (!empty($upload_dir["basedir"])) {
            if (dlpro_core_connect_fs()) {
                $license_dir = $upload_dir["basedir"] . "/" . $license_hash;
                $license_file = $upload_dir["basedir"] . "/" . $license_hash . "/" . $deactivated_license . ".json";
                if (!$wp_filesystem->is_dir($license_dir)) {
                    $permissions = defined("FS_CHMOD_DIR") ? FS_CHMOD_DIR : fileperms(WP_CONTENT_DIR) & 0777 | 0755;
                    if ($wp_filesystem->mkdir($license_dir, $permissions)) {
                        goto create_license_directory;
                    }
                    exit("Can't create cache directory. Please check your folder permission.");
                    create_license_directory:
                }
                $wp_filesystem->put_contents($license_file, json_encode($response, JSON_PRETTY_PRINT));
            }
        }
        wp_safe_redirect(admin_url("plugins.php?page=" . DLPRO_PLUGIN_LICENSE_PAGE));
        exit;
        end_function:
    }
}
add_action("admin_init", "dlpro_core_activate_license");

if (!function_exists("dlpro_core_deactivate_license")) {
    function dlpro_core_deactivate_license()
    {
        global $wp_filesystem;
        if (!isset($_POST["dlpro_core_license_deactivate"])) {
            goto end_function;
        }
        $license_key = !empty($_POST["dlpro_core_license_key"]) ? sanitize_text_field(wp_unslash($_POST["dlpro_core_license_key"])) : '';
        $home_url = dlpro_core_get_home();
        if (!check_admin_referer("dlpro_core_license_nonce", "dlpro_core_license_nonce")) {
            goto end_function;
        }
        $args = array("key" => $license_key);
        $message = dlpro_core_remote_get("check", $args);
        if (empty($message)) {
            goto handle_empty_message;
        }
        $base_url = admin_url("plugins.php?page=" . DLPRO_PLUGIN_LICENSE_PAGE);
        $redirect_url = add_query_arg(array("dlpro_core_license_activation" => "false", "message" => rawurlencode($message)), $base_url);
        wp_safe_redirect($redirect_url);
        exit;
        handle_empty_message:
        $args = array("key" => $license_key, "request[url]" => esc_url($home_url));
        $message = dlpro_core_remote_get("deactivated", $args);
        $license_hash = md5(dlpro_core_get_home());
        $deactivated_license = dlpro_core_de_license("e", $license_key, $license_hash);
        update_option("dlpro_core_license_key" . $license_hash, '');
        update_option("dlpro_core_license_status" . $license_hash, '');
        $upload_dir = wp_upload_dir();
        if (!empty($upload_dir["basedir"])) {
            if (dlpro_core_connect_fs()) {
                $license_dir = $upload_dir["basedir"] . "/" . $license_hash;
                if ($wp_filesystem->exists($license_dir)) {
                    $license_file = $upload_dir["basedir"] . "/" . $license_hash . "/" . $deactivated_license . ".json";
                    if ($wp_filesystem->exists($license_file)) {
                        $wp_filesystem->delete($license_file, false, "f");
                    }
                }
            }
        }
        wp_safe_redirect(admin_url("plugins.php?page=" . DLPRO_PLUGIN_LICENSE_PAGE));
        exit;
        end_function:
    }
}
add_action("admin_init", "dlpro_core_deactivate_license");

if (!function_exists("dlpro_core_check_license")) {
    function dlpro_core_check_license()
    {
        if (!(false === get_transient("dlprocorelicense_transient"))) {
            return;
        }
        global $wp_filesystem;
        $license_hash = md5(dlpro_core_get_home());
        $license_key = trim(get_option("dlpro_core_license_key" . $license_hash));
        $license_salt = dlpro_core_de_license("e", $license_key, $license_hash);
        $product_id = dlpro_core_de_license("d", $license_key, $license_hash);
        $args = array("key" => $product_id);
        $url = esc_url_raw(add_query_arg($args, DLPRO_API_URL_CHECK));
        $response = wp_remote_get($url, array("timeout" => 20, "sslverify" => false));
        if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
            goto handle_error;
        }
        $data = json_decode(wp_remote_retrieve_body($response));
        if (is_wp_error($data)) {
            goto handle_error;
        }
        set_transient("dlprolicense_transient", "hashed", 7 * 24 * HOUR_IN_SECONDS);
        if (!("ok" !== $data->code)) {
            goto handle_ok_response;
        }
        switch ($data->code) {
            case "license_empty":
                update_option("dlpro_core_license_key" . $license_hash, '');
                update_option("dlpro_core_license_status" . $license_hash, '');
                $upload_dir = wp_upload_dir();
                if (!empty($upload_dir["basedir"])) {
                    if (dlpro_core_connect_fs()) {
                        $license_dir = $upload_dir["basedir"] . "/" . $license_hash;
                        if ($wp_filesystem->exists($license_dir)) {
                            $license_file = $upload_dir["basedir"] . "/" . $license_hash . "/" . $license_salt . ".json";
                            if ($wp_filesystem->exists($license_file)) {
                                $wp_filesystem->delete($license_file, false, "f");
                            }
                        }
                    }
                }
                goto end_function;
            case "license_not_found":
                $license_hash = md5(dlpro_core_get_home());
                update_option("dlpro_core_license_key" . $license_hash, '');
                update_option("dlpro_core_license_status" . $license_hash, '');
                $upload_dir = wp_upload_dir();
                if (!empty($upload_dir["basedir"])) {
                    if (dlpro_core_connect_fs()) {
                        $license_dir = $upload_dir["basedir"] . "/" . $license_hash;
                        if ($wp_filesystem->exists($license_dir)) {
                            $license_file = $upload_dir["basedir"] . "/" . $license_hash . "/" . $license_salt . ".json";
                            if ($wp_filesystem->exists($license_file)) {
                                $wp_filesystem->delete($license_file, false, "f");
                            }
                        }
                    }
                }
                goto end_function;
            case "license_disabled":
                $license_hash = md5(dlpro_core_get_home());
                update_option("dlpro_core_license_key" . $license_hash, '');
                update_option("dlpro_core_license_status" . $license_hash, '');
                $upload_dir = wp_upload_dir();
                if (!empty($upload_dir["basedir"])) {
                    if (dlpro_core_connect_fs()) {
                        $license_dir = $upload_dir["basedir"] . "/" . $license_hash;
                        if ($wp_filesystem->exists($license_dir)) {
                            $license_file = $upload_dir["basedir"] . "/" . $license_hash . "/" . $license_salt . ".json";
                            if ($wp_filesystem->exists($license_file)) {
                                $wp_filesystem->delete($license_file, false, "f");
                            }
                        }
                    }
                }
                goto end_function;
        }
        handle_ok_response:
        goto end_function;
        handle_error:
        if (is_wp_error($response)) {
            $message = __("An error occurred, please try again.", "dlpro-core");
            goto set_message;
        }
        $message = $response->get_error_message();
        set_message:
        end_function:
    }
}

if (!function_exists("dlpro_core_admin_notices")) {
    function dlpro_core_admin_notices()
    {
        if (!(isset($_GET["dlpro_core_activation"]) && !empty($_GET["message"]))) {
            goto skip_notices;
        }
        switch ($_GET["dlpro_core_activation"]) {
            case "false":
                $message = rawurldecode(sanitize_text_field(wp_unslash($_GET["message"])));
                echo "\t\t\t\t\t\t<div class=\"error\">\n\t\t\t\t\t\t\t<p>";
                echo esc_html($message);
                echo "</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t";
                goto end_switch;
            case "true":
            default:
                echo "\t\t\t\t\t\t<div class=\"success\">\n\t\t\t\t\t\t\t<p>";
                echo esc_html_e("Success.", "dlpro-core");
                echo "</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t";
                goto end_switch;
        }
        end_switch:
        skip_notices:
    }
}
add_action("admin_notices", "dlpro_core_admin_notices");

