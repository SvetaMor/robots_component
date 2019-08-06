<?php
namespace svetamor\robots;

use svetamor\robots\interfaces\ICreatingFile;

class RobotsComponent
{
    public $userAgent;
    public $host;
    public $sitemap;
    
    protected $result;
    protected $newFile;
    
    public function __construct(ICreatingFile $newFile)
    {
        $this->newFile = $newFile; 
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
        
        $this->newFile->createFile($result);
        
        return $result;
    }
    
}
