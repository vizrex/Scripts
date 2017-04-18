<?php

/*
 * Author:  Mian Zeshan Farooqi
 * Dated:   April 05, 2017
 */ 

function removeDirectoryContent($dir, $removeDirectory=false)
{
    /*
     * Courtesy: http://stackoverflow.com/questions/11613840/remove-all-files-folders-and-their-subfolders-with-php
     */
    
    if (is_dir($dir))
    {
        $objects = scandir($dir);
        foreach ($objects as $object)
        {
            if ($object != "." && $object != "..")
            {
                if (filetype($dir . "/" . $object) == "dir")
                {
                    removeDirectoryContent($dir . "/" . $object, true);
                }
                else
                {
                    unlink($dir . "/" . $object);
                    printMsg("        Removed ".$dir."/".$object);
                }
            }
        }
        reset($objects);
        if($removeDirectory)
        {
            rmdir($dir);
            printMsg("        Removed ".$dir);
        }
    }
}

// Simple print the given message and a new line on console
function printMsg($msg)
{
    echo $msg.PHP_EOL;
}


// By default, clear all three folders
$clearCache = true;
$clearSessions = true;
$clearViews = true;

if($argc > 1)
{
    $scope = $argv[1];
    
    
    if($scope == '--all')
    {
        $clearCache = true;
        $clearSessions = true;
        $clearViews = true;
    }
    else if($scope == '--cache' || $scope == '--sessions' || $scope == '--views')
    {
        $clearCache = ($scope == '--cache');
        $clearSessions = ($scope == '--sessions');
        $clearViews = ($scope == '--views');
    }
    else
    {
        printMsg("Invalid Scope Specified. Please see command usage below.");
        printMsg("");
        
        printMsg("Command Usage:");
        printMsg("");
        
        printMsg("clear-storage.php [scope: --all (default)]");
        printMsg("");
        
        printMsg("--all:\t\tClears all folders i.e. cache, sessions, views");
        printMsg("--cache:\tClears cache folder only");
        printMsg("--sessions:\tClears sessions folder only");
        printMsg("--views:\tClears views folder only");
        exit -1;
    }
}

if($clearCache)
{
    printMsg("Clearning cache folder...");
    removeDirectoryContent("./storage/framework/cache");
    printMsg("Clearning cache folder completed!");
    printMsg("");
}

if($clearSessions)
{
    printMsg("Clearning sessions folder...");
    removeDirectoryContent("./storage/framework/sessions");
    printMsg("Clearning sessions folder completed!");
    printMsg("");
}

if($clearViews)
{
    printMsg("Clearning views folder...");
    removeDirectoryContent("./storage/framework/views");
    printMsg("Clearning views folder completed!");
}
