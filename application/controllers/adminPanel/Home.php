<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    protected $table = 'admins';
    protected $profile = [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'mobile',
            'label' => 'Mobile No.',
            'rules' => 'required|numeric|exact_length[10]|callback_mobile_check',
            'errors' => [
                'required' => "%s is Required",
                'numeric' => "%s is Invalid",
                'exact_length' => "%s is Invalid",
            ]
        ],
        [
            'field' => 'email',
            'label' => 'Employee E-Mail',
            'rules' => 'required|callback_email_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];

    public function mobile_check($str)
    {   
        if ($this->main->check($this->table, ['mobile' => $str, 'id != ' => $this->id], 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else{
            return TRUE;
        }
    }

    public function email_check($str)
    {   
        if ($this->main->check($this->table, ['email' => $str, 'id != ' => $this->id], 'id'))
        {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
            return FALSE;
        } else{
            return TRUE;
        }
    }

    public function index()
    {
        $data['title'] = 'dashboard';
        $data['name'] = 'dashboard';
        /*$cats = $this->main->getall('blog_category', 'id, cat_name, cat_slug', ['is_deleted' => 0]);
        foreach ($cats as $key => $v) {
            $post['cat_slug'] = str_replace(" ", "-", strtolower($v['cat_name']));
            $this->main->update(['id' => $v['id']], $post, 'blog_category');
        }
        re($cats);*/
        return $this->template->load(admin('template'), admin('dashboard'), $data);
    }

    public function profile()
    {
        $data['title'] = 'profile';
        $data['name'] = 'dashboard';

        $this->form_validation->set_rules($this->profile);
        if ($this->form_validation->run() == FALSE)
        {
            return $this->template->load(admin('template'), admin('profile'), $data);
        }
        else
        {
            $post = [
                'name'   => $this->input->post('name'),
                'email'  => $this->input->post('email'),
                'mobile' => $this->input->post('mobile')
            ];

            $id = $this->main->update(['id' => $this->id], $post, $this->table);

            if ($id) {
                $user = $this->main->get($this->table, 'id adminId, name, mobile, email', ['id' => $this->id]);
                $this->session->set_userdata($user);
            }

            flashMsg($id, "Profile Updated Successfully.", "Profile Not Updated. Try again.", admin('profile'));
        }
    }

    public function changePassword()
    {
        $data['title'] = 'profile';
        $data['name'] = 'dashboard';

        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => "%s is Required"]);
        if ($this->form_validation->run() == FALSE)
        {
            return $this->template->load(admin('template'), admin('profile'), $data);
        }
        else
        {
            $post = [
                'password'   => my_crypt($this->input->post('password'))
            ];

            $id = $this->main->update(['id' => $this->id], $post, $this->table);

            flashMsg($id, "Password Changed Successfully.", "Password Not Changed. Try again.", admin('profile'));
        }
    }

    public function upload()
    {
        $this->load->helper('string');
        $config = [
            'upload_path'      => "./assets/images/",
            'allowed_types'    => 'jpg|jpeg|png',
            'file_name'        => random_string('nozero', 5),
            'file_ext_tolower' => TRUE
        ];

        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload("image")) { 
            $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
            return redirect(admin());
        }else{
            $unlink = $this->input->post('unlink');
            
            if ($unlink && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $image = $this->upload->data("file_name");
            $this->main->update(['id' => 1], ['advertisement' => $image], 'advertisements');

            return redirect(admin());
        }
    }

    public function backup()
    {
        // Load the DB utility class
        $this->load->dbutil();
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download(APP_NAME.'.zip', $backup);
        return redirect(admin());
    }
    
    public function push()
    {
        define('SERVER_API_KEY', 'AAAARbXajGc:APA91bF8k-TsA-qD7tWJiJz-Xm5Md1RR4jpfzSqCk_XClJV_C1MVVx-qfI6epXLlBkVCIoUX35phjFBCNuJQKcL2Tef899D3JitBU9wiab7nqhk_BVy9lm_3BbpR8bcmyFxe-1yizBCY');

        $tokens = $this->main->getall('tokens', 'token', ['is_deleted' => 0]);
        
        foreach ($tokens as $token) {
            $registrationIds[] = $token['token'];
        }

        $header = [
            'Authorization: Key='.SERVER_API_KEY,
            'Content-Type: Application/json'
        ];

        $msg = [
            'title' => 'Gujarat Ni Amirat',
            'body'  => 'Gujarat Ni Amirat',
            'icon'  => base_url('assets/images/favicon.png'),
            'url'   => base_url()
        ];

        $payload = [
            'registration_ids'  => $registrationIds,
            'data'              => $msg
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode( $payload ),
        CURLOPT_HTTPHEADER => $header
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        
        if ($err) 
            flashMsg(0, "Notification Sent.", "Notification Not Sent.", admin());
            /*echo "cURL Error #:" . $err;*/
        else
            flashMsg(1, "Notification Sent.", "Notification Not Sent.", admin()); 
            /*echo $response.'<br>';*/
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(admin('login'));
    }
}