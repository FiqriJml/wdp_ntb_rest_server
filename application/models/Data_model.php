<?php

class Data_model extends CI_Model
{
    public function get($id = null)
    {
        if($id === null){
            return $this->db->get('data')->result_array();
        } else {
            return $this->db->get_where('data',['id' => $id])->result_array();
        }
    }
}