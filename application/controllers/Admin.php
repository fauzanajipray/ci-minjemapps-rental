<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function session_login(){
        if(!$_SESSION['email']){
            redirect('auth');
        }else{
           if($_SESSION['role_id'] == 2){
               redirect('user');
           }
        }
    }

    public function index(){

        $this->session_login();

        $data['title'] = "Admin | Minjem Apps";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['count_car'] = $this->db->query("SELECT COUNT(*) AS jml FROM car")->result();
        $data['count_user'] = $this->db->query("SELECT COUNT(*) AS jml FROM user")->result();
        $data['count_city'] = $this->db->query("SELECT COUNT(*) AS jml FROM province")->result();
        $data['count_location'] = $this->db->query("SELECT COUNT(*) AS jml FROM locations")->result();
        
        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/admin_footer');
    }

    public function myprofile(){
        $this->session_login();

        $data['title'] = "MyProfile | Minjem Dashboard";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/my_profile',$data);
        $this->load->view('templates/admin_footer');

    }

    public function edit(){
        $this->session_login();

        $data['title'] = "MyProfile | Minjem Dashboard";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/admin_header',$data);
            $this->load->view('admin/edit',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $old_image = $data['user']['image'];
            $uploud_image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            if($uploud_image){

                // tentukan lokasi file akan dipindahkan
                $dirUpload = "./assets/img/profile/";
                // pindahkan file
                $terupload = move_uploaded_file($tmp_name, $dirUpload.$uploud_image);
                if($terupload){
                    if($old_image != 'myprofile.jpg'){
                        unlink(FCPATH .'assets/img/profile/'. $old_image);
                    }
                    $this->db->set('image',$uploud_image);
                }else{
                    echo "Gagal Uploud";
                    die;
                }
            }

            $this->db->set('name',$name);
            $this->db->where('email',$email);
            $this->db->update('user');

            $this->session->set_flashdata('message','<div class="alert 
            alert-success" role="alert">
            Your profile has been edited!
            </div>');
            redirect('admin/myprofile');
        }
    }

    public function user(){

        $this->session_login();

        $data['title'] = "Users | Minjem Apps";
        $data['subtitle'] = "Users";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['users'] = $this->db->query("SELECT * FROM user WHERE role_id!='".$data['user']['role_id']."'")->result();
        
        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/master/user',$data);
        $this->load->view('templates/admin_footer');
    }

    public function delete_user($id){
        $this->session_login();
        $name = $this->db->query("SELECT name From user where id='".$id."'")->row_array();
        
        $this->db->query("DELETE FROM user where id='".$id."'");
        $this->session->set_flashdata('message','<div class="alert 
            alert-success" role="alert">
            User '.$name['name'].' has been deleted!
            </div>');
        redirect('admin/user');
    }

    public function car(){

        $this->session_login();

        $data['title'] = "Cars | Minjem Apps";
        $data['subtitle'] = "Cars";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $data['car'] = $this->db->query("SELECT * FROM car")->result();
        
        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/master/car',$data);
        $this->load->view('templates/admin_footer');
    }

    public function city(){

        $this->session_login();

        $data['title'] = "City | Minjem Apps";
        $data['subtitle'] = "City";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['city'] = $this->db->query("SELECT * FROM province")->result();

        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/master/city',$data);
        $this->load->view('templates/admin_footer');
    }

    public function location(){

        $this->session_login();

        $data['title'] = "Location | Minjem Apps";
        $data['subtitle'] = "Location";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['locations'] = $this->db->query("SELECT * FROM locations")->result();

        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/master/location',$data);
        $this->load->view('templates/admin_footer');
    }

    public function order_trs(){

        $this->session_login();

        $data['title'] = "Order Transaction | Minjem Apps";
        $data['subtitle'] = "Order Transaction";
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['order_trs'] = $this->db->query("SELECT * FROM order_transaction")->result();

        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/master/order_trs',$data);
        $this->load->view('templates/admin_footer');
    }

    public function delete_order_trs($id){
        $this->session_login();
        $email = $this->db->query("SELECT email From user where id='".$id."'")->row_array();
        
        $car = $this->db->query("SELECT idcar From order_transaction where id='".$id."'")->row_array();
        
        $this->db->query("UPDATE car SET status=0 WHERE idcar='".$car['idcar']."'");
   
        $this->db->query("DELETE FROM order_transaction where id='".$id."'");
        
        $this->session->set_flashdata('message','<div class="alert 
            alert-success" role="alert">
            Transaction '.$email['email'].' has been deleted!
            </div>');
        redirect('admin/order_trs');
    }

}