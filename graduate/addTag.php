<?php

echo "begin\n";


if(!isset($_POST['tag'])){ 
    die("POST ERROR");
}

$tag = $_POST['tag'];

$tag = trim($tag);

if(strlen($tag) == 0){
    die("LENGTH 0");
}

$tags = readTags();

if(! isset($tags[$tag])){
    addTag($tag);
    echo "add\n";
}
function addTag($tag){
    $TAG_FILE = "tag.bat";
    $fp = fopen($TAG_FILE, "a");
    fputs($fp, $tag."\n"); 
    fclose($fp);
}

function readTags(){
    $TAG_FILE = "tag.bat";
    $tags = array();
    
    $fp = fopen($TAG_FILE, "r");
    
    while(!feof($fp)){
        $line =  fgets($fp);
        $line = trim($line);

        if(!isset($tags[$line])){
            $tags[$line] = 1;
        }
    }
   fclose($fp); 
    return $tags;
}


?>
