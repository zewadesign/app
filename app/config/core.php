<?php
/**
 * Auto-loaded Helpers
 */
$core['autoload']['helpers'] = ['url','script_loader'];

/**
 * Auto-loaded Libraries
 */
$core['autoload']['libraries'] = [];

/**
 * Language
 */
$core['language'] = 'en_lang';

/**
 * Modules
 */
$core['modules']['defaultModule'] = 'example';
$core['modules']['example'] = [
    'aclRedirect' => 'usr/account/login',
    'defaultController' => 'home',
    'defaultMethod' => 'index'
];

/**
 * Hooks (enable/disable)
 */
$core['hooks'] = true;

/**
 * ACL
 */
$core['acl'] = false;
//$core['acl'] = (object) [
//    'roles' => (object) [
//        'guest' => 1,
//        'admin' => 2,
//        'client' => 3,
//        'user' => 4
//    ],
//    'guestId' => 1,
//    'adminId' => 2,
//    'clientId' => 3,
//    'userId' => 4
//];

/**
 * Session
 *
 * The session can be set as file for file based sessions
 * or database for database driven sessions.
 */
$core['session'] = [
    'interface' => 'file',
    'flashdataId' => ''
];

/**
 * Cache
 */
$core['cache'] = false;
//$core['cache'] = [
//    'host' => 'localhost',
//    'port' => '11111'
//];

/**
 * Database
 */
$core['database'] = false;
//$core['database']['default'] = [
//    'dsn' => 'mysql:host=localhost;dbname=database',
//    'user' => 'db username',
//    'pass' => 'db password'
//];