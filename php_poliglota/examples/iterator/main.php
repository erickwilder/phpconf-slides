#!/usr/bin/env php
<?php

$opts = getopt('t:');
$type = isset($opts['t']) ? $opts['t'] : null;
$big_file = realpath(__DIR__ . '/../../_resources/big_file.txt');

switch ($type) {
    case 'spl':
        require __DIR__ . '/iterator.php';

        $iter = new ReadLineIterator($big_file);
        foreach ($iter as $line) {
            echo $line, PHP_EOL;
        }
        break;

    case 'gen';
        require __DIR__ . '/generators.php';

        foreach(read_line($big_file) as $line) {
            echo $line, PHP_EOL;
        }
        break;

    default:
        $fp = fopen($big_file, 'r');

        while (false !== $line = fgets($fp)) {
            echo $line, PHP_EOL;
        }

        fclose($fp);
        break;
}
