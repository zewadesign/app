# Zech's Framework #


## Installing ##
```
git@github.com:zewadesign/app.git or https://github.com/zewadesign/app.git
cd app
composer install
bower install
```

## Session Table ##
```
CREATE TABLE `Session` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `hash` varchar(32) NOT NULL DEFAULT '',
  `session_data` blob NOT NULL,
  `session_expire` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
```
