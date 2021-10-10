<?php
defined('BASEPATH') OR exit;

class Authz {

    protected $ci;

    public $user;

    public function __construct() {
        $this->ci =& get_instance();

        $this->ci->load->library('session');
    }

    public function login_assert() {
        if (!isset($_SESSION['user'])) {
            redirect('frontend/auth');
        }
        $user = $_SESSION['user'];
    }

    public function logout_assert() {
        if (isset($_SESSION['user'])) {
            redirect('frontend');
        }
    }

    public function authorize($id, $name) {
        $_SESSION['user'] = ['id' => $id, 'name' => $name];
    }

    public function unauthorize() {
        unset($_SESSION['user']);
    }

}

