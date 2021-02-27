<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("blog");
        $this->config->set_item('global_xss_filtering', false);
	}

	private $name = 'blog';
    private $title = 'blog';
    private $table = "blog";

	protected $validate = [
        [
            'field' => 'cat_id',
            'label' => 'Category',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'title',
            'label' => 'Blog Title',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'sub_title',
            'label' => 'Blog sub title',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'created_by',
            'label' => 'Blog written by',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'blog_slug',
            'label' => 'Blog URL',
            'rules' => 'required|callback_slug_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'details',
            'label' => 'Blog details',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];

    public function slug_check($str)
    {   

        $id = $this->session->updateId;
        
        if ((!empty($id) && $this->main->check($this->table, ['blog_slug' => $str, 'id != ' => d_id($id)], 'id')) || (empty($id) && $this->main->check($this->table, ['blog_slug' => $str], 'id')))
        {
            $this->form_validation->set_message('slug_check', 'The %s is already in use');
            return FALSE;
        } else{
            return TRUE;
        }
    }

	public function index()
	{
		$data['name'] = $this->name;
		$data['title'] = $this->title;
        $data['url'] = $this->redirect;
        $data['dataTables'] = TRUE;

        $this->template->load(admin('template'), $this->redirect.'/home', $data);
	}

	public function get()
    {
        $fetch_data = $this->main->make_datatables('blog_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->title;
            $sub_array[] = $row->cat_name;

            $sub_array[] = '<div class="ml-0 table-display row">'.anchor($this->redirect.'/view/'.e_id($row->id), '<i class="fa fa-eye"></i>', 'class="btn btn-outline-info mr-2"').anchor($this->redirect.'/update/'.e_id($row->id), '<i class="fa fa-edit"></i>', 'class="btn btn-outline-primary mr-2"').
                    form_open($this->redirect.'/delete', ['id' => e_id($row->id)], ['id' => e_id($row->id)]).form_button([ 'content' => '<i class="fas fa-trash"></i>','type'  => 'button','class' => 'btn btn-outline-danger', 'onclick' => "remove(".e_id($row->id).")"]).form_close().'</div>';

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();  

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, ['is_deleted' => 0]),
            "recordsFiltered"   => $this->main->get_filtered_data('blog_model'),
            "data"              => $data,
            $csrf_name          => $csrf_hash
        );
        
        echo json_encode($output);
    }

    public function add()
	{
		$this->form_validation->set_rules($this->validate);
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = $this->name;
            $data['title'] = $this->title;
            $data['operation'] = "add";
            $data['select'] = TRUE;
            $data['url'] = $this->redirect;
            $data['cats'] = $this->main->getall('blog_category', 'id, cat_name, cat_slug', ['is_deleted' => 0]);
            return $this->template->load(admin('template'), $this->redirect.'/add', $data);
        }
        else
        {
        	$post = [
        		'cat_id'        => $this->input->post('cat_id'),
                'title'         => $this->input->post('title'),
                'sub_title'     => $this->input->post('sub_title'),
                'created_by'    => $this->input->post('created_by'),
                'blog_slug'     => str_replace(" ", "-", strtolower($this->input->post('blog_slug'))),
                'details'       => $this->input->post('details'),
                'facebook_url'  => (!empty($this->input->post('facebook_url'))) ? $this->input->post('facebook_url') : '',
                'whatsapp_url'  => (!empty($this->input->post('whatsapp_url'))) ? $this->input->post('whatsapp_url') : '',
                'insta_url'     => (!empty($this->input->post('insta_url'))) ? $this->input->post('insta_url') : '',
                'tweeter_url'   => (!empty($this->input->post('tweeter_url'))) ? $this->input->post('tweeter_url') : '',
                'created_at'    => date('Y-m-d H:i:s'),
                'blogger_image' => $this->uploadBloggerImage(),
                'image'         => $this->uploadImage(),
                'audio'         => $this->uploadAudio(),
                'video'         => $this->uploadVideo()
        	];

        	$id = $this->main->add($post, $this->table);

        	flashMsg($id, ucwords($this->title)." Added Successfully.", ucwords($this->title)." Not Added. Try again.", $this->redirect);
        }
	}

	public function view($id)
    {
        $data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['operation'] = "view";
        $data['url'] = $this->redirect;
        $data['data'] = $this->main->get($this->table, 'title, details, image, audio, video, created_at, cat_id, sub_title, created_by, whatsapp_url, facebook_url, insta_url, tweeter_url, blog_slug, blogger_image', ['id' => d_id($id)]);

        if ($data['data']) 
            return $this->template->load(admin('template'), $this->redirect.'/view', $data);
        else
            return $this->error_404();
    }

	public function update($id)
	{
		$this->form_validation->set_rules($this->validate);
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = $this->name;
            $data['id'] = $id;
			$data['title'] = $this->title;
			$data['operation'] = "update";
	        $data['select'] = TRUE;
            $data['url'] = $this->redirect;
            $data['cats'] = $this->main->getall('blog_category', 'id, cat_name, cat_slug', ['is_deleted' => 0]);
			$data['data'] = $this->main->get($this->table, 'id, title, details, image, audio, video, created_at, cat_id, sub_title, created_by, whatsapp_url, facebook_url, insta_url, tweeter_url, blog_slug, blogger_image', ['id' => d_id($id)]);
			
			if ($data['data']) 
			{
				$this->session->set_flashdata('updateId', $id);
				return $this->template->load(admin('template'), $this->redirect.'/update', $data);
			}
			else
				return $this->error_404();
        }
        else
        {
        	$updateId = $this->session->updateId;
            $unlink = $this->input->post('image');
        	$post = [
                'cat_id'       => $this->input->post('cat_id'),
                'title'        => $this->input->post('title'),
                'sub_title'    => $this->input->post('sub_title'),
                'created_by'   => $this->input->post('created_by'),
                'blog_slug'    => str_replace(" ", "-", strtolower($this->input->post('blog_slug'))),
                'details'      => $this->input->post('details'),
                'facebook_url' => (!empty($this->input->post('facebook_url'))) ? $this->input->post('facebook_url') : '',
                'whatsapp_url' => (!empty($this->input->post('whatsapp_url'))) ? $this->input->post('whatsapp_url') : '',
                'insta_url'    => (!empty($this->input->post('insta_url'))) ? $this->input->post('insta_url') : '',
                'tweeter_url'  => (!empty($this->input->post('tweeter_url'))) ? $this->input->post('tweeter_url') : '',
                'created_at'   => date('Y-m-d H:i:s'),
                'blogger_image'=> $this->uploadBloggerImage($this->input->post('blogger_image')),
                'image'        => $this->uploadImage($this->input->post('image')),
                'audio'        => $this->uploadAudio($this->input->post('audio')),
                'video'        => $this->uploadVideo($this->input->post('video'))
            ];

        	$id = $this->main->update(['id' => d_id($updateId)], $post, $this->table);

			flashMsg($id, ucwords($this->title)." Updated Successfully.", ucwords($this->title)." Not Updated. Try again.", $this->redirect);
        }
	}

	public function delete()
	{
		$id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1], $this->table);

		flashMsg($id, ucwords($this->title)." Deleted Successfully.", ucwords($this->title)." Not Deleted. Try again.", $this->redirect);
	}

    protected function uploadBloggerImage($unlink='')
    {
        if (!empty($_FILES['blogger_image']['name'])) {

            $config = [
                'upload_path'      => "./assets/blog/",
                'allowed_types'    => 'jpg|jpeg|png',
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];

            if ($unlink && $unlink != 'blogger.jpg' && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $this->upload->initialize($config);
            if ($this->upload->do_upload("blogger_image"))
                return $this->upload->data("file_name");
            else
                return 'blogger.jpg';
        }else {
            if ($unlink) 
                return $unlink;
            else 
                return 'blogger.jpg';
        }
    }

    protected function uploadImage($unlink='')
    {
        if (!empty($_FILES['image']['name'])) {

            $config = [
                'upload_path'      => "./assets/blog/",
                'allowed_types'    => 'jpg|jpeg|png',
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];

            if ($unlink && $unlink != 'No Image' && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $this->upload->initialize($config);
            if ($this->upload->do_upload("image"))
                return $this->upload->data("file_name");
            else
                return 'No Image';
        }else {
            if ($unlink) 
                return $unlink;
            else 
                return 'No Image';
        }
    }

    protected function uploadAudio($unlink='')
    {
        if (!empty($_FILES['audio']['name'])) {
            $config = [
                'upload_path'      => "./assets/blog/",
                'allowed_types'    => 'mp3',
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];

            if ($unlink && $unlink != 'No Audio' && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $this->upload->initialize($config);
            if ($this->upload->do_upload("audio")) 
                return $this->upload->data("file_name");
            else
                return 'No Audio';
        }else {
            if ($unlink) 
                return $unlink;
            else 
                return 'No Audio';
        }
    }

    protected function uploadVideo($unlink='')
    {
        if (!empty($_FILES['video']['name'])) {
            $config = [
                'upload_path'      => "./assets/blog/",
                'allowed_types'    => 'mp4',
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];

            if ($unlink && $unlink != 'No Video' && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $this->upload->initialize($config);
            if ($this->upload->do_upload("video")) 
                return $this->upload->data("file_name");
            else
                return 'No Video';
        }else {
            if ($unlink) 
                return $unlink;
            else 
                return 'No Video';
        }
    }
}