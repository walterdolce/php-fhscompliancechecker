<?php

namespace FHSComplianceChecker;

class DefaultDirectory implements Directory
{
    private $path = '';

    public function __construct($path = null)
    {
        $this->path = (string)$path;
    }

    public function ls()
    {
        $directory = null;
        $finalDirectory = null;
        try {
            $directory = new \DirectoryIterator($this->path);
            foreach ($directory as $directoryItem) {
                if (!$directoryItem->isDot()) {
                    $finalDirectory[] = $directoryItem->getFilename();
                }
            }
        } catch(\Exception $e) {
        }
        if ($finalDirectory) {
            $directory = null;
            $directory = $finalDirectory;
        }
        return $directory;
    }
}
