<?php

class Lyttonmain extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['content'] = 'index';
        $this->load->view('templates/template', $data);
    }

    public function sendmail() {
//if "email" variable is filled out, send email
        if (isset($_REQUEST['email'])) {

            //Email information
            $admin_email = "info@lyttonsprings.co.ke";
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $subject = $_REQUEST['subject'];
            $phone = $_REQUEST['phone'];
            $message = $_REQUEST['message'];

            //send email
            @mail($admin_email, $subject, $message . "\nFROM: " . $email . " \nNAME: " . $name. " \nPHONE: " . $phone);

            //Email response
            //$this->load->view('status_pages/success_websitemail');
            echo 'Message sent successfully';
        }

        //if "email" variable is not filled out, display the form
        else {
            //$this->load->view('status_pages/failed_websitemail');
            echo 'There was a problem sending your message, please try again later.';
        }
    }

}
