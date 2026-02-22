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
 * Unit tests for TCKN validation.
 *
 * @package    profilefield_tckn
 * @copyright  2026 Özcan Oğuz <ozcan@antandros.com.tr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace profilefield_tckn;

/**
 * Tests for the tckn validation helper.
 *
 * @package    profilefield_tckn
 * @copyright  2026 Özcan Oğuz <ozcan@antandros.com.tr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \profilefield_tckn\tckn
 */
final class tckn_test extends \advanced_testcase {
    /**
     * Test that known-invalid TCKN values are rejected.
     *
     * @return void
     */
    public function test_invalid_values(): void {
        $this->assertFalse(tckn::is_valid(''));
        $this->assertFalse(tckn::is_valid('01234567890'));
        $this->assertFalse(tckn::is_valid('123'));
        $this->assertFalse(tckn::is_valid('1234567890a'));
        // Generally invalid checksum.
        $this->assertFalse(tckn::is_valid('11111111111'));
    }

    /**
     * Test that a known-valid TCKN value is accepted.
     *
     * @return void
     */
    public function test_valid_sample(): void {
        $this->assertTrue(tckn::is_valid('10000000146'));
    }
}
