<?php

require __DIR__ . "/helper.php";

function importAllFrom($path) {
   $directory = scandir(__DIR__ . "/../{$path}/"); 

   foreach ($directory as $file) {
       if (substr($file, -4) == ".php") {
           require __DIR__ . "/../{$path}/{$file}";
       }
   }
}

