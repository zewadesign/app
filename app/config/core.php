<?php
/**
 * Auto-loaded Helpers
 */
$core['helpers'] = ['url','script_loader'];

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
    'securityCode' => '0123ABC',
    'expiration' => 7200,
    'flashdataId' => '_z_session_flashdata',
    'lockToUserAgent' => false,
    'lockToIP' => false,
    'gcProbability' => 1,
    'gcDivisor' => 100,
    'tableName' => 'Session'
];

/**
 * Cache
 */
$core['cache'] = false;
//$core['cache'] = [
//    'host' => 'localhost',
//    'port' => '11211'
//];

/**
 * Database
 */
$core['database'] = false;
//$core['database']['default'] = [
//    'dsn' => 'mysql:host=localhost;dbname=idm',
//    'user' => 'developer',
//    'pass' => 'developer'
//];
