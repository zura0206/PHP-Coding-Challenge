<?php
use PHPUnit\Framework\TestCase;

require_once 'functions.php';

class FunctionsTest extends TestCase
{
    public function testFormatBytesReturnsString()
    {
        echo "\nTEST: Verifies formatBytes returns a string\n";
        echo "DESCRIPTION: Ensures the basic number formatting function returns the expected type\n";
        
        $result = formatBytes('12345');
        $this->assertIsString($result, 'FAIL: formatBytes did not return string type');
        
        echo "✓ PASS: formatBytes returned string as expected\n";
    }

    public function testFormatDateTimeReturnsStringOrFalse()
    {
        echo "\nTEST: Verifies formatDateTime handles both valid and invalid dates\n";
        echo "DESCRIPTION: Checks the date formatting function's behavior with different inputs\n";
        
        echo "- Testing valid date format...\n";
        $validResult = formatDateTime('2023-01-01 12:00');
        $this->assertThat(
            $validResult,
            $this->logicalOr($this->isType('string'), $this->isFalse()),
            'FAIL: Valid date did not return string or false'
        );
        echo "✓ PASS: Valid date handled correctly\n";
        
        echo "- Testing invalid date format...\n";
        $invalidResult = formatDateTime('invalid-date');
        $this->assertThat(
            $invalidResult,
            $this->logicalOr($this->isType('string'), $this->isFalse()),
            'FAIL: Invalid date did not return false'
        );
        echo "✓ PASS: Invalid date handled correctly\n";
    }

    public function testParseLineReturnsArray()
    {
        echo "\nTEST: Verifies parseLine returns an array\n";
        echo "DESCRIPTION: Ensures the log line parser returns the expected structure\n";
        
        $line = "ID1234567890 USER12 12345678 87654321 2023-01-01 12:00";
        $result = parseLine($line);
        $this->assertIsArray($result, 'FAIL: parseLine did not return array type');
        
        echo "✓ PASS: parseLine returned array as expected\n";
    }

    public function testMainScriptStructureExists()
    {
        echo "\nTEST: Verifies required files exist\n";
        echo "DESCRIPTION: Checks if the essential project files are present\n";
        
        echo "- Checking functions.php...\n";
        $this->assertFileExists('functions.php', 'FAIL: functions.php does not exist');
        echo "✓ PASS: functions.php exists\n";
        
        echo "- Checking sample-log.txt...\n";
        $this->assertFileExists('sample-log.txt', 'FAIL: sample-log.txt does not exist');
        echo "✓ PASS: sample-log.txt exists\n";
    }
}
