<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*** Error Controller*/
class Errors extends CI_Controller {

    /**
     * Page function to provide 404 response.
     */
    public function show_404() {

		// echo "erorr 404";
    $this->load->view('errors/cli/error_404');

        # Setting response header as 404
//        $this->output->set_status_header('404');

        # Load the error view page form views folder (applications/views/error_page_404.php).
//        $this->load->view('error_page_404');
    }

}

?>
