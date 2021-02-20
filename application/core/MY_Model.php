<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {
  protected $table;
  public function get($select = '*',$join = NULL,$limit = NULL){
      if($join != NULL){
          $this->db->select($select);
          foreach ($join as $row) {
              $this->db->join($row['table'],$row['condition']);
          }
      }
      if($limit != NULL){
          $this->db->limit($limit);
      }
      $query = $this->db->get($this->table);
      return $query;
  }

  public function insert(){
      $this->db->insert($this->table, $this);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
  }

  public function update($id){
      $this->db->update($this->table, $this, array('id' => $id));
  }

  public function delete($id){
          $this->db->delete($this->table,['id'=>$id]);
  }

  public function find($id){
          $this->db->where('id',$id);
          $table = $this->db->get($this->table,1);
          return $table;
  }

  public function where($field,$value){
      return $this->db->where($field,$value);
  }

  public function where_not_in($field,$value){
      return $this->db->where_not_in($field,$value);
  }

  public function like($field,$value){
      return $this->db->like($field,$value);
  }

  public function order_by($field, $asc_desc){
    $this->db->order_by($field, $asc_desc);
  }
}
