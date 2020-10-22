<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();// you have missed this line.
        //$this->load->library('uploud');
    }  
    
    public function session_login(){
        if(!$_SESSION['email']){
            redirect('auth');
        }else{
           if($_SESSION['role_id'] == 1){
               redirect('admin');
           }
        }
    }

    public function index(){
        $this->session_login();
        $data['title'] = "Minjem Apps";

        $this->form_validation->set_rules('datepick','Date Picker',array('regex_match[/^((0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d)$/]'));
        $this->form_validation->set_rules('datedrop','Date Drop Off',array('regex_match[/^((0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d)$/]'));
        
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['province'] = $this->db->query('SELECT * FROM province')->result();
        // $q= $this->db->query('SELECT * FROM locations LIMIT 1')->result();
        // print_r($q);
        // echo $q[0]->location_name;
        if($this->form_validation->run() == false){
            
            $this->load->view('templates/header',$data);
            $this->load->view('user/index',$data);
            $this->load->view('templates/footer');
            
        }else{
            print_r($_POST);
            $data =[
                'type' => $_POST['type'],
                'city' => $_POST['city'],
                'datepick' => $_POST['datepick'],
                'datedrop' => $_POST['datedrop'],
                'pick_up' => $_POST['pick_up'],
                'drop_off' => $_POST['drop_off']

            ];
            $this->session->set_userdata($data);
            redirect('user/show_vehicle');
        }
    }

    public function get_location(){
        $id_province = $this->input->post('id',TRUE);
        $data = $this->db->query("SELECT * FROM locations Where id_province='$id_province'")->result();
        if($data){
            echo json_encode($data);
        }else{
            return "0";
        }
        
    }

    public function show_vehicle(){
        $this->session_login();
        if(!($_SESSION['type'] && $_SESSION['city'])){
            redirect('user');
        }
        
        $city = $this->session->userdata('city');

        $data['title'] = "Minjem Apps";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['car'] = $this->db->query("SELECT * FROM car Where status=0 And city='".$city."'")->result();
        $data['city'] = $this->db->query("SELECT * FROM province Where id='".$city."' LIMIT 1")->result();
        
        if(!$data['car']){
            $data['car'] = "0";
        }
        $this->load->view('templates/header',$data);
        $this->load->view('user/show_vehicle',$data);
        $this->load->view('templates/footer');
    }

    public function rent_confirm($id){
        $this->session_login();

        $this->form_validation->set_rules('datepick','Date Picker',array('regex_match[/^((0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d)$/]'));
        $this->form_validation->set_rules('datedrop','Date Drop Off',array('regex_match[/^((0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d)$/]'));

        $data['title'] = "Rental Confirmation | Minjem Apps";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();
        
        //SESSION DATA USER
        //$
        $city = $this->session->userdata('city');
        $pickup = $this->session->userdata('pick_up');
        $dropoff = $this->session->userdata('drop_off');
        
        $data['book_data'] = [
            'city' => $this->session->userdata('city'),
            'datepick' => $this->session->userdata('datepick'),
            'datedrop' => $this->session->userdata('datedrop'),
            'pickup' => $this->session->userdata('pick_up'),
            'dropoff' => $this->session->userdata('drop_off')
        ];
        $data['car'] = $this->db->query("SELECT * FROM car Where idcar=".$id."")->result();
        $data['city'] = $this->db->query("SELECT * FROM province Where id='".$city."' LIMIT 1")->result();
        $data['pickup_loc'] = $this->db->query("SELECT * FROM locations Where id='".$pickup."' ")->result();
        $data['dropoff_loc'] = $this->db->query("SELECT * FROM locations Where id='".$dropoff."' ")->result();
        $data['locations1'] = $this->db->query("SELECT * FROM locations Where id_province='".$city."' AND id!='".$pickup."' ")->result();
        $data['locations2'] = $this->db->query("SELECT * FROM locations Where id_province='".$city."' AND id!='".$dropoff."' ")->result();
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('user/rent_confirm',$data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'email_user' => $this->input->post('email',true),
                'idcar' => $this->input->post('idcar',true),
                'car_name' => $this->input->post('car_name',true),
                'city_id' => $this->input->post('city_id',true),
                'city' => $this->input->post('city',true),
                'location_pick' => $this->input->post('pick_up',true),
                'location_drop' => $this->input->post('drop_off',true),
                'datepick' => $this->input->post('datepick',true),
                'datedrop' => $this->input->post('datedrop',true),
                'total_paying' => $this->input->post('total',true),
                'status_pay' => 0,
                'status_rent' => 1
            ];
            $this->db->insert('order_transaction',$data);
            
            $idcarupdate = $_POST['idcar'];
            $this->db->query("UPDATE car SET status=1 WHERE idcar='".$idcarupdate."'");

            $this->session->set_flashdata('message','<div class="alert 
            alert-success" role="alert">
            Congratulation! Your car successfully booked, Wait for us to confirm :)
            </div>');

            redirect('user');
        }
    }

    public function myrent(){
        $this->session_login();

        $data['title'] = "MyRent | Minjem Dashboard";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();
        $data['myrent'] = $this->db->query("SELECT * FROM order_transaction Where email_user='".$data['user']['email']."'")->result();
        
        $data['car'] = $this->db->query("SELECT * FROM car,order_transaction o Where car.idcar=o.idcar AND o.email_user='".$data['user']['email']."'")->result();
        
        $this->load->view('templates/header',$data);
        $this->load->view('user/my_rent',$data);
        $this->load->view('templates/footer');

    }

    public function myprofile(){
        $this->session_login();

        $data['title'] = "MyProfile | Minjem Dashboard";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('user/my_profile',$data);
        $this->load->view('templates/footer');

    }

    public function edit(){
        $this->session_login();

        $data['title'] = "MyProfile | Minjem Dashboard";
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('user/edit',$data);
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
            redirect('user/myprofile');
        }
    }
}
