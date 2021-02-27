<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Blog_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "blog b";  
	public $select_column = ['b.id', 'b.title', 'c.cat_name'];
	public $search_column = ['b.title', 'c.cat_name'];
    public $order_column = [null, 'b.title', 'c.cat_name', null];
	public $order = ['b.id' => 'ASC'];

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
        $select = ['title', 'details', 'CONCAT("'.assets('blog/').'", image) image', 'CONCAT("'.assets('blog/').'", blogger_image) blogger_image', 'CONCAT("'.assets('blog/').'", audio) audio', 'CONCAT("'.assets('blog/').'", video) video', 'created_at', 'sub_title', 'created_by', 'whatsapp_url', 'facebook_url', 'insta_url', 'tweeter_url', 'blog_slug', 'cat_name', 'background', 'cat_color'];
        $blog = $this->db->select($select)
                         ->from($this->table)
                         ->where(['b.is_deleted' => 0, 'blog_slug' => $slug])
                         ->join('blog_category c', 'c.id = b.cat_id', 'left')
                         ->get()
                         ->row_array();
        if ($blog) 
            return $blog;
        else{
            $blogs = $this->db->select('title, blog_slug, LEFT (details, 70) details, CONCAT("'.assets('blog/').'", image) image, CONCAT("'.assets('blog/').'", blogger_image) blogger_image, CONCAT("'.assets('blog/').'", audio) audio, CONCAT("'.assets('blog/').'", video) video')
                         ->from($this->table)
                         ->where(['b.is_deleted' => 0, 'cat_slug' => $slug])
                         ->join('blog_category c', 'c.id = b.cat_id', 'left')
                         ->get()
                         ->result_array();
            if ($blogs) return $blogs;
            else return false;
        }
    }
}