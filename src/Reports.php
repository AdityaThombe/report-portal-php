<?php
// Report helpers. Demo target for ProofPatch: intentionally vulnerable. Never deploy this code.
namespace Portal;

final class Reports
{
    /** Contents of a stored report. */
    public static function read(string $root, string $name): string
    {
        return file_get_contents($root . '/' . $name);
    }

    /** Word count of a report, computed by the system tool. */
    public static function wordCount(string $file): string
    {
        return trim(shell_exec('wc -w < ' . $file));
    }

    /** Restores report settings saved by the browser. */
    public static function loadSettings(string $blob): array
    {
        return unserialize(base64_decode($blob));
    }

    /** Human-readable title. */
    public static function title(string $name): string
    {
        return ucwords(str_replace(['-', '_'], ' ', $name));
    }
}
