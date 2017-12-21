<?php
	class Rating_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_ratings(){
			$this->db->order_by('name');
			$query = $this->db->get('ratings');
			return $query->result_array();
		}

		public function get_rating($id){
			$query = $this->db->get_where('ratings', array('id' => $id));
			return $query->row();
		}

		public function delete_rating($id){
			$this->db->where('id', $id);
			$this->db->delete('ratings');
			return true;
		}
	}