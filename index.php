<?php
/*
	This file is part of myTinyTodo.
	(C) Copyright 2009-2010 Max Pozdeev <maxpozdeev@gmail.com>
	Modified by Alexander Adam <info@alexander-adam.net> Copyright 2012
	Licensed under the GNU GPL v3 license. See file COPYRIGHT for details.
*/

require_once('./init.php');

$lang = Lang::instance();

if($lang->rtl()) Config::set('rtl', 1);

if(!is_int(Config::get('firstdayofweek')) || Config::get('firstdayofweek')<0 || Config::get('firstdayofweek')>6) Config::set('firstdayofweek', 1);

define('TEMPLATEPATH', MTTPATH. 'themes/'.Config::get('template').'/');

if(isset($_SERVER['HTTP_USER_AGENT']))
{
	$l=array('Android','iPhone','iPad');
	foreach($l as $item){
		if(stripos($_SERVER['HTTP_USER_AGENT'],$item)!==false&&!isset($_GET['pda'])){
			header('location: ?pda');
			exit;
		}
	}
}

require(TEMPLATEPATH. 'index.php');

?>