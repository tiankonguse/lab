<?php
    
$tags = readTags();
echo json_encode(array("code"=>0,"data"=>$tags));

function readTags(){
    $TAG_FILE = "tag.bat";
    $tags = array();
    $res = array();
    
    $fp = fopen($TAG_FILE, "r");
    
    while(!feof($fp)){
        $line =  fgets($fp);
        $line = trim($line);

        if(strlen($line) > 0 &&  !isset($tags[$line])){
            $tags[$line] = 1;
            $res[] = $line;
        }
    }
   fclose($fp); 
    return $res;
}
?>
