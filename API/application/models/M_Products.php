<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Products extends CI_Model {
    private $id;
    private $name;
    private $location;
    private $facility;
    private $document;
    private $lt;
    private $lb;
    private $status;
    private $contactPerson;
    private $productCondition;
    private $property;
    const TABLE_NAME = 'products';

    public function create($name, $price, $location, $facility, $document, $lt, $lb, $contactPerson, $productCondition, $property) {
        $this->db->insert($this::TABLE_NAME, array (
            'name' => $name,
            'price' => $price,
            'location' => $location,
            'facility' => $facility,
            'document' => $document,
            'lt' => $lt,
            'lb' => $lb,
            'contactPerson' => $contactPerson,
            'productCondition' => $productCondition,
            'property' => $property
        ));
        return $this->db->insert_id();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from($this::TABLE_NAME);
        $this->db->order_by('id','DESC');
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