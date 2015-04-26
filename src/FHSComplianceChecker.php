<?php

use FHSComplianceChecker\Directory;

/**
 * Class FHSComplianceChecker
 */
class FHSComplianceChecker
{
    /**
     * @var array $complianceRequiredDirs
     */
    private $complianceRequiredDirs = [
        'bin',
        'boot',
        'dev',
        'etc',
        'lib',
        'media',
        'mnt',
        'opt',
        'sbin',
        'srv',
        'tmp',
        'usr',
        'var'
    ];

    /**
     * @var Directory $directory
     */
    private $directory;

    const IS_COMPLIANT     = 1;
    const IS_NOT_COMPLIANT = 0;
    const UNDEFINED        = -1;

    /**
     * @param Directory $directory
     */
    public function __construct(Directory $directory = null)
    {
        $this->directory = $directory;
    }

    /**
     * @return int
     */
    public function isCompliant()
    {
        if (!$this->directory
            || !($files = $this->directory->ls())
            || !is_array($files)
        ) {
            return self::UNDEFINED;
        }

        sort($files);

        return ($this->complianceRequiredDirs === $files)
            ?
            self::IS_COMPLIANT
            :
            self::IS_NOT_COMPLIANT;
    }
}
