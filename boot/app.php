<?php
/**
 * Date: 01/16/2022 11:35 PM
 * @author Ar Rakin <rakinar2@gmail.com>
 */

require_once __DIR__ . "/../vendor/autoload.php";

return isCLI() ?
    new \OSN\Framework\Console\App(__DIR__ . '/..') :
    new \OSN\Framework\Core\App(__DIR__ . '/..');
