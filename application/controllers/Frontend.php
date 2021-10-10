<?php
defined('BASEPATH') OR exit;

class Frontend extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->library('authz');
    }

    public function index() {
        redirect('frontend/map');
    }

    public function auth() {
        $this->authz->logout_assert();

        $this->load->view('header', ['title' => 'Virtual Tour Login']);
        $this->load->view('frontend/auth');
        $this->load->view('footer');
    }

    public function sso_auth() {
        $this->authz->logout_assert();

        if (!empty($this->input->get('token'))) {
            $token = base64_decode($this->input->get('token'));
            $token = explode(':', $token);
            if (hash_hmac('sha256', $token[0], TOUR_SSO_APP_KEY) === $token[1]) {
                $token[0] = base64_decode($token[0]);
                $token[0] = json_decode($token[0], TRUE);
                if (time() < $token[0]['expired']) {
                    if (empty($token[0]['disallow'])) {
                        $this->authz->authorize($token[0]['user_id'], $token[0]['name']);
                        redirect('frontend/map');
                    } else {
                        die('Not allowed to login to this site');
                    }
                } else {
                    die('Invalid SSO token');
                }
            } else {
                die('Invalid SSO token');
            }
        } else {
            $sso = [];
            $sso['app_id'] = TOUR_SSO_APP_ID;
            $sso['timestamp'] = time();
            $sso['redirect_url'] = site_url(uri_string());
            $sso['redirect_param'] = 'token';
            $sso = base64_encode(json_encode($sso));
            $signature = hash_hmac('sha256', $sso, TOUR_SSO_APP_KEY);
            $token = base64_encode($sso.':'.$signature);
            $sso_url = TOUR_SSO_URL.'?sso='.urlencode($token);
            redirect($sso_url);
        }
    }

    public function logout() {
        $this->authz->unauthorize();
        redirect('frontend/auth');
    }

    public function map() {
        $this->authz->login_assert();

        $this->load->model('settings_model', 'settings');
        if (empty($this->settings->get('access_enable'))) {
            die('Access is currently disabled at this time');
        }

        $this->load->model('places_model', 'places');

        $places = $this->places->list_places();

        $this->load->view('header', ['title' => 'Virtual Tour Map']);
        $this->load->view('frontend/map', ['places' => $places]);
        $this->load->view('footer');
    }
}

