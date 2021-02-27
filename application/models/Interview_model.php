<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Interview_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "interview i";  
	public $select_column = ['i.id', 'i.title', 'i.created_at'];
	public $search_column = ['i.title', 'i.created_at'];
    public $order_column = [null, 'i.title', 'i.created_at', null];
	public $order = ['i.id' => 'DESC'];

	public function make_query()  
	{  
        $this->db->select($this->select_column)	
            ->from($this->table)
            ->where(['i.is_deleted' => 0]);

        $i = 0;

        foreach ($this->search_column as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->search_column) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}

    public function getInterview($slug)
    {
        $select = ['title', 'interview_slug', 'youtube_url', 'details description', 'created_at', 'LEFT (details, 500) details'];
        $this->db->select($select)
                    ->from($this->table);
        if ($slug) 
            return  $this->db->where(['i.is_deleted' => 0, 'interview_slug' => $slug])
                             ->get()
                             ->row_array();
        else
            return $this->db->where(['i.is_deleted' => 0])
                         ->get()
                         ->result_array();
    }
}