<?php
$path = realpath(dirname(__FILE__) . "/..");
ini_set("include_path", ".:{$path}:{$path}/lib:" . PEAR_INSTALL_DIR);

require "Piton/Application/AutoLoader.php";
Piton\Application\AutoLoader::register("../lib/");
