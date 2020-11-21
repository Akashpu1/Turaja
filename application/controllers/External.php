<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class External extends CI_Controller {

  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('common_model');
  	}

    public function auto_cities() {

        $cities = array_flatten($this->common_model->get_cities());

        $phrase = "";

        if (isset($_GET['phrase'])) {
        	$phrase = $_GET['phrase'];
        }

        $dataType = "json";

        if (isset($_GET['dataType'])) {
        	$dataType = $_GET['dataType'];
        }

        $found_cities = array();

        foreach ($cities as $key => $city) {

        	if ($phrase == "" || stristr($city, $phrase) != false) {
        		array_push($found_cities, $city);
        	}
        }


        switch ($dataType) {

        	case "json":

        		$json = '[';

        		foreach ($found_cities as $key => $city) {
        			$json .= '{"name": "' . $city . '"}';

        			if ($city !== end($found_cities)) {
        				$json .= ',';
        			}
        		}

        		$json .= ']';


        		header('Content-Type: application/json');
        		echo $json;

        		break;

        	case "xml":
        		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
        		$xml .= '<data>';

        		foreach ($found_cities as $key => $city) {
        			$xml .= '<country>' . $city . '</country>';
        		}

        		$xml .= '</data>';


        		header('Content-Type: text/xml');
        		echo $xml;
        		break;

        	default:
        		break;

        }
    }

    public function auto_states() {

        $states = array_flatten($this->common_model->get_states());

        $phrase = "";

        if (isset($_GET['phrase'])) {
        	$phrase = $_GET['phrase'];
        }

        $dataType = "json";

        if (isset($_GET['dataType'])) {
        	$dataType = $_GET['dataType'];
        }

        $found_states = array();

        foreach ($states as $key => $state) {

        	if ($phrase == "" || stristr($state, $phrase) != false) {
        		array_push($found_states, $state);
        	}
        }


        switch ($dataType) {

        	case "json":

        		$json = '[';

        		foreach ($found_states as $key => $state) {
        			$json .= '{"name": "' . $state . '"}';

        			if ($state !== end($found_states)) {
        				$json .= ',';
        			}
        		}

        		$json .= ']';


        		header('Content-Type: application/json');
        		echo $json;

        		break;

        	case "xml":
        		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
        		$xml .= '<data>';

        		foreach ($found_states as $key => $state) {
        			$xml .= '<country>' . $state . '</country>';
        		}

        		$xml .= '</data>';


        		header('Content-Type: text/xml');
        		echo $xml;
        		break;

        	default:
        		break;

        }
    }


    public function datayuge() {
      if ($_GET) {
        $result = callAPI('GET', IFSC_API . $_GET['search'], false, IFSC_API_KEY);
        $response = json_decode($result, true);
        if (isset($response['errors'])) {
          // code...
          echo json_encode($response['errors']);
        }else{
          echo json_encode($response);
        }
      }
    }


  	public function get_cities(){
  		if ($_GET) {
  			$subject=$this->security->xss_clean($_GET);
  			$data = $this->common_model->get_cities_by_name($subject['search']);
  			echo json_encode($data);
  		}
  	}
  	public function get_states(){
  		if ($_GET) {
  			$subject=$this->security->xss_clean($_GET);
  			$data = $this->common_model->get_states_by_name($subject['search']);
  			echo json_encode($data);
  		}
  	}



}
