<?php
namespace DependencyInjection\File\Abstracts;

use DependencyInjection\File\Interfaces\IFileLoaderInterface;

abstract class AFileLoader implements IFileLoaderInterface
{
    /** @var string $filePath */
    protected string $filePath;

    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;
        return $this;
    }
}