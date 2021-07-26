<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class ImageUploader
{
   
    private $logger;

    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }

    public function upload(){

    }
}
