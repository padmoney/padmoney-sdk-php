<?php

declare(strict_types=1);

namespace Padmoney\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    protected function mock($class)
    {
        return $this->createMock($class);
    }
}
