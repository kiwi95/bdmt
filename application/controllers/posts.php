<?php 
class Posts extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('post');
	}
	function index($start=0)
	{
		$data['posts']=$this->post->get_posts(2,isset($start)?$start:0);

		//pagination
		$this->load->library('pagination');
		$config['base_url']=base_url().'posts/index/';
		$config['total_rows']=$this->post->get_posts_count();
		// print_r($config['total_rows']);
		$config['per_page']=2;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		print_r($data['pages']);
		$this->load->view('post_index', $data);
	}

	function post($postID)
	{
		$data['post']=$this->post->get_post($postID);
		// print_r($data['post']);
		// print_r($postID);
		$this->load->view('post', $data);
	}

	function new_post()
	{
		if($_POST)
		{
			$data = array(
				'title'=>$_POST['title'],
				'post'=>$_POST['post'],
				'active'=>1
				);
			$this->post->insert_post($data);
		} else {
			$this->load->view('new_post');
		}
	}

	function editpost($postID)
	{
		$data['success']=0;
		if($_POST)
		{
			$data_post = array(
				'title'=>$_POST['title'],
				'post'=>$_POST['post'],
				'active'=>1
			);
			$this->post->update_post($postID, $data_post);
			$data['success'] = 1;
		}
		$data['post']=$this->post->get_post($postID);
		$this->load->view('edit_post', $data);
	}


	function deletepost($postID)
	{
		$this->post->delete_post($postID);
		redirect(base_url().'posts');
	}
}
 ?>