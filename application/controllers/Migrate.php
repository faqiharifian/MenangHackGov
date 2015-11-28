<?php

class Migrate extends CI_Controller
{

        public function index($version = FALSE)
        {
                $this->load->library('migration');

                if($version === FALSE)
                {

	                if ($this->migration->latest() === FALSE)
	                {
	                    show_error($this->migration->error_string());
	                }
	                else
	                {
	                	echo 'success';
	                }
	            }
	            else
	            {
	            	if($this->migration->version($version) === FALSE)
	            	{
	            		show_error($this->migration->error_string());
	            	}
	            	else
	                {
	                	echo 'success';
	                }
	            }
        }

}