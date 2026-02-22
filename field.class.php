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
 * TCKN profile field type.
 *
 * @package    profilefield_tckn
 * @copyright  2026 Özcan Oğuz <ozcan@antandros.com.tr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/user/profile/field/text/field.class.php');

/**
 * Handles display and validation of the TCKN profile field.
 *
 * @package    profilefield_tckn
 * @copyright  2026 Özcan Oğuz <ozcan@antandros.com.tr>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class profile_field_tckn extends profile_field_text {
    /**
     * Validate the TCKN field value on the profile edit form.
     *
     * @param stdClass $usernew The user object with submitted form data.
     * @return array Validation errors keyed by field input name.
     */
    public function edit_validate_field($usernew) {
        $errors = parent::edit_validate_field($usernew);

        $key   = $this->inputname;
        $value = $usernew->{$key} ?? '';
        $value = trim((string) $value);

        if ($value === '') {
            return $errors;
        }

        if (!\profilefield_tckn\tckn::is_valid($value)) {
            $errors[$key] = get_string('invalidtckn', 'profilefield_tckn');
        }

        return $errors;
    }
}
