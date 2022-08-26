<?php
namespace DependencyInjection\File;

use DependencyInjection\File\Interfaces\IFileLoaderInterface;

class FileLoaderHelper
{
    public static function getFileLoaderClassName(string $filePath) : string
    {
        try {
            $filePathArray = explode("/", $filePath);
            $explodedFileName = explode(".", $filePathArray[count($filePathArray) - 1]);
            $fileExtension = $explodedFileName[count($explodedFileName) - 1];

            $fileLoaderClass = "DependencyInjection\File\\" . ucfirst($fileExtension) . "FileLoader";

            if (($class = new $fileLoaderClass()) instanceof IFileLoaderInterface) {
                return get_class($class);
            }

        } catch (\Exception $e) {
            //todo Exception
        }
    }
}