<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ((!empty($this->session->adminId))) 
        	return redirect(admin());
    }

    protected $table = 'admins';
    protected $login = [
        [
            'field' => 'mobile',
            'label' => 'Mobile No.',
            'rules' => 'required|numeric|exact_length[10]',
            'errors' => [
                'required' => "%s is Required",
                'numeric' => "%s is Invalid",
                'exact_length' => "%s is Invalid",
            ],
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ],
        ]
    ];
	
	public function index()
    {
    	$data['title'] = 'login';
    	$this->form_validation->set_rules($this->login);
    	if ($this->form_validation->run() == FALSE) {
    		return $this->template->load(admin('auth/template'), admin('auth/login'), $data);	
    	}else{
    		$post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'password'   => my_crypt($this->input->post('password'))
    		];

    		$user = $this->main->get($this->table, 'id adminId, name, mobile, email', $post);
    		if ($user) {
    			$this->session->set_userdata($user);
    			return redirect(admin());
    		}else{
    			$this->session->set_flashdata('error', 'Invalid credentials or account blocked.');
    			return redirect(admin('login'));
    		}
    	}
    }

    public function forgotPassword()
    {
        $data['title'] = 'forgotPassword';
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => "%s is Required"]);
        if ($this->form_validation->run() == FALSE) {
            return $this->template->load(admin('auth/template'), admin('auth/send_otp'), $data);   
        }else{
            $post = [
                'email'     => $this->input->post('email')
            ];

            $user = $this->main->get($this->table, 'email', $post);
            
            if ($user) {
                $otp = rand(100000, 999999);
                $this->main->update($user, ['otp' => $otp], $this->table);
                $this->load->library('email');
                $message = "Yor OTP for password reset - ".$otp;

                $this->email->clear(TRUE);
                $this->email->set_newline("\r\n");
                $this->email->from('info@gujaratniamirat.com');
                $this->email->to($user['email']);
                $this->email->subject('Yor OTP for password reset.');
                $this->email->message($message);
                if ($this->email->send()) {
                    $this->session->set_flashdata('success', 'OTP Sent Successfull to your email address.');
                    $this->session->set_flashdata('emailCheck', $user['email']);
                    
                    return redirect(admin('checkOtp'));
                }else{
                    $this->session->set_flashdata('error', 'OTP not sent. Please try again.');
                    return redirect(admin('forgotPassword'));
                }
                
            }else{
                $this->session->set_flashdata('error', 'Email not registered or account blocked.');
                return redirect(admin('forgotPassword'));
            }
        }
    }

    public function checkOtp()
    {
        if (empty($this->session->emailCheck)) return redirect (admin('login'));
        $this->session->set_flashdata('emailCheck', $this->session->emailCheck);

        $data['title'] = 'check OTP';
        $this->form_validation->set_rules('otp', 'OTP', 'required', ['required' => "%s is Required"]);
        if ($this->form_validation->run() == FALSE) {
            return $this->template->load(admin('auth/template'), admin('auth/check_otp'), $data);   
        }else{
            $post = [
                'email'     => $this->session->emailCheck,
                'otp' => $this->input->post('otp')
            ];

            $user = $this->main->get($this->table, 'id adminId, name, mobile, email', $post);
            
            if ($user) {
                $this->session->set_userdata($user);
                return redirect(admin('changePassword'));
            }else{
                $this->session->set_flashdata('error', 'OTP not match. Please try again.');
                return redirect(admin('checkOtp'));
            }
        }
    }
}