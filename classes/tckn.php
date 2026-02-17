<?php
namespace profilefield_tckn;

defined('MOODLE_INTERNAL') || die();

class tckn {
    /**
     * Validate Turkish Identification Number (TCKN).
     *
     * - 11 digits
     * - First digit cannot be 0
     * - Checksum rules for 10th and 11th digits
     */
    public static function is_valid(string $value): bool {
        $value = trim($value);

        if (!preg_match('/^[1-9][0-9]{10}$/', $value)) {
            return false;
        }

        $d = array_map('intval', str_split($value)); // 11 digits

        $odd  = $d[0] + $d[2] + $d[4] + $d[6] + $d[8];
        $even = $d[1] + $d[3] + $d[5] + $d[7];

        $digit10 = (($odd * 7) - $even) % 10;
        if ($digit10 < 0) {
            $digit10 += 10;
        }

        $digit11 = array_sum(array_slice($d, 0, 10)) % 10;

        return ($digit10 === $d[9] && $digit11 === $d[10]);
    }
}
