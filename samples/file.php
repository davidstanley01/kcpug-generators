#!/usr/bin/env php
<?php
$dir = $argv[1];
foreach (readFileSubDir($dir) as $fileItem) {
    echo($fileItem . "\n");
}

function readFileSubDir($scanDir) {
    $handle = opendir($scanDir);

    while (($fileItem = readdir($handle)) !== false) {
        // skip '.' and '..'
        if (($fileItem == '.') || ($fileItem == '..')) {
            continue;
        }
        
        $fileItem = rtrim($scanDir,'/') . '/' . $fileItem;
        
        // if dir found call again recursively
        if (is_dir($fileItem)) {
            foreach (readFileSubDir($fileItem) as $childFileItem) {
                yield $childFileItem;
            }
        } else {
            yield $fileItem;
        }
    }

    closedir($handle);
}
// https://gist.github.com/magnetikonline/10612342
