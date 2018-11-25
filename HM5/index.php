<?php
/**
 * @file
 * Skeletone code for HW5.
 */

// Let's check if we should open some specific task.
$file = !empty($_GET['file']) ? $_GET['file'] : NULL;

// Check proper file...
$files = ['task1.php', 'task2.php', 'task3.php', 'task4.php' /* and so on... */];
if (in_array($file, $files)) {
  require_once($file);
}
else {
  echo '<h3 class="title text-center font-weight-bold pb-3 pt-3">Choose task to review...</br></h3>';

}
// Let's show pager.
require_once('footer.tpl.php');
