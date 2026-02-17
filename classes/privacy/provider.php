<?php
/**
 * @copyright 2026 Özcan Oğuz <ozcan@antandros.com.tr>
 */
    namespace profilefield_tckn\privacy;

    defined('MOODLE_INTERNAL') || die();

    class provider implements \core_privacy\local\metadata\provider
    {

    public static function get_metadata(\core_privacy\local\metadata\collection $collection)
    : \core_privacy\local\metadata\collection {

        // This plugin stores no data in its own tables.
        $collection->add_null_provider_reason('privacy:metadata');
        return $collection;
    }
}
