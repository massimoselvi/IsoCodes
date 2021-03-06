<?php

namespace IsoCodes\Tests;

/**
 * GraiTest
 *
 * @covers Isocodes\Grai
 */
class GraiTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('04719512002889 1234567890 123456'), // valid GTIN13 + valid random optional serial number
            array('04719512002889-1234567890-123456'), // hyphens are OK (dash)
            array('04719512002889 1234567890 123456'), // hyphens are OK (space)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('0471951200288-1234567890-123456'),// not 13 chars found in GTIN13 component
            array(4719512002881234567890123456), // same, but integer
            array('04719512002888-1234567890-123456'), // bad checksum digit
            array('04719512002889.1234567890.123456'),  // dot hyphens are not OK.
        );
    }
}
