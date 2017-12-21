<?php
	class Comment_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_comment($review_id){
			$data = array(
				'review_id' => $review_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body')
			);

			return $this->db->insert('comments', $data);
		}

		public function get_comments($review_id){
			$query = $this->db->get_where('comments', array('review_id' => $review_id));
			return $query->result_array();
		}
	}