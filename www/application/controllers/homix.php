<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Homix extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
			redirect(site_url());
	}
	
	function modifica()
	{
	    $bec = $this->uri->segment(2);
		$valoare = $this->uri->segment(3);
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			shell_exec('echo "bec'.$bec.',AnalogWrite,'.$bec.','.$valoare.'" > /dev/ttyACM0');
			redirect(site_url());
		}
	}
	
	function webcam()
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('');
		}  else {
		if($this->agent->is_mobile()): 
			echo '<img src="http://192.168.0.101:8081" width="300" />';
		else:
			echo '<img src="http://192.168.0.101:8081" height="500" width="600" />';
		endif;
		}
	}
	function webcamail()
    {
		$user_id	= $this->tank_auth->get_user_id();
		$username	= $this->tank_auth->get_username();
		$email	= $this->tank_auth->get_email();
        $this->email->from('homix@gmail.com', 'HomiX');
        $this->email->to(''.$email.''); 

        $this->email->subject('HomiX Webcam Mail');
        $this->email->message('<img src="http://192.168.0.101:8081" />');  

        $this->email->send();

       //echo $this->email->print_debugger();
	   redirect(site_url()); 

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */