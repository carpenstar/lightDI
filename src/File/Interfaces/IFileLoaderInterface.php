<?php
namespace DependencyInjection\File\Interfaces;

interface IFileLoaderInterface
{
    public function setFilePath(string $filePath): self;
    public function load(): array;
}