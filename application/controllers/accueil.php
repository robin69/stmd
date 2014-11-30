<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
		 parent::__construct();
	 }

	
	
	 public function index()
	 {
		$this->_layout('accueil');
	}



    public function get_gmjnews()
    {
    
    	$this->load->library('rssparser');
        try{
            
            $this->rssparser->set_feed_url("http://www.gmjphoenix.com/reglementation-matieres-dangereuses/feed/");
            $this->data["rss"] = $this->rssparser->set_feed_url('http://www.gmjphoenix.com/reglementation-matieres-dangereuses/feed/')->set_cache_life(30)->getFeed(6);
        }catch(Exception $e){
            $this->data["rss"] = FALSE;
        }



        //var_dump($this->data["rss"]);

    }
	
	
	
	
	
	private function _layout($layout)
	{
        $this->get_gmjnews();
		$this->data["no_google_map"] = TRUE;
		$this->data["body_id"] = "landing_page";
		$this->layout->view("_html_head", 	$this->data);
		
		$this->layout->view($layout, $this->data);
		$this->layout->view("_html_foot");
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */