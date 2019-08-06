<?php
namespace svetamor\robots;

use svetamor\robots\interfaces\ICreatingFile;

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
