<?php
error_reporting((E_ALL ^ E_DEPRECATED) & ~E_NOTICE);
/*
    Theme Setting
*/
$sysConfig['Theme.siteTitle'] = 'HUMANIS';
$sysConfig['Theme.defaultTheme'] = 'default';
$sysConfig['Theme.defaultPage'] = 'default';

/*
    Database Setting
    DB.name     : Database name
    DB.user     : Database user
    DB.password : Database password
    DB.host     : Database host
    DB.type     : Database type
*/
$sysConfig['DB.name'] = 'chumanis_db';//'mpd-ws';
$sysConfig['DB.prefix'] = 'core';
$sysConfig['DB.user'] = 'chumanis';
$sysConfig['DB.password'] = 'chumanis';
$sysConfig['DB.host'] = 'localhost:5444';
$sysConfig['DB.type'] = 'postgres';

/*
    Module Setting
*/
$sysConfig['Module.defaultModule'] = 'bds';
$sysConfig['Module.defaultClass'] = 'bds';
$sysConfig['Module.defaultMethod'] = 'main';

/* Session Setting */
$sysConfig['Session.Duration'] = 7;
$sysConfig['Session.InactivityTimeout'] = 90;
