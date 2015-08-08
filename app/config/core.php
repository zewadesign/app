<?php
/**
 * Auto-loaded Helpers
 */
$core['helpers'] = ['url'];

/**
 * Language
 */
$core['language'] = 'en_lang';

/**
 * Layouts
 */
$core['layouts']['default'] = 'layout';

/**
 * Modules
 */
$core['modules']['defaultModule'] = 'example';
$core['modules']['example'] = [
    'aclRedirect' => FALSE,
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
    'interface' => 'database',
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
//$core['database'] = false;
$core['database']['default'] = [
    'dsn' => 'mysql:host=localhost;dbname=zewacore',
    'user' => 'developer',
    'pass' => 'developer'
];
