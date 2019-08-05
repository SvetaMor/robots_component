<?php

namespace app\components\robots;

use yii\base\BaseObject;

class RobotsComponent extends BaseObject
{
    public $userAgent;
    public $host;
    public $sitemap;
    public $result;
    
    public function init()
    {
        parent::init();
    }
    
    public function render()
    {
        foreach ($this->userAgent as $userAgent => $arr) {
            $result .= "User-agent: $userAgent\n";
            
            foreach ($arr as $param => $values) {
                foreach ($values as $value) {
                    $result .= "$param: $value\n";
                }
            }
            $result .= "\n";
        }
        $result .= "Host: $this->host\n";
        $result .= "Sitemap: $this->sitemap";
        
        $this->createFile($result);
        
        return $result;
    }
    public function createFile($text)
    {
        $path = \Yii::getAlias('@webroot')."/robots.txt";
        
        $file = fopen( $path,"w+");
        fputs ($file, $text);
        fclose ($file); 
    }
}