<?php

class Realestate extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('realestate_model');
            $this->load->helper('url_helper');
        }

		public function index()
		{
	        $data['realestate'] = $this->realestate_model->get_objects();

	        $this->load->view('templates/header');
	        $this->load->view('realestate/index', $data);
	        $this->load->view('templates/footer');
		}

		public function view($objid = NULL)
		{
			$this->config->load('config_custom');

	        $data = $this->realestate_model->get_objects($objid);

	        if (empty($data))
	        {
	                //show_404();
	        		die("ID not found. - view");
	        }

	        // get values from config
			$rate = $this->config->item('rate'); 

	        // show agentprice
			if ( $data['agent'] == null ) 
			{ 
				$data['agentprice'] = $data['purchaseprice'] * $rate['agent'];
			} else 
				$data['agentprice'] = $data['agent'];

			// notary
			$data['notary'] = $data['purchaseprice'] * $rate['notary'];

			// land registry
			$data['landregistry'] = $data['purchaseprice'] * $rate['landregistry'];

			if ( $data['equityratio'] < 1 ) { 
				$data['loanregistrycost'] = $data['purchaseprice'] * $rate['loan'];
			} else 
				$data['loanregistrycost'] = 0;

			$data['total_size'] = $data['size'] + ( $data['outdoorspace'] / 2 );

			$data['total_price'] = $data['purchaseprice'] + $data['renovationprice'] + $data['agentprice'] + $data['notary'] + $data['landregistry'] + $data['loanregistrycost'];                              

			$data['price_per_m2_exclgarage'] = ( $data['total_price'] - $data['garage'] ) / $data['size'];
			$data['price_per_m2_incloutdoor'] = ( $data['total_price'] - $data['garage'] ) / $data['total_size'];
			$data['price_per_m2'] = $data['total_price'] / $data['size'];

			// calculate avg price in this location
			$avg_price = $this->config->item('buy');
			$zip = $data['zip'];

			if ( $data['total_size'] < 51 )
					$choose_buy_rate = 50;
			else
					$choose_buy_rate = 0;

			if ( isset( $avg_price[$zip][$choose_buy_rate] ) ) {
	  			$data['total_price_diff'] = ( $data['total_price'] - $data['garage'] ) / $data['total_size']; 
  				$data['diff_price'] = $avg_price[$zip][$choose_buy_rate] - $data['total_price_diff'];
  				$data['avg_price'] = $avg_price[$zip][$choose_buy_rate];
  			}

  			// Sum of equity
			$data['equitysum'] = $data['total_price'] * $data['equityratio'];
			$data['loansum'] = $data['total_price'] - $data['equitysum'];
 
 			// only the loan rates 
			$data['loan_rate'] = ( $data['total_price'] * ( 1 - $data['equityratio'] ) ) * $rate['loan'];                               

			// 30 years, payback of 1.33 times the sum
			$data['capital_payback'] = ( $data['total_price'] * ( 1 - $data['equityratio'] ) ) * 1.33 / 30; 

			// rent gross
			if ( $data['rentgross'] > 0 ) { 
      			$data['rent_gross'] = $data['rentgross']; $data['addit'] = ' €';
			} else {
      			// standard rent size 9,- EUR + 2,- EUR
      			$data['rent_gross'] = $data['size'] * (9+2); 
      			$data['rentgross'] = $rent_gross; 
      			$data['addit'] = ' € (estim.)'; 
  			}

  			// overheads
			if ( $data['overheads'] > 0 ) { 
			    	$data['overheads_curr'] = number_format($data['overheads'], 2, '.', ',') . ' €'; 
			} else {
					// estimate overheads 2,- EUR
			      	$data['overheads_curr'] = number_format( ($data['size'] * $rate['overheads']), 2, '.', ',' ) . ' € (estim.)'; 
			      	$data['overheads'] = $data['size'] * $rate['overheads'];
			}

			$data['rent_net'] = $data['rentgross'] - $data['overheads'] - $data['reserve']; 
			$data['rent_net_tax'] = $data['rent_net'] / 1.1 * 0.1;
			$data['rent_net'] = $data['rent_net'] / 1.1;

			$data['rent_net_per_m2'] = $data['rent_net'] / $data['total_size'];

			$rent_price = $this->config->item('rent');
			$zip = $data['zip'];

			if ( isset( $rent_price[$zip]['0'] ) || isset( $rent_price[$zip]['50'] ) ) {
			  if ( isset( $rent_price[$zip]['50'] ) && $data['size'] > 50 ) {
			        $data['alt_rent'] = $data['total_size'] * $rent_price[$zip]['50'];
			        $data['rent_rate'] = $rent_price[$zip]['50'];
			  } elseif ( isset( $rent_price[$zip]['0'] ) ) {
			        $data['alt_rent'] = $data['total_size'] * $rent_price[$zip]['0'];
			        $data['rent_rate'] = $rent_price[$zip]['0'];
			  } 
			}

			$data['diff_rent'] = $data['rentgross'] - $data['alt_rent']; 

			$data['yield'] = ($data['rent_net'] * 12) / $data['total_price'] * 100;

			$data['risk'] = $data['rent_net'] * 0.05 * 12; // risk 5%

			// 1 EUR per m2
			$data['refurb'] = $data['size'] * 12;

			if ( isset ( $data['purchasepricenet'] ) ) {
				// 20 years depreciation
			  	$data['vat_red'] = ( $data['purchaseprice'] - $data['purchasepricenet'] ) / 20;
			} else {
			 	$data['vat_red'] = $data['purchaseprice'] / 1.2 * 0.01;
			}

			// 60% of price is for building, other for "ground"
			$data['depreciation'] = $data['purchaseprice'] * 0.6 * 0.015; // in case of old buildings it can be 2%	

			$data['profite'] = ($data['rent_net'] * 12) - $data['depreciation'] - $data['loan_rate'];

			$data['taxes'] = $data['profite'] * 0.25;

			$data['earnings'] = ( $data['profite'] * 0.75 + $data['vat_red'] + $data['depreciation'] ); 

			$data['refinancing'] = $data['total_price'] / $data['earnings']; 
			$data['refinancing2'] = $data['total_price'] / ($data['earnings'] + $data['loan_rate']);

			$data['cashflow'] = ($data['rent_net'] * 12) + $data['vat_red'] - ($data['profite'] * 0.25) - $data['capital_payback']; 

			$data['cashflow2'] = $data['cashflow'] - $data['risk'] - $data['refurb']; 

			$data['roi'] = $data['cashflow2'] / ( $data['cashflow2'] + $data['rent_net'] * 12 ); 

			$data2['rei'] = $data;
			unset($data); $data = $data2;

	        $this->load->view('templates/header');
	        $this->load->view('realestate/view', $data);
	        $this->load->view('templates/footer');
		}     

		public function delete($objid = NULL)
		{
	        $data['rei'] = $this->realestate_model->remove_objects($objid);

        	$data['realestate'] = $this->realestate_model->get_objects();	
        	$this->load->view('templates/header');	        		        
	        $this->load->view('realestate/index', $data);
        	$this->load->view('templates/footer');		        
		}     

		public function edit($objid = NULL)
		{
			$this->config->load('config_custom');

		    $this->load->helper('form');
		    $this->load->library('form_validation');

	        $data['rei'] = $this->realestate_model->get_objects($objid);

	        if (empty($data['rei']))
	        {
	                //show_404();
	        		die("ID not found. - edit");
	        }

	        $data['rei']['update'] = true;

 	        $this->load->view('templates/header');
	        $this->load->view('realestate/create', $data);
	        $this->load->view('templates/footer');
		} 

		public function create()
		{
		    $this->load->helper('form');
		    $this->load->library('form_validation');

		    $data['rei'] = $this->input->post();

		    $this->form_validation->set_rules('title', 'Title', 'required');
		    $this->form_validation->set_rules('purchaseprice', 'Purchase price', 'required');
		    $this->form_validation->set_rules('zip', 'ZIP', 'required');
		    $this->form_validation->set_rules('country', 'Country', 'required');
		    $this->form_validation->set_rules('size', 'Size', 'required');
		    $this->form_validation->set_rules('equityratio', 'Equity ratio', 'required');

		    if ( isset( $data['rei']['link'] ) ) {
					$sites_html = @file_get_contents($data['rei']['link']);

					$htmlDOM = new DOMDocument();
					@$htmlDOM->loadHTML($sites_html);
					$meta_og_img = null;
					//Get all meta tags and loop through them.
					foreach($htmlDOM->getElementsByTagName('meta') as $meta) {
					    //If the property attribute of the meta tag is og:image
					    if($meta->getAttribute('property')=='og:image'){ 
					        //Assign the value from content attribute to $meta_og_img
					        $meta_og_img = $meta->getAttribute('content');
					    }
					}
					$data['rei']['mainimage'] = $meta_og_img;
		    }

		    if ($this->form_validation->run() === FALSE)
		    {
		        $this->load->view('templates/header');
		        $this->load->view('realestate/create', $data);
		        $this->load->view('templates/footer');

		    }
		    else
		    {
		        $this->realestate_model->set_objects($data);
	        	
	        	$data['realestate'] = $this->realestate_model->get_objects();	
	        	$this->load->view('templates/header');	        		        
		        $this->load->view('realestate/index', $data);
	        	$this->load->view('templates/footer');		        
		    }
		}	

		public function update()
		{

		    $this->load->helper('form');
		    $this->load->library('form_validation');

		    $data['rei'] = $this->input->post();

		    $this->form_validation->set_rules('title', 'Title', 'required');
		    $this->form_validation->set_rules('purchaseprice', 'Purchase price', 'required');
		    $this->form_validation->set_rules('zip', 'ZIP', 'required');
		    $this->form_validation->set_rules('country', 'Country', 'required');
		    $this->form_validation->set_rules('size', 'Size', 'required');
		    $this->form_validation->set_rules('equityratio', 'Equity ratio', 'required');

		    if ( isset( $data['rei']['link'] ) ) {
					$sites_html = @file_get_contents($data['rei']['link']);

					$htmlDOM = new DOMDocument();
					@$htmlDOM->loadHTML($sites_html);
					$meta_og_img = null;
					//Get all meta tags and loop through them.
					foreach($htmlDOM->getElementsByTagName('meta') as $meta) {
					    //If the property attribute of the meta tag is og:image
					    if($meta->getAttribute('property')=='og:image'){ 
					        //Assign the value from content attribute to $meta_og_img
					        $meta_og_img = $meta->getAttribute('content');
					    }
					}
					$data['rei']['mainimage'] = $meta_og_img;
		    }

		    if ($this->form_validation->run() === FALSE)
		    {
		        $this->load->view('templates/header');
		        $this->load->view('realestate/update', $data);
		        $this->load->view('templates/footer');

		    }
		    else
		    {
		        $this->realestate_model->update_objects($data['rei']['objid'],$data);
	        	
	        	$data['realestate'] = $this->realestate_model->get_objects();	

	        	$this->load->view('templates/header');	        		        
		        $this->load->view('realestate/index', $data);
	        	$this->load->view('templates/footer');		        
		    }
		}		   

}

