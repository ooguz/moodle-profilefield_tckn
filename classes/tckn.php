<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * TCKN validation helper.
 *
 * @package    profilefield_tckn
 * @copyright  2026 Özcan Oğuz <ozcan@antandros.com.tr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace profilefield_tckn;

/**
 * Validates Turkish Identification Numbers (TCKN).
 *
 * @package    profilefield_tckn
 * @copyright  2026 Özcan Oğuz <ozcan@antandros.com.tr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tckn {
    /**
     * Validate Turkish Identification Number (TCKN).
     *
     * Rules: 11 digits, first digit non-zero, checksum on digits 10 and 11.
     *
     * @param string $value The TCKN value to validate.
     * @return bool True if valid, false otherwise.
     */
    public static function is_valid(string $value): bool {
        $value = trim($value);

        if (!preg_match('/^[1-9][0-9]{10}$/', $value)) {
            return false;
        }

        $d = array_map('intval', str_split($value));

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
