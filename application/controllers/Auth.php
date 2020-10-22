<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('security'); 
    }

	public function index()
	{
        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');

        $data['title'] = 'Minjem Login';
        if($this->form_validation->run() == false){
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
            $this->_login();
        }
    }
    public function reset()
	{
        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');

        $data['title'] = 'Minjem Login';
        if($this->form_validation->run() == false){
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/reset');
            $this->load->view('templates/auth_footer');
        }else{
            $this->_login();
        }
    }
    
    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email'=> $email])->row_array();
        print_r($user);
        
        if($user){
            if($user['is_active'] == 1){
                //cek password
                if(password_verify($password, $user['password'])){
                    $data =[
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($data['role_id'] == 2){
                        redirect('user');
                    }else{
                        redirect('admin');
                    }
                }else{
                    $this->session->set_flashdata('message','<div class="alert 
                    alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert 
                alert-danger" role="alert">This email has not activeted!</div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert 
            alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration(){
        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('no_telp','No. Telephon','required|trim|integer|is_unique[user.no_telp]');
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',[
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2','Password2','required|trim|matches[password1]');


        if($this->form_validation->run() == false){
            $data['title'] = 'Minjem User Registration';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer'); 
        }else{
            //print_r($_POST);
            $code_r = $_POST['code_region'];
            $no_telp = $_POST['no_telp'];
            if(substr(trim($no_telp), 0, 1)=='0'){
                $telp = $code_r.substr(trim($no_telp), 1);
            }
            
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'no_telp' => $telp,
                'image' => 'myprofile.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user',$data);

            $this->session->set_flashdata('message','<div class="alert 
            alert-success" role="alert">
            Congratulation! your account has been created. Please Login
            </div>');
            redirect('user');
        }
    }

    private function _sendEmail(){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'bepoapo123@gmail.com',
            'smtp_pass' => 'ajipajip123',
            'smtp_port'  => '465',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"            
        ];
        $this->load->library('email', $config);

        $this->email->from('bepoapo123@gmail.com', 'Minjem App');
        $this->email->to('fauzanjr1@gmail.com');
        $this->email->subject('Testing');
        $this->email->message('Hello World!');
        
        if($this->email->send()){
            return true;
        }else{
            echo "eror gaes";
            echo $this->email->print_debugger();
            die;
        }
    }


    public function logout(){
        unset(
            $_SESSION['email'],
            $_SESSION['role_data'],
            $_SESSION['type'],
            $_SESSION['city'],
            $_SESSION['type'],
            $_SESSION['datepick'],
            $_SESSION['datedrop'],
            $_SESSION['pick_up'],
            $_SESSION['drop_off']
        );
        $this->session->set_flashdata('message','<div class="alert 
            alert-success" role="alert">
            You have been logged out!</div>');
        redirect('auth');
    }

}