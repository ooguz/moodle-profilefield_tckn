<?php
/**
 * @copyright 2026 Özcan Oğuz <ozcan@antandros.com.tr>
 */
    defined('MOODLE_INTERNAL') || die();

    // Extend the built-in TEXT profile field type to inherit form rendering logic.
    require_once $CFG->dirroot . '/user/profile/field/text/field.class.php';

    class profile_field_tckn extends profile_field_text
    {

    public function edit_validate_field($usernew)
    {
        $errors = parent::edit_validate_field($usernew);

        $key   = $this->inputname;
        $value = $usernew->{$key} ?? '';
        $value = trim((string) $value);

        // Empty: let core required handling handle it (if field is required).
        if ($value === '') {
            return $errors;
        }

        if (! \profilefield_tckn\tckn::is_valid($value)) {
            $errors[$key] = get_string('invalidtckn', 'profilefield_tckn');
        }

        return $errors;
    }
}
