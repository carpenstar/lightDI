<?php
namespace Carpenstar\DependencyInjection\File\Abstracts;

use Carpenstar\DependencyInjection\File\Interfaces\IFileLoaderInterface;

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