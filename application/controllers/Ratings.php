<?php
	class Ratings extends CI_Controller{
		public function index(){
			$data['title'] = 'Ratings';

			$data['ratings'] = $this->rating_model->get_ratings();

			$this->load->view('templates/header');
			$this->load->view('ratings/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$data['title'] = 'Create Rating';

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('ratings/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->rating_model->create_rating();

				// Set message
				$this->session->set_flashdata('rating_created', 'Your rating has been created');

				redirect('ratings');
			}
		}

		public function reviews($id){
			$data['title'] = $this->rating_model->get_rating($id)->name;

			$data['reviews'] = $this->review_model->get_reviews_by_rating($id);

			$this->load->view('templates/header');
			$this->load->view('reviews/index', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->rating_model->delete_rating($id);

			// Set message
			$this->session->set_flashdata('rating_deleted', 'Your rating has been deleted');

			redirect('ratings');
		}
	}