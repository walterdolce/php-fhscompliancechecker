<?php

namespace spec\FHSComplianceChecker;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultDirectorySpec extends ObjectBehavior
{
    function it_returns_null_if_cant_operate()
    {
        $this->beConstructedWith(null);
        $this->ls()->shouldBe(null);
    }

    function it_is_of_type_directory()
    {
        $this->shouldHaveType('FHSComplianceChecker\Directory');
    }

    function it_returns_the_list_of_items_found_in_the_directory_as_array()
    {
        $this->beConstructedWith(__DIR__);
        $this->ls()->shouldBe(
            [
                'DefaultDirectorySpec.php'
            ]
        );
    }
}
