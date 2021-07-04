<?php
// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
$server=$_SERVER["HTTP_HOST"];
define('URLROOT', "http://{$server}/php-basic-mvc");
// Site Name
define('SITENAME', 'PHP Basic MVC');

// CRUD Operations' Alert Messages
define('TASK_NOT_CREATED', 'Something went wrong creating new task');
define('TASK_NOT_UPDATED', 'Task updated successfully');
define('TASK_NOT_DELETED', 'Something went wrong deleting task');