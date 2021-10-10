<?php
defined('BASEPATH') OR exit;

class Settings_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get($key) {
        $entry = $this->db->select('value')->from('settings')->where('key', $key)->get()->row_array(0);

        return isset($entry) ? $entry['value'] : NULL;
    }

    public function set($key, $value) {
        $this->db->where('key', $key)->update('settings', ['value' => $value]);
    }

}

