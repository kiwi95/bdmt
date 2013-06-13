<?php 
class Comment extends CI_Model
{
	//获得获得post 的所有comment
	function get_all_comment($postID)
	{
		$this->db->select()->from('comments')->where('active', 1)->order_by('postID');
		$query = $this->db->get();
		return $query->select_array();
	}

	function delete_comment($commentID)
	{
		$this->db->where('commentID', $commentID);
		$this->db->update('comments', array('active'=>0) );
		// return 0;
	}

	function insert_comment($data)
	{
		$this->db->insert('comments', $data);
		return $this->db->insert_id();
	}
}
 ?>