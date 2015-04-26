<?php

namespace spec;

use FHSComplianceChecker\Directory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FHSComplianceCheckerSpec
 * @package spec
 */
class FHSComplianceCheckerSpec extends ObjectBehavior
{
    function it_doesnt_check_anything_without_having_set_a_directory_to_check()
    {
        $this->isCompliant()->shouldBe(-1);
    }

    function it_returns_true_when_the_directory_content_is_fhs_compliant(Directory $directory)
    {
        $directory->ls()->willReturn(
            [
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
            ]
        );
        $this->beConstructedWith($directory);
        $this->isCompliant()->shouldBe(1);
    }

    function it_returns_false_when_the_directory_content_is_not_fhs_compliant(Directory $directory)
    {
        $directory->ls()->willReturn(
            [
                // missing bin/ dir
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
            ]
        );
        $this->beConstructedWith($directory);
        $this->isCompliant()->shouldBe(0);
    }
}
