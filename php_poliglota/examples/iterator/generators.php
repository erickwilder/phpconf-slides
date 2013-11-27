<?php
function read_line($path)
{
    $fp = fopen($path, 'r');
    try {
        while (false !== $line = fgets($fp)) {
            yield $line;
        }
    } finally {
        fclose($fp);
    }
}
