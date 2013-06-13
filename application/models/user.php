<?php 

class User extends CI_Model
{
    //get users from start to num
    function get_users($num=20, $start=0)
    {
        $this->db->select()->from('users')->where('active',1)->order_by('type','desc')->limit($num, $start);
        return $this->db->get()->result_array();
    }

    //根据userID获取用户信息
    function get_user($userID)
    {
        $this->db->select()->from('users')->where('userID', $userID);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function insert_user($data)
    {
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    function update_user($userID, $data)
    {
        $this->db->where('userID', $userID);
        $this->db->update('users', $data);
    }

    function delete_user($userID)
    {
        $this->db->where('userID', $userID);
        $this->db->delete('users');
    }
}

 ?>