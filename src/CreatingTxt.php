<?php
namespace app\vendor\svetamor\robots;

use app\vendor\svetamor\robots\interfaces\ICreatingFile;

class CreatingTxt implements ICreatingFile
{
    public $filePath;
    
    public function createFile($text)
    {
        $path = \Yii::getAlias('@webroot').$filePath;
        
        $file = fopen($path, "w+");
        fputs ($file, $text);
        fclose ($file); 
    }
}
