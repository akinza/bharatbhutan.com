<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(array('news_model', 'category_model'));
		$this->load->library(array('ion_auth','form_validation', 'session'));
		$this->load->helper(array('url','language', 'url_helper'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('article');
	}

	private function authorized() {
		return $this->ion_auth->logged_in() && $this->ion_auth->is_admin();
	}

	public function index()	{
		if($this->authorized()){
      $data['posts'] = $this->news_model->get_all_posts();
      $this->load->view('admin/post/list_post', $data);
		}
		else{
			redirect(base_url('auth/login'), 'refresh');
		}
	}

	public function create()	{
		if($this->authorized()) {
			$this->form_validation->set_rules('article_title', $this->lang->line('create_group_validation_name_label'), 'required');
			$this->form_validation->set_rules('article_short', $this->lang->line('create_group_validation_name_label'), 'required');
			$this->form_validation->set_rules('article_full', $this->lang->line('create_group_validation_name_label'), 'required');

      if ($this->form_validation->run() == true) {
        $title = $this->input->post('article_title');
				$slug = url_title($this->input->post('article_title'), 'dash', TRUE);
        $category = $this->input->post('news_category');
        $news_short = $this->input->post('article_short');
        $news_full = $this->input->post('article_full');
        $author = $this->ion_auth->user()->row()->user_id;
				$dt = new DateTime();
				$dt->format('Y-m-d H:i:s');
        $create_date = $dt;
				$category_id = $this->input->post('news_category');
        $this->news_model->insert_post($title, $slug, $news_short, $news_full, $create_date, NULL, $author,$category_id);

        redirect(base_url('article'), 'refresh');
      }
      else{
        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				$this->data["categories"] = $this->category_model->get_all_categories();
        // pass the user to the view
        $this->data['article_title'] = array(
          'name'  => 'article_title',
          'id'    => 'article-title',
          'type'  => 'text',
          'class'  => 'form-control',
          'value' => $this->form_validation->set_value('article_title', $this->news_model->title),
        );
        $this->data['article_short'] = array(
          'name'  => 'article_short',
          'id'    => 'article-short',
          'type'  => 'textarea',
          'class'  => 'form-control',
          'value' => $this->form_validation->set_value('article_short', $this->news_model->news_short),
        );
        $this->data['article_full'] = array(
          'name'  => 'article_full',
          'id'    => 'article-full',
          'type'  => 'textarea',
          'class'  => 'form-control',
          'value' => $this->form_validation->set_value('article_full', $this->news_model->news_full),
        );
        $this->load->view('admin/post/add_post', $this->data);

      }
		}
		else {
      $this->session->set_flashdata('message', "Sorry! You are not authorized to perform the task.");
      redirect(base_url('auth/login'), 'refresh');
		}
	}

	public function edit()	{
		if($this->authorized()){
				$this->load->view('admin/post/update_post', $data);
		}
		else{
      $this->session->set_flashdata('message', "Sorry! You are not authorized to perform the task.");
			redirect(base_url('auth/login'), 'refresh');
		}
	}

	public function delete()	{
		if($this->authorized()){
				$this->load->view('admin/post/update_post', $data);
		}
		else{
      $this->session->set_flashdata('message', "Sorry! You are not authorized to perform the task.");
			redirect(base_url('auth/login'), 'refresh');
		}
	}

	public function create_category()	{
		if($this->authorized()){
				$this->form_validation->set_rules('news_category_name', "Category Name is required.", 'required');

	      if ($this->form_validation->run() == true) {
	        $cat_name = $this->input->post('news_category_name');
	        $cat_desc = $this->input->post('news_category_desc');

	        $this->category_model->add_category($cat_name, $cat_desc);
					$this->data["categories"] = $this->category_model->get_all_categories();
					$this->data['message'] = "<p class='alert alert-success'>Category created successfully</p>";
					$this->load->view('admin/category/manage_category', $this->data);
	      }
	      else{
	        // set the flash data error message if there is one
	        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
					$this->data["categories"] = $this->category_model->get_all_categories();
	        $this->load->view('admin/category/add_category', $this->data);
	      }
		}
		else{
      $this->session->set_flashdata('message', "Sorry! You are not authorized to perform the task.");
			redirect(base_url('auth/login'), 'refresh');
		}
	}

	public function manage_category(){
		$this->data["categories"] = $this->category_model->get_all_categories();
		$this->load->view('admin/category/manage_category', $this->data);
	}

	public function delete_category($category_id){
		if($this->authorized()){
			$this->category_model->delete_category($category_id);
			redirect(base_url('article/manage_category'), 'refresh');
		}
		else{
			$this->session->set_flashdata('message', "Sorry! You are not authorized to perform the task.");
			redirect(base_url('auth/login'), 'refresh');
		}
	}
	public function edit_category($category_id){
		if($this->authorized()){
			$this->form_validation->set_rules('news_category_name', "Category Name is required.", 'required');

			if ($this->form_validation->run() == true) {
				$cat_name = $this->input->post('news_category_name');
				$cat_desc = $this->input->post('news_category_desc');

				$this->category_model->update_category($category_id, $cat_name, $cat_desc);

				$this->data["categories"] = $this->category_model->get_all_categories();

				$this->data['message'] = "<p class='alert alert-success'>Category updated successfully</p>";
				$this->load->view('admin/category/manage_category', $this->data);
			}
			else{
				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				$categories = $this->category_model->get_all_categories();

				$category_data = $this->category_model->get_category($category_id);
				print_r($category_data);

				// $category_data = array();
				// foreach ($categories as $cat) {
				// 	if($cat->category_id == $category_id){
				// 		$category_data = $cat;
				// 	}
				// }
				$this->data['category_id'] = $category_id;
				$this->data["category_name"] = array(
					'name' => 'news_category_name',
					'type' => 'text',
					'class' => 'form-control',
					'id' => 'input-category-name',
					'placeholder' => 'Category Name',
					'value' => $category_data['category_name']
				);

				$this->data["category_desc"] = array(
					'name' => 'news_category_desc',
					'type' => 'text',
					'class' => 'form-control',
					'id' => 'input-category-desc',
					'placeholder' => 'Description',
					'value' => $category_data['description']
				);
				$this->load->view('admin/category/edit_category', $this->data);
			}
		}
		else{
			$this->session->set_flashdata('message', "Sorry! You are not authorized to perform the task.");
			redirect(base_url('auth/login'), 'refresh');
		}
	}
}
