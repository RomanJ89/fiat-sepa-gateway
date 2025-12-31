<?php

/**
 * Base58 Internal - Legacy EBICS Emulation Layer
 *
 * This script provides backward compatibility for older banking nodes (EBICS V2.5)
 * that communicate via direct socket connections instead of REST APIs.
 *
 * @security  Restricted Access (VPN Only)
 * @protocol  ISO 20022 / MT940
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Security: Prevent access to hidden operational files
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

// Route request through the secure gateway entry point
require_once __DIR__.'/public/index.php';
