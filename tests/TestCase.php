<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    protected function runCoverageCheck(string $file, string $percentage = '50', string $precision = '2'): string
    {
        $argv = [];
        $argv[1] = __DIR__ . '/Fixtures/' . $file;
        $argv[2] = $percentage;
        $argv[3] = $precision;
        $argv[4] = 'false';

        ob_start();

        include __DIR__ . '/../src/test-coverage-checker.php';

        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    }
}
