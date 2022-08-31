<?php
namespace Carpenstar\DependencyInjection\File;

use Carpenstar\DependencyInjection\File\Interfaces\IFileLoaderInterface;

class FileLoaderHelper
{
    public static function getFileLoaderClassName(string $filePath) : string
    {
        $filePathArray = explode("/", $filePath);
        $explodedFileName = explode(".", $filePathArray[count($filePathArray) - 1]);
        $fileExtension = $explodedFileName[count($explodedFileName) - 1];

        $fileLoaderClass = "Carpenstar\DependencyInjection\File\\" . ucfirst($fileExtension) . "FileLoader";

        if (($class = new $fileLoaderClass()) instanceof IFileLoaderInterface) {
            return get_class($class);
        }
    }
}