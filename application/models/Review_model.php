<?php
	class Review_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_reviews($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('reviews.id', 'DESC');
				$this->db->join('ratings', 'ratings.id = reviews.rating_id');
				$query = $this->db->get('reviews');
				return $query->result_array();
			}

			$query = $this->db->get_where('reviews', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_review($review_image){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'rating_id' => $this->input->post('rating_id'),
				'user_id' => $this->session->userdata('user_id'),
				'review_image' => $review_image
			);

			return $this->db->insert('reviews', $data);
		}

		public function delete_review($id){
			$this->db->where('id', $id);
			$this->db->delete('reviews');
			return true;
		}

		public function update_review(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'rating_id' => $this->input->post('rating_id')
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('reviews', $data);
		}

		public function get_ratings(){
			$this->db->order_by('name');
			$query = $this->db->get('ratings');
			return $query->result_array();
		}

		public function get_reviews_by_rating($rating_id){
			$this->db->order_by('reviews.id', 'DESC');
			$this->db->join('ratings', 'ratings.id = reviews.rating_id');
				$query = $this->db->get_where('reviews', array('rating_id' => $rating_id));
			return $query->result_array();
		}
	}