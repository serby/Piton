<?php
$path = realpath(dirname(__FILE__) . "/..");
ini_set("include_path", ".:{$path}:{$path}/lib:" . PEAR_INSTALL_DIR);

require "Piton/AutoLoader.php";
Piton\AutoLoader::register();
