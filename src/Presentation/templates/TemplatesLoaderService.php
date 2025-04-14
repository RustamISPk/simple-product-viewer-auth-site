<?php

namespace Autodeal\Presentation\templates;

use Twig\Loader\FilesystemLoader;

class TemplatesLoaderService extends FilesystemLoader
{
    public function __construct($path){
        parent::__construct($path);
    }
}