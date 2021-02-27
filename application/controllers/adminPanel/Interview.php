<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Interview extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("interview");
	}

	private $name = 'interview';
    private $title = 'interview';
    private $table = "interview";

	protected $validate = [
        [
            'field' => 'title',
            'label' => 'Interview Title',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'interview_slug',
            'label' => 'Interview URL',
            'rules' => 'required|callback_slug_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'youtube_url',
            'label' => 'Youtube URL',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'details',
            'label' => 'Interview details',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];

    public function slug_check($str)
    {   

        $id = $this->session->updateId;
        
        if ((!empty($id) && $this->main->check($this->table, ['interview_slug' => $str, 'id != ' => d_id($id)], 'id')) || (empty($id) && $this->main->check($this->table, ['interview_slug' => $str], 'id')))
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
        $fetch_data = $this->main->make_datatables('interview_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->title;
            $sub_array[] = date('d-m-Y', strtotime($row->created_at));

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
            "recordsFiltered"   => $this->main->get_filtered_data('interview_model'),
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
            $data['url'] = $this->redirect;
            return $this->template->load(admin('template'), $this->redirect.'/add', $data);
        }
        else
        {
        	$post = [
                'title'          => $this->input->post('title'),
                'interview_slug' => str_replace(" ", "-", strtolower($this->input->post('interview_slug'))),
                'details'        => $this->input->post('details'),
                'youtube_url'    => $this->input->post('youtube_url'),
                'created_at'     => date('Y-m-d H:i:s')
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
        $data['data'] = $this->main->get($this->table, 'title, interview_slug, youtube_url, details, created_at', ['id' => d_id($id)]);

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
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get($this->table, 'id, title, interview_slug, youtube_url, details', ['id' => d_id($id)]);
			
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
                'title'          => $this->input->post('title'),
                'interview_slug' => str_replace(" ", "-", strtolower($this->input->post('interview_slug'))),
                'details'        => $this->input->post('details'),
                'youtube_url'    => $this->input->post('youtube_url')
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
}