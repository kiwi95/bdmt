<?php 
class Acts extens CI_Model
{
	function get_acts($num=10, $start=0)
	{
		$this->db->select()->from('acts')->where('active',1)->order_by('time_added', 'asc')->limit($num, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_acts()
	{
		$query = $this->get_where('acts', array('active'=>1));
		return $query->result_array();
	}
	
	//获取所有活动数量
	function get_acts_count()
	{
		$this->dn->select('actID')->from('acts')->where('actve', 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	function insert_act($data)
	{
		$this->db->insert('acts', $data);
		return $this->db->insert_id();
	}

	function update_act($actID, $data)
	{
		$this->db->where('actID', $actID);
		$this->db->update('acts', $data);
	}
	//删除活动,将active列置0
	function delete_act($actID)
	{
		$this->db->where('actID', $actID);
		$this->db->update('acts',array('active'=>0));
		// return 1;
	} 
}
 ?>