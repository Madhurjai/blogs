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
    public function dash() {
        $this->view('sign/dashboard');
    }
    public function user_login()
    {   
        $postdata = $_POST ?? array() ;
        if (isset($postdata['email']) && isset($postdata['pass'])) {
            $email = $postdata['email'] ;
            $pass = $postdata['pass'] ;
             $data['users'] = $this->model('User')::all() ;
             $data['user'] = $this->model('User')::find(array('email'=>$email ,'pass'=> $pass));
             $_SESSION['user'] = $data['user']->email ;
             
            //  print_r(count($data['user']));
            if ($data['user']->email != $email and $data['user']->pass != $pass) {
                $data['err'] = "please signup first !!" ;
                // print_r($err);
                $this->view('sign/signin', $data);
        }   elseif ($data['user']->role == 'admin') {
                // print_r($data['users']);
                
                $this->view('sign/dashboard', $data);
            
        } elseif ($data['user']->status == 'restrict') {
            $data['res'] = "your account is restricted !!" ;
                // print_r($err);
                $this->view('sign/signin', $data);
        } else {
            // session_start();
            $data['blogs'] = $this->model('Blog')::all() ;
            // print_r($data['blogs']);
            // $_SESSION['user'] = $data['user']->email ;
            $this->view('home', $data);
        } 
       
    }

        
    }
    public function home() {
        $data['blogs'] = $this->model('Blog')::all() ;
        // print_r($data['blogs']);
        // $_SESSION['user'] = $data['user']->email ;
        $this->view('home', $data);
    }
    public function status_change() {
             $email = $_POST['email'];
            //  print_r($email);
        //   $para = func_get_args();
        $users = $this->model('User')::find(array('email'=>$email)) ;
        if ($users->status == 'approved') {
            $users->status = 'restrict' ;
            // print_r($users->status) ;
            $users->save();
          

        } else {
            $users->status = 'approved' ;
            // print_r($users->status) ;
            $users->save();
        }
        
        $data['users'] = $this->model('User')::all() ;
        $data['count'] = $this->model('User')::count() ;

        $this->view('sign/dashboard', $data);

    }
    public function count() {
        $data['users'] = $this->model('User')::all()  ;
        $data['count'] = $this->model('User')::count() ;
        $this->view('sign/dashboard', $data);
    }
    public function del_user() {
        if (isset($_GET['email'])) {
            $user = $this->model('User')::find(array('email'=>$_GET['email'])) ;
            $user->delete() ;
            $this->count();
        }
    }
    public function blogs() {
        $this->total_blogs();

    }
    public function add_blog() {
        $this->view('blogs/add-product');

    }
    public function post_blog() {
        $postdata = $_POST ?? array() ;
        // print_r($postdata);
        $blog = $this->model('Blog') ;
        if (isset($postdata['submit'])) {
            // print_r($blog);
            // print_r($_FILES);
            $blog->blog_category = $postdata['category'] ;
            $blog->blog_title = $postdata['title'] ;
            $blog->blog_desc = $postdata['product_desc'] ;
            // print_r($blog);
            // print_r($_SESSION['user']);
            $blog->email = $_SESSION['user'] ;
            // $blog->image = "awfasf";
            // $src = $_FILES["image"]["tmp_name"];
            // $destination = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
            // // print_r($destination);
            // if (move_uploaded_file($src, "../../upload_image/" . $destination)) {
            //     $blog->image = $destination ;
                // header("location: products.php");
            }  if (isset($postdata['update'])) {
                $blog = $this->model('Blog')::find(array('blog_id'=>$postdata['blog_id'] ));
                // print_r($update) ;
                $blog->blog_category = $postdata['category'] ;
                $blog->blog_title = $postdata['title'] ;
                $blog->blog_desc = $postdata['product_desc'] ;
            }

             $blog->save() ;
            //  print_r($blog) ;
        // $data['blogs'] = $this->model('Blog')::all() ;
        $this->total_blogs();
        
    }
    public function total_blogs() {
        $data['blogs'] = $this->model('Blog')::all() ;
        $this->view('blogs/products', $data);
        // return $data ;
    }
    public function user_blogs() {
        $_SESSION['user_blog'] = $this->model('Blog')::find('all', array('email'=>$_SESSION['user'])) ;
        // print_r($data['user_blog']);
        $this->view('user_blog/display_user_blog');
        // return $data ;
    }
    public function del_blog() {
        if (isset($_GET['id'])) {
            print_r($_GET['id']);
            $id = $_GET['id'] ;
            $del = $this->model('Blog')::find(array('blog_id'=>$id));
            $del->delete() ;
            $this->total_blogs();

        }
    }
    public function user_del_blog() {
        if (isset($_GET['id'])) {
            print_r($_GET['id']);
            $id = $_GET['id'] ;
            $del = $this->model('Blog')::find(array('blog_id'=>$id));
            $del->delete() ;
            $this->user_blogs();

        }
    }
    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'] ;
            $data['edit_data'] = $this->model('Blog')::find(array('blog_id'=>$id));
            // print_r($data['edit_data']) ;
            $this->view('blogs/add-product', $data);
        }
    }
    public function user_edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'] ;
            $data['edit_data'] = $this->model('Blog')::find(array('blog_id'=>$id));
            // print_r($data['edit_data']) ;
            $this->view('user_blog/user_add_blog', $data);
        }
    }
    public function search() {
        if (isset($_POST['submit'])) {
            $search = $_POST['search'] ;
            $data['blogs'] = $this->model('Blog')::all(array('blog_id'=>$search));
            // print_r($data['blogs']);
            if (count($data['blogs']) >0) {
                $this->view('blogs/products', $data);
            } else {
                $data['err'] = "data not found !!" ;
                $this->total_blogs();
            }
        }
    }
    public function search_user_blog() {
        if (isset($_POST['submit'])) {
            $search = $_POST['search'] ;
            $_SESSION['user_blog'] =  $this->model('Blog')::all(array('blog_id'=>$search , 'email'=>$_SESSION['user']));
            // print_r($data['blogs']);
            if (count($_SESSION['user_blog']) >0) {
                $this->view('user_blog/display_user_blog');
            } else {
                $data['err'] = "data not found !!" ;
                $this->user_blogs();
            }
        }
    }

    public function signout() {
        $data['ses'] = "logout !!" ;
        $this->view('sign/signin', $data);
        // session_destroy();
    }
    public function add_user_blog() {
        $this->view('user_blog/user_add_blog');
    }
    public function post_user_blog() {
        $postdata = $_POST ?? array() ;
        // print_r($postdata);
        $blog = $this->model('Blog') ;
        if (isset($postdata['submit'])) {
            // print_r($blog);
            // print_r($_FILES);
            $blog->blog_category = $postdata['category'] ;
            $blog->blog_title = $postdata['title'] ;
            $blog->blog_desc = $postdata['product_desc'] ;
            $blog->email = $_SESSION['user'] ;
            // $blog->image = "awfasf";
            // $src = $_FILES["image"]["tmp_name"];
            // $destination = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
            // // print_r($destination);
            // if (move_uploaded_file($src, "../../upload_image/" . $destination)) {
            //     $blog->image = $destination ;
                // header("location: products.php");
            }  if (isset($postdata['update'])) {
                $blog = $this->model('Blog')::find(array('blog_id'=>$postdata['blog_id'] ));
                // print_r($update) ;
                $blog->blog_category = $postdata['category'] ;
                $blog->blog_title = $postdata['title'] ;
                $blog->blog_desc = $postdata['product_desc'] ;
                $blog->email = $_SESSION['user'] ;
            }

             $blog->save() ;
            //  print_r($blog) ;
        // $data['blogs'] = $this->model('Blog')::all() ;
        $this->user_blogs();
        
    }
}
