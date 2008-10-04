<?php

class News extends Controller {
	var $static_url =  "http://static.ghostly.com/";

	function News()
	{
		parent::Controller();	
		$this->load->model('head');
		$this->load->model('news_model','news');
	}

	function index()
	{
		
		$data['news'] = $this->news->get_all_news();
		$data['sidebar'] = $this->news->get_sidebar();
		$this->load->view('news_archive',$data);
	}

	function view()
	{
		$y = $this->uri->segment(2);
		$m = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		$data['sidebar'] = $this->news->get_sidebar();
			
		if($id != '')
		{
			$data['news'] = $this->news->get_news_by_title($id);
			$this->load->view('news_archive',$data);
		} 
		elseif($m != '')
		{
			$data['news'] = $this->news->get_news_by_date($y,$m);
			$this->load->view('news_archive',$data);
		}
		elseif($y != ''){
			$data['news'] = $this->news->get_all_news();
			$this->load->view('news_archive',$data);
		}
	}
	

}