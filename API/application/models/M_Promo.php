<?php
defined('BASEPATH');

class M_Promo extends CI_Model {
    const TABLE_NAME = 'promo';

    public function create($title, $content, $image) {
        $this->db->insert($this::TABLE_NAME, array (
            'title' => $title,
            'content' => $content,
            'image' => $image
        ));
        return $this->db->insert_id();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from($this::TABLE_NAME);
        return $this->db->get()->result_array();
    }

    public function is_not_exists($id){
        if($this->db->get_where($this::TABLE_NAME, "id='{$id}'")->num_rows() == 0) return true;
        else return false;
    }

    public function update($id, $datas) {
        $result = $this->db->get_where($this::TABLE_NAME, $datas);
        if($result->num_rows() > 0) return true;

        $this->db->update($this::TABLE_NAME, $datas, "id='{$id}'");
        
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->delete($this::TABLE_NAME, "id='{$id}'");
        return $this->db->affected_rows();
    }
}
?>