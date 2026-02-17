/**
 * @copyright 2026 Özcan Oğuz <ozcan@antandros.com.tr>
 */

<?php
    defined('MOODLE_INTERNAL') || die();

    use profilefield_tckn\tckn;

    class profilefield_tckn_tckn_testcase extends advanced_testcase
    {

    public function test_invalid_values()
    {
        $this->assertFalse(tckn::is_valid(''));
        $this->assertFalse(tckn::is_valid('01234567890'));
        $this->assertFalse(tckn::is_valid('123'));
        $this->assertFalse(tckn::is_valid('1234567890a'));
        $this->assertFalse(tckn::is_valid('11111111111')); // generally invalid
    }

    public function test_valid_sample()
    {
        // Replace this with an internally verified valid sample for your org.
        $this->assertTrue(tckn::is_valid('10000000146'));
    }
}
