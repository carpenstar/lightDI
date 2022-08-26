<?php
namespace DependencyInjection\File;

use DependencyInjection\File\Abstracts\AFileLoader;

class XmlFileLoader extends AFileLoader
{
    /** @return array */
    public function load(): array
    {
        $filePath = $this->filePath;



        //todo: Реализовать обработку xml-файла 0x1
        return [];
    }
}