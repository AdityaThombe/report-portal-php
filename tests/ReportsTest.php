<?php
use PHPUnit\Framework\TestCase;
use Portal\Reports;

final class ReportsTest extends TestCase
{
    public function testRead(): void
    {
        $dir = sys_get_temp_dir() . '/reports-' . uniqid();
        mkdir($dir);
        file_put_contents($dir . '/q1.txt', 'revenue up');
        $this->assertSame('revenue up', Reports::read($dir, 'q1.txt'));
    }

    public function testWordCount(): void
    {
        $file = tempnam(sys_get_temp_dir(), 'wc');
        file_put_contents($file, 'one two three');
        $this->assertSame('3', Reports::wordCount($file));
    }

    public function testLoadSettings(): void
    {
        $this->assertSame(['theme' => 'dark'], Reports::loadSettings(base64_encode(serialize(['theme' => 'dark']))));
    }

    public function testTitle(): void
    {
        $this->assertSame('Quarterly Sales Report', Reports::title('quarterly-sales_report'));
    }
}
