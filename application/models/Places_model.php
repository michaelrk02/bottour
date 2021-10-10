<?php
defined('BASEPATH') OR exit;

class Places_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get($id, $columns = '*') {
        return $this->db->select($columns)->from('places')->where('place_id', $id)->get()->row_array(0);
    }

    public function list_places($columns = '*') {
        return $this->db->select($columns)->from('places')->get()->result_array();
    }

}

