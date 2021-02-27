<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Main_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function add($post, $table)
	{
		if ($this->db->insert($table, $post)) {
			$id = $this->db->insert_id();
			return ($id) ? $id : true;
		}else
			return false;
	}

	public function get($table, $select, $where)
	{
		return $this->db->select($select)
						->from($table)
						->where($where)
						->get()
						->row_array();
	}

	public function getall($table, $select, $where, $order_by = '', $limit = '')
	{
		$this->db->select($select)
						->from($table)
						->where($where);

		if ($order_by != '') 
			$this->db->order_by($order_by);
		
		if ($limit != '') 
			$this->db->limit($limit);
		
		return  $this->db->get()
						->result_array();
	}

	public function check($table, $where, $select)
	{
		$check = $this->db->select($select)
						->from($table)
						->where($where)
						->get()
						->row_array();
		if ($check) 
			return $check[$select];
		else
			return false;
	}

	public function update($where, $post, $table)
	{
		return $this->db->where($where)->update($table, $post);
	}

	public function delete($table, $where)
	{
		return $this->db->delete($table, $where);
	}

	public function make_datatables($model)
	{  
	   $this->load->model($model, 'model');			
	   $this->model->make_query();  
	   if($_POST["length"] != -1)  
	   {  
	        $this->db->limit($_POST['length'], $_POST['start']);
	   }  
	   $query = $this->db->get(); 
	   return $query->result();  
	}  

	public function get_filtered_data($model){  
	   $this->load->model($model, 'model');			
	   $this->model->make_query();  
	   $query = $this->db->get();  

	   return $query->num_rows();
	}

	public function count($table, $where, $group = "")
	{
		if ($group != '') {
			$this->db->group_by($group);
		}
		return $this->db->get_where($table, $where)->num_rows();
	}
}