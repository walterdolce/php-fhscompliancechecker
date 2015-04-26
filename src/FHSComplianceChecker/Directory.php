<?php

namespace FHSComplianceChecker;

/**
 * Interface Directory
 * @package FHSComplianceChecker
 */
interface Directory
{
    /**
     * Implement the ls method to
     * get the content of a directory.
     *
     * @return array|null
     */
    public function ls();
}
