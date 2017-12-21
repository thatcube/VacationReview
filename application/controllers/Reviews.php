<?php
	class Reviews extends CI_Controller{
		public function index($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'reviews/index/';
			$config['total_rows'] = $this->db->count_all('reviews');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Reviews';

			$data['reviews'] = $this->review_model->get_reviews(FALSE, $config['per_page'], $offset);

			$this->load->view('templates/header');
			$this->load->view('reviews/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['review'] = $this->review_model->get_reviews($slug);
			$review_id = $data['review']['id'];
			$data['comments'] = $this->comment_model->get_comments($review_id);

			if(empty($data['review'])){
				show_404();
			}

			$data['title'] = $data['review']['title'];

			$this->load->view('templates/header');
			$this->load->view('reviews/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Create Review';

			$data['ratings'] = $this->review_model->get_ratings();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('reviews/create', $data);
				$this->load->view('templates/footer');
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/reviews';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$review_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$review_image = $_FILES['userfile']['name'];
				}

				$this->review_model->create_review($review_image);

				// Set message
				$this->session->set_flashdata('review_created', 'Your review has been created');

				redirect('reviews');
			}
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->review_model->delete_review($id);

			// Set message
			$this->session->set_flashdata('review_deleted', 'Your review has been deleted');

			redirect('reviews');
		}

		public function edit($slug){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['review'] = $this->review_model->get_reviews($slug);

			// Check user
			if($this->session->userdata('user_id') != $this->review_model->get_reviews($slug)['user_id']){
				redirect('reviews');

			}

			$data['ratings'] = $this->review_model->get_ratings();

			if(empty($data['review'])){
				show_404();
			}

			$data['title'] = 'Edit Review';

			$this->load->view('templates/header');
			$this->load->view('reviews/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->review_model->update_review();

			// Set message
			$this->session->set_flashdata('review_updated', 'Your review has been updated');

			redirect('reviews');
		}
	}