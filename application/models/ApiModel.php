<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class ApiModel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function stocks()
	{
		$select = ['s.id', 's.deler', 's.city', 's.invoice_type', 's.fin_no', 's.invoice_gp_no', 's.gr_no', 's.account_code', 's.model_code', 's.model_description', 's.color_code', 's.color_description', 's.chassis_prefix', 's.chassis_no', 's.engine_no', 's.invoice_date', 's.invoice_date_road_perm', 's.invoice_amount', 's.order_cat', 's.plant', 's.tin', 's.sent_by', 's.consignment_no', 's.trans_reg_no', 's.allot_no', 's.trans_name', 's.email_id', 's.financer', 's.status', 'e.fullname'];

		$search = ['s.deler', 's.city', 's.invoice_type', 's.fin_no', 's.invoice_gp_no', 's.gr_no', 's.account_code', 's.model_code', 's.model_description', 's.color_code', 's.color_description', 's.chassis_prefix', 's.chassis_no', 's.engine_no', 's.invoice_date', 's.invoice_date_road_perm', 's.invoice_amount', 's.order_cat', 's.plant', 's.tin', 's.sent_by', 's.consignment_no', 's.trans_reg_no', 's.allot_no', 's.trans_name', 's.email_id', 's.financer'];

		$this->db->select($select)	
            ->from('stocks s')
            ->where(['s.is_deleted' => 0])
            ->join('employee e', 'e.id = s.hold_by', 'left');

        $i = 0;

        foreach ($search as $item) 
        {
            if($this->input->get('search')) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $this->input->get('search'));
                }
                else
                {
                    $this->db->or_like($item, $this->input->get('search'));
                }
 
                if(count($search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }

        if($this->input->get('length') != -1)  
	        $this->db->limit($this->input->get('length'), $this->input->get('start'));
	     
	    $query = $this->db->get();

	    return ['data' => $query->result(), 'filtered_data' => $query->num_rows()];
	}
}