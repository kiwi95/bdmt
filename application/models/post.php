<?php 
class Post extends CI_Model
{
	function get_posts($num=20,$start=0)
	{
		// $sql ='select * from user where active=1 order by data_added desc limit 0,20;';
		// $this->db->select()->from('posts')->where('active',1)->order_by('data_added','desc')->limit($num, $start);
		// $query=$this->db->get();
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('active',1);
		$this->db->order_by('data_added','desc');
		$this->db->limit($num, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_post($postID)
	{
		$this->db->select()->from('posts')->where(array('active'=>1,'postID'=>$postID))->order_by('data_added','desc');
		$query = $this->db->get();
		return $query->first_row('array');
	}
	
	//获取数量用于分页显示
	function get_posts_count()
	{
		$this->db->select('postID')->from('posts')->where('active',1);
		$query=$this->db->get();
		return $query->num_rows();
	}

	function insert_post($data)
	{
		$this->db->insert('posts', $data);
		return $this->db->insert_id();
	}

	function update_post($postID, $data)
	{
		$this->db->where('postID', $postID);
		$this->db->update('posts', $data);	
	}

	function delete_post($postID)
	{
		$this->db->where(array('active'=>1,'postID'=>$postID));
		$this->db->update('posts',array('active'=>0));
	}

	function get_posts_by_tag($tag)
	{
		$this->db->select()->where(array('active'=>1,'tag'=>$tag))->order_by('time_added','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//获取数量用于分页显示
	function get_tag_count($tag)
	{
		$this->db->select('postID')->from('posts')->where(array('active'=>1,'tag'=>$tag));
		$query=$this->db->get();
		return $query->num_rows();
	}

	function get_posts_by_authorID($authorID)
	{
		$this->db->select()->where(array('active'=>1,'authorID'=>$authorID))->order_by('time_added','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//获取数量用于分页显示
	function get_authorID_count($authorID)
	{
		$this->db->select('postID')->from('posts')->where(array('active'=>1,'authorID'=>$authorID));
		$query=$this->db->get();
		return $query->num_rows();
	}
}
 ?>