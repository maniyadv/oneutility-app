<?php
/**
 * Created by PhpStorm.
 * User: maniyadav
 * Date: 2/3/19
 * Time: 4:24 PM
 */


# Tables
if (!defined('TABLE_PROVIDERS'))      define('TABLE_PROVIDERS', 'providers');
if (!defined('TABLE_PRODUCTS'))       define('TABLE_PRODUCTS', 'products');
if (!defined('TABLE_PRODUCT_PRICES')) define('TABLE_PRODUCT_PRICES', 'product_prices');


# Provider Types
if (!defined('PROVIDER_TYPE_BROADBAND')) define('PROVIDER_TYPE_BROADBAND', 'broadband');
if (!defined('PROVIDER_TYPE_ENERGY'))    define('PROVIDER_TYPE_ENERGY', 'energy');


# Status
if (!defined('STATUS_ACTIVE_FLAG'))   define('STATUS_ACTIVE_FLAG', 1);
if (!defined('STATUS_INACTIVE_FLAG')) define('STATUS_INACTIVE_FLAG', 0);


# Price
if (!defined('DEFAULT_PRICE_CURRENCY')) define('DEFAULT_PRICE_CURRENCY', 'GBP');
if (!defined('DEFAULT_PRICE_VARIATION'))  define('DEFAULT_PRICE_VARIATION', 'none');
if (!defined('PRICE_VARIATION_NORTHERN')) define('PRICE_VARIATION_NORTHERN', 'northern');
if (!defined('PRICE_VARIATION_MIDLANDS')) define('PRICE_VARIATION_MIDLANDS', 'midlands');
if (!defined('PRICE_VARIATION_SOUTHERN')) define('PRICE_VARIATION_SOUTHERN', 'southern');


# HTTP Status Codes
if (!defined('HTTP_STATUS_CODE_OK')) define('HTTP_STATUS_CODE_OK', 200);
if (!defined('HTTP_STATUS_CODE_NO_CONTENT')) define('HTTP_STATUS_CODE_NO_CONTENT', 204);
if (!defined('HTTP_STATUS_CODE_BAD_REQUEST')) define('HTTP_STATUS_CODE_BAD_REQUEST', 400);
if (!defined('HTTP_STATUS_CODE_FORBIDDEN')) define('HTTP_STATUS_CODE_FORBIDDEN', 403);
if (!defined('HTTP_STATUS_CODE_UNPROCESSABLE_ENTITY')) define('HTTP_STATUS_CODE_UNPROCESSABLE_ENTITY', 422);
if (!defined('HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR')) define('HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR', 500);

# Internal Error codes
if (!defined('ERROR_INVALID_PARAMETER')) define('ERROR_INVALID_PARAMETER', 'InvalidParameter');

# Others
if (!defined('STATUS_SUCCESS')) define('STATUS_SUCCESS', 'success');
