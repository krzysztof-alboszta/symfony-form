<?php

namespace Tests\Unit\Enum;

use AppBundle\Enum\DeclineType;
use PHPUnit\Framework\TestCase;

class DeclineTypeEnumTest extends TestCase
{

    public function getAsOptionTest()
    {
        $options = DeclineType::getAsOptions();
        $allConst = DeclineType::getAll();
        $this->assertCount($options, \count($allConst));
        foreach($options as $label => $option) {
            $this->assertEqual($label, DeclineType::getLabel($option));
        }
    }
}