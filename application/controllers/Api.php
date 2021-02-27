<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('api');
        $this->load->model('ApiModel', 'api');
        // mobile();
    }

    private $table = 'employee';

    public function login()
    {
        post();
        verifyRequiredParams(['mobile', 'password']);
        
        $post = ['mobile' => $this->input->post('mobile'), 'password' => my_crypt($this->input->post('password'))];

        if($row = $this->main->get($this->table, 'id, fullname, mobile, email, CONCAT("'.assets('images/employee/').'", image) image, designation, team_leader, address', $post))
        {
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="Login Successfull.";
            echoRespnse(200, $response);
        } 
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Login Not Successfull!";
            echoRespnse(400, $response);
        }
    }

    public function profile()
    {
        get();
        $api = authenticate($this->table);

        if($row = $this->main->get($this->table, 'id, fullname, mobile, email, CONCAT("'.assets('images/employee/').'", image) image, designation, team_leader, address', ['id' => $api]))
        {
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="Profile Successfull.";
            echoRespnse(200, $response);
        } 
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Profile Not Successfull!";
            echoRespnse(400, $response);
        }
    }

    public function updateProfile()
    {
        post();
        $api = authenticate($this->table);
        verifyRequiredParams(['fullname', 'designation', 'team_leader', 'address', 'mobile', 'email']);
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        
        if ($this->main->check($this->table, ['id != ' => $api, 'mobile' => $mobile], 'id')) {
            $response["error"] = TRUE;
            $response['message'] = "Mobile Already Registered.";
            echoRespnse(400, $response);
        }

        if ($this->main->check($this->table, ['id != ' => $api, 'email' => $email], 'id')) {
            $response["error"] = TRUE;
            $response['message'] = "Email Already Registered.";
            echoRespnse(400, $response);
        }

        $unlink = $this->main->check($this->table, ['id' => $api], 'image');

        $post = [
                'fullname'    => $this->input->post('fullname'),
                'email'       => $this->input->post('email'),
                'image'       => $this->uploadImage($unlink),
                'designation' => $this->input->post('designation'),
                'team_leader' => $this->input->post('team_leader'),
                'address'     => $this->input->post('address'),
                'mobile'      => $this->input->post('mobile')
            ];

        if (!empty($this->input->post('password'))) 
            $post['password'] = my_crypt($this->input->post('password'));

        if($row = $this->main->update(['id' => $api], $post, $this->table))
        {
            $response['error'] = FALSE;
            $response['message'] ="Profile Updated Successfully.";
            echoRespnse(200, $response);
        } 
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Profile Not Updated.";
            echoRespnse(400, $response);
        }
    }

    public function stocks()
    {
        get();
        $api = authenticate($this->table);
        verifyRequiredParams(['length', 'start']);
        if($row = $this->api->stocks())
        {
            $response['row'] = $row;
            $response['error'] = FALSE;
            $response['message'] ="Stocks List Successfull.";
            echoRespnse(200, $response);
        } 
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Stocks List Not Successfull!";
            echoRespnse(400, $response);
        }
    }

    public function changeStatus()
    {
        post();
        $api = authenticate($this->table);
        verifyRequiredParams(['id', 'status']);
        $post = [
            'status'  => $this->input->post('status'),
            'hold_at' => date('Y-m-d H:i:s'),
            'hold_by' => $api   
        ];
        if($row = $this->main->update(['id' => $this->input->post('id')], $post, 'stocks'))
        {
            $response['error'] = FALSE;
            $response['message'] ="Stock Status Changed Successfully.";
            echoRespnse(200, $response);
        } 
        else 
        {
            $response["error"] = TRUE;
            $response['message'] = "Stock Status Not Changed.";
            echoRespnse(400, $response);
        }
    }

    protected function uploadImage($unlink='')
    {
        if (!empty($_FILES['image']['name'])) {
            $config = [
                'upload_path'      => "./assets/images/employee/",
                'allowed_types'    => 'jpg|jpeg|png',
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];

            if ($unlink && ($unlink != 'starline.png') && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $this->upload->initialize($config);
            if ($this->upload->do_upload("image")) 
                return $this->upload->data("file_name");
            else
                return 'starline.png';
        }else {
            if ($unlink) 
                return $unlink;
            else 
                return 'starline.png';
        }
    }
}