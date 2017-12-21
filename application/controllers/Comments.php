<?php
	class Comments extends CI_Controller{
		public function create($review_id){
			$slug = $this->input->post('slug');
			$data['review'] = $this->review_model->get_reviews($slug);

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');

			$this->form_validation->set_rules('body', 'Body', 'required');


			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('reviews/view', $data);
				$this->load->view('templates/footer');
			} else {
				$this->comment_model->create_comment($review_id);
				redirect('reviews/'.$slug);
			}
		}
	}