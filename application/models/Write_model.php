<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Write_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "you_can_write b";  
	public $select_column = ['b.id', 'b.title', 'c.cat_name'];
	public $search_column = ['b.title', 'c.cat_name'];
    public $order_column = [null, 'b.title', 'c.cat_name', null];
	public $order = ['b.id' => 'DESC'];

	public function make_query()  
	{  
        $this->db->select($this->select_column)	
            ->from($this->table)
            ->where(['b.is_deleted' => 0, 'c.is_deleted' => 0])
            ->join('blog_category c', 'c.id = b.cat_id', 'left');

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

    public function getBlogs($slug)
    {
        $select = ['name', 'email', 'mobile', 'topic', 'title', 'description', 'CONCAT("'.assets('blog/').'", image) image', 'blog_slug', 'LEFT (description, 500) details'];
        $this->db->select($select)
                    ->from($this->table);
        if ($slug) 
            return  $this->db->where(['b.is_deleted' => 0, 'blog_slug' => $slug])
                             ->get()
                             ->row_array();
        else
            return $this->db->where(['b.is_deleted' => 0])
                            ->order_by('id', 'DESC')
                            ->get()
                            ->result_array();
    }
}