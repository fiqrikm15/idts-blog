<?php
class Article extends CI_Model 
{
    function get($tb)
    {
        $this->db->select("article.id_article, article.title, article.status, article.tgl_create, article.last_update, users.nama");
        $this->db->from($tb);
        $this->db->join('users', 'users.id_user = article.id_user');
        return $this->db->get()->result();
    }

    function get_by_id($tb, $id)
    {
        $this->db->where('id_article', $id);
        return $this->db->get($tb)->result_array();
    }

    function add($tb, $data)
    {
        $create = $this->db->insert($tb, $data);
        if($create)
        {
            return true;
        }
    }

    function update($tb, $data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_article', $id);
        $edit = $this->db->update($tb, $data);

        if($edit)
        {
            return true;
        }
    }

    function delete($tb, $id)
    {
        $this->db->where('id_article', $id);
        $delete = $this->db->delete($tb);
    }
}