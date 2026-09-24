<?php

$file = fopen("test1.txt", "r");

if ($file) {
    echo fread($file, filesize("test1.txt"));
    fclose($file);
} else {
    echo "File tidak dapat dibuka.";
}

?>