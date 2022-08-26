<?php
namespace DependencyInjection\File;

use DependencyInjection\File\Abstracts\AFileLoader;

class YmlFileLoader extends AFileLoader
{
    /** @return array */
    public function load(): array
    {
        return yaml_parse_file($this->filePath);
    }
}