<?php

namespace App\Controllers;

use App\Libraries\Controller;

class Admin extends Controller
{
    // public function index()
    // {
    //     echo 'in Admin';
    // }
    public function signup()
    {
        $this->view('sign/signup');
    }
    public function signin()
    {
        $this->view('sign/signin');
    }
    public function user_signup()
    {
        $postdata = $_POST ?? array() ;
        if (isset($postdata['username']) && isset($postdata['email']) && isset($postdata['pass']) && isset($postdata['re_pass'])) {
            $users = $this->model('User') ;
            $users->username = $postdata['username'] ;
            $users->email = $postdata['email'] ;
            $users->pass = $postdata['pass'] ;
            $users->re_pass = $postdata['re_pass'] ;
            $users->save();
            
        }
        $data['users'] = $this->model('User')::all() ;
    
        // print_r($data);
        
        $this->view('sign/signin');
    }
    public function user_login() {
        $postdata = $_POST ?? array() ;
        $email = $postdata['email'] ;
        if (isset($postdata['email']) && isset($postdata['pass'])) {
             $data['users'] = $this->model('User')::find(array('email'=>$email));
            //  print_r($data['users']->email);
            if (sizeof($data['users']) == 0) {
                $err = "please signup first !!" ;
                $this->view('sign/signin', $err);

        }   elseif($data['users']->role == 'admin') {
            $this->view('sign/dashboard');
            
        }
        }
    }
}
