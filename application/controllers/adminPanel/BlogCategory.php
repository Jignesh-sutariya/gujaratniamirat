<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BlogCategory extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("blogCategory");
	}

	private $name = 'blog_category';
    private $title = 'blog category';
    private $table = "blog_category";

	protected $validate = [
        [
            'field' => 'cat_name',
            'label' => 'Category',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'cat_slug',
            'label' => 'Category URL',
            'rules' => 'required|callback_slug_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'background',
            'label' => 'Background',
            'rules' => 'required|callback_slug_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'cat_color',
            'label' => 'Category Color',
            'rules' => 'required|callback_slug_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];

    public function slug_check($str)
    {   
        $id = $this->session->updateId;
        
        if ((!empty($id) && $this->main->check($this->table, ['cat_slug' => $str, 'id != ' => d_id($id)], 'id')) || (empty($id) && $this->main->check($this->table, ['cat_slug' => $str], 'id')))
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
        $fetch_data = $this->main->make_datatables('blog_category_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->cat_name;
            $sub_array[] = '<i class="fas fa-square" style="color: '.$row->background.'"></i>';
            $sub_array[] = '<i class="fas fa-square" style="color: '.$row->cat_color.'"></i>';

            $sub_array[] = '<div class="ml-0 table-display row">'.anchor($this->redirect.'/update/'.e_id($row->id), '<i class="fa fa-edit"></i>', 'class="btn btn-outline-primary mr-2"').'</div>';

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();  

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, ['is_deleted' => 0]),
            "recordsFiltered"   => $this->main->get_filtered_data('blog_category_model'),
            "data"              => $data,
            $csrf_name          => $csrf_hash
        );
        
        echo json_encode($output);
    }

	public function edit($id)
	{
		$data['name'] = $this->name;
        $data['id'] = $id;
		$data['title'] = $this->title;
		$data['operation'] = "update";
        $data['colorpicker'] = TRUE;
        $data['url'] = $this->redirect;
        $data['data'] = $this->main->get($this->table, 'id, cat_name, cat_image, cat_slug, background, cat_color', ['id' => d_id($id)]);
		
		if ($data['data']) 
		{
			$this->session->set_flashdata('updateId', $id);
			return $this->template->load(admin('template'), $this->redirect.'/update', $data);
		}
		else
			return $this->error_404();
	}
	public function update($id)
	{
		$this->form_validation->set_rules($this->validate);
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->edit($id);
        }
        else
        {
        	$updateId = $this->session->updateId;
        	$this->session->set_flashdata('updateId', $updateId);
        	$cat_image = $this->uploadImage($this->input->post('cat_image'));
            if (is_array($cat_image)) {
	        	$this->edit($id);
            }else{
            	$post = [
	                'cat_name'   => $this->input->post('cat_name'),
	                'cat_slug'   => str_replace(" ", "-", strtolower($this->input->post('cat_slug'))),
	                'background' => $this->input->post('background'),
	                'cat_color'  => $this->input->post('cat_color'),
	                'cat_image'  => $cat_image
	                
	            ];

	        	$id = $this->main->update(['id' => d_id($updateId)], $post, $this->table);

				flashMsg($id, ucwords($this->title)." Updated Successfully.", ucwords($this->title)." Not Updated. Try again.", $this->redirect);
            }
        }
	}

	public function delete()
	{
		$id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1], $this->table);

		flashMsg($id, ucwords($this->title)." Deleted Successfully.", ucwords($this->title)." Not Deleted. Try again.", $this->redirect);
	}

    protected function uploadImage($unlink='')
    {
        if (!empty($_FILES['cat_image']['name'])) {

            $config = [
                'upload_path'      => "./assets/images/blog-category/",
                'allowed_types'    => 'jpg|jpeg|png',
                'file_name'        => str_replace(" ", "-", $this->input->post('cat_slug')),
                'file_ext_tolower' => TRUE
            ];

            if ($unlink && file_exists($config['upload_path'].$unlink))
                unlink($config['upload_path'].$unlink);

            $this->upload->initialize($config);
            if ($this->upload->do_upload("cat_image"))
                return $this->upload->data("file_name");
            else
                return ['error' => $this->upload->display_errors()];
        }else {
            if ($unlink)
                return $unlink;
            else 
                return ['error' => 'Select Image.'];
        }
    }
}