<?php
/**
 * @copyright 2026 Özcan Oğuz <ozcan@antandros.com.tr>
 */
    defined('MOODLE_INTERNAL') || die();

    // Extend the built-in TEXT profile field definition class.
    require_once $CFG->dirroot . '/user/profile/field/text/define.class.php';

    class profile_define_tckn extends profile_define_text
    {
    // No extra settings for now; inherited behavior is enough.
}
