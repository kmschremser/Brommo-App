<?php

class Realestate extends CI_Controller {

        public function __construct()
        {
            parent::__construct();

            $this->load->model('realestate_model');
            $this->load->helper('url_helper');
			$this->load->library('session');
			$this->config->load('config_custom');

			$this->language();
			$this->global_data = $this->realestate_model->get_objects_value_sum();

        }

        public function language($lang = null)
        {
	        //Get the selected language
	        // Get from session!!
	        if ( $lang != null ) 
	         	$language = $lang;
	        elseif ( isset( $this->session->language ) )
	        	$language = $this->session->language;
			else
				$language = "en";

	        //Choose language file according to selected lanaguage
	        if ( $language == "de" ) {
	            $this->lang->load('german_lang','german');
	        	$this->session->language = 'de';
	        } else
	        {
	         	$this->lang->load('english_lang','english');
	         	$this->session->language = 'en';
	        }
			
        }

        public function check_auth() 
        {
        	// very basic session checking
        	if ( $this->session->user_id > 0 ) {
        		// everything is fine
        		if ( !isset( $this->session->owner_id ) ) {
        			$this->session->owner_id = $this->session->user_id;
        		}	
        	} else 
        	{
        		redirect('auth/login');
				die();
			}
			return $this->session->user_id;

        }

		public function list_reobjects()
		{
			$auth_user = $this->check_auth();

			$param1 = $this->uri->segment(3, 0);

			// check this first to get the right language
			if ( "$param1" === "de" ) {
				$this->language('de');
			} elseif ( "$param1" === "en" ) {
				$this->language('en');
			} else {
				$this->language();
			}	

	        $data['realestate'] = $this->realestate_model->get_objects();
			
			$data['CURRENCY'] = $this->config->item('currency');
			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');

	        $this->load->view('templates/header', $data);
	        $this->load->view('realestate/list_reobjects', $data);
	        $this->load->view('templates/footer', $data);
		}

		public function view_reobjects($objid = NULL)
		{
			$auth_user = $this->check_auth();

	        // get values from config
			$rate = $this->config->item('rate'); 
			$avg_price = $this->config->item('buy');	

	        $data = $this->realestate_model->get_objects($objid);

	        if (empty($data))
	        {
	                show_404();
	        		die("ID not found. - view");
	        }
	        
			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');
			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['CURRENCY'] = $this->config->item('currency');
			$data['sizeunit'] = $this->config->item('sizeunit');

	        $data['rei'] = $this->calculate_kpi( $data, $rate, $avg_price);

			//$data['rei'] = $data; 
			
			// save KPIs
 			if ( isset( $objid ) ) $this->realestate_model->update_kpis_objects($objid, $data);

	        $this->load->view('templates/header', $data);
	        $this->load->view('realestate/view_reobjects', $data);
	        $this->load->view('templates/footer', $data);
		}     

		public function delete_reobjects($objid = NULL)
		{
			$auth_user = $this->check_auth();

	        $data['rei'] = $this->realestate_model->remove_objects($objid);

			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');
			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['CURRENCY'] = $this->config->item('currency');

        	$data['realestate'] = $this->realestate_model->get_objects();	

        	$this->load->view('templates/header', $data);	        		        
	        $this->load->view('realestate/list_reobjects', $data);
        	$this->load->view('templates/footer', $data);		        
		}     

		public function edit_reobjects($objid = NULL)
		{
			$auth_user = $this->check_auth();

		    $this->load->helper('form');
		    $this->load->library('form_validation');

	        $data['rei'] = $this->realestate_model->get_objects($objid);

	        if (empty($data['rei']))
	        {
	                //show_404();
	        		die("ID not found. - edit");
	        }

	        // get values from config
			$data['rei']['rate'] = $rate = $this->config->item('rate'); 
			$avg_price = $this->config->item('buy');	

			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');
			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['CURRENCY'] = $this->config->item('currency');

			$data['sizeunit'] = $this->config->item('sizeunit');

	        $data['rei']['update'] = true;

 	        $this->load->view('templates/header', $data);
	        $this->load->view('realestate/create_reobjects', $data);
	        $this->load->view('templates/footer', $data);
		} 

		public function create_reobjects()
		{
			$auth_user = $this->check_auth();

	        // get values from config
			//$rate = $this->config->item('rate'); 
			//$avg_price = $this->config->item('buy');	

		    $this->load->helper('form');
		    $this->load->library('form_validation');

			$data['rei'] = $this->input->post();

	        // get values from config
			$rate = $this->config->item('rate'); 
			$avg_price = $this->config->item('buy');
			$data['rei']['rate'] = $rate;

			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');
			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['CURRENCY'] = $this->config->item('currency');

			$data['sizeunit'] = $this->config->item('sizeunit');			

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
		        $this->load->view('templates/header', $data);
		        $this->load->view('realestate/create_reobjects', $data);
		        $this->load->view('templates/footer', $data);

		    }
		    else
		    {
		        $objid = $this->realestate_model->set_objects($data);
		        
		        // get data for listing
		        unset( $data );

	        	// get last inserted row
	        	$data = $this->realestate_model->get_objects($objid);

				$data['CURRENCY'] = $this->config->item('currency');
				$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');
				$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');

				$data['rei'] = $this->calculate_kpi( $data, $rate, $avg_price);

				// save KPIs
	 			if ( isset( $objid ) ) $this->realestate_model->update_kpis_objects($objid, $data);

	 			$data['realestate'] = $this->realestate_model->get_objects();	

	        	$this->load->view('templates/header', $data);	        		        
		        $this->load->view('realestate/list_reobjects', $data);
	        	$this->load->view('templates/footer', $data);		        
		    }
		}	

		public function update_reobjects()
		{
			$auth_user = $this->check_auth();

	        // get values from config
			$rate = $this->config->item('rate'); 
			$avg_price = $this->config->item('buy');	

		    $this->load->helper('form');
		    $this->load->library('form_validation');

		    $data['rei'] = $this->input->post();

			$data['LANGUAGE_SETTINGS'] = $this->lang->line('LANGUAGE_SETTINGS');
			$data['METADESCRIPTION'] = $this->lang->line('META_DESCRIPTION_INDEX');
			$data['rei']['CURRENCY'] = $data['CURRENCY'] = $this->config->item('currency');

			$data['sizeunit'] = $this->config->item('sizeunit');			

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
		        $this->load->view('templates/header', $data);
		        $this->load->view('realestate/create_reobjects', $data);
		        $this->load->view('templates/footer', $data);

		    }
		    else
		    {
		    	$objid = $data['rei']['objid'];

		        $this->realestate_model->update_objects($objid ,$data);
	        	
				$data['rei'] = $this->calculate_kpi( $data['rei'], $rate, $avg_price);

				// save KPIs
	 			if ( isset( $objid ) ) $this->realestate_model->update_kpis_objects($objid, $data);

	 			$data['realestate'] = $this->realestate_model->get_objects();	

	        	$this->load->view('templates/header', $data);	        		        
		        $this->load->view('realestate/list_reobjects', $data);
	        	$this->load->view('templates/footer', $data);		        
		    }
		}	

		// TODO shouldn't this be private?
		public function calculate_kpi($data, $rate, $avg_price) 
		{
			$auth_user = $this->check_auth();

	        // show agentprice (default is 3.6% right now)
			if ( $data['agent'] == null ) 
			{ 
				$data['agentprice'] = $data['purchaseprice'] * $rate['agent'];
			} else 
				$data['agentprice'] = $data['agent'];

			// notary - take rate from dataset or config
			if ( $data['lawyerpercent'] > 0 ) {
				$data['notary'] = $data['purchaseprice'] * $data['lawyerpercent']/100;	
			} else {
				$data['notary'] = $data['purchaseprice'] * $rate['notary'];	
			}
			

			// land registry - take rate from dataset or config
			if ( $data['purchasetax'] > 0 ) {
				$data['landregistry'] = $data['purchaseprice'] * $data['purchasetax']/100;
			} else {
				$data['landregistry'] = $data['purchaseprice'] * $rate['landregistry'];
			}

			// calculate 1 rate as initial costs for loan (estimate)
			// loan rate is then the same as registry cost
			if ( $data['equityratio'] < 1 ) { 
				if ( $data['loanregistrypercent'] > 0 ) {
					$data['loanregistrycost'] = $data['purchaseprice'] * $data['loanregistrypercent']/100;
				} else {
					$data['loanregistrycost'] = $data['purchaseprice'] * $rate['loan'];
				}
			} else 
				$data['loanregistrycost'] = 0;

			// outdoor space is calculated 50%
			$data['total_size'] = $data['size'] + ( $data['outdoorspace'] / 2 );

			$data['total_price'] = $data['purchaseprice'] + $data['renovationprice'] + $data['agentprice'] + $data['notary'] + $data['landregistry'] + $data['loanregistrycost'];                              
			$data['total_price_net'] = $data['purchasepricenet'] + $data['renovationprice'] + $data['agentprice'] + $data['notary'] + $data['landregistry'] + $data['loanregistrycost'];                              
			$data['vat'] = $data['total_price'] - $data['total_price_net'];

			$data['price_per_m2_exclgarage'] = ( $data['total_price'] - $data['garage'] ) / $data['size'];
			$data['price_per_m2_incloutdoor'] = ( $data['total_price'] - $data['garage'] ) / $data['total_size'];
			$data['price_net_per_m2_incloutdoor'] = ( $data['total_price_net'] - $data['garage'] ) / $data['total_size'];
			$data['price_per_m2'] = $data['total_price'] / $data['size'];

			// calculate avg price in this location
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

  			// sum of equity
			$data['equitysum'] = ( $data['total_price'] -  $data['vat'] ) * $data['equityratio'];
			$data['equityvat'] = $data['vat'];

			$data['loansum'] = $data['total_price'] - $data['equitysum'] - $data['equityvat'];
 
 			// only the loan rates 
			if ( $data['loanregistrypercent'] > 0 ) {
				//$data['loan_rate'] = ( ( $data['total_price']) * ( 1 - $data['equityratio'] ) ) * $data['loanregistrypercent']/100;                               
				$data['loan_rate'] = ( $data['loansum'] ) * $data['loanregistrypercent']/100;                               
			} else {
				//$data['loan_rate'] = ( ( $data['total_price']) * ( 1 - $data['equityratio'] ) ) * $rate['loan'];                               
				$data['loan_rate'] = ( $data['loansum'] ) * $rate['loan'];                               
			}

			// 30 years, payback of 1.33 times the sum
			//$data['capital_payback'] = ( ( $data['total_price']) * ( 1 - $data['equityratio'] ) ) * $rate['paybacktimes'] / $rate['paybackyears']; 
			$data['capital_payback'] = ( $data['loansum'] ) * $rate['paybacktimes'] / $rate['paybackyears']; 

			// rent gross
			if ( $data['rentgross'] > 0 ) { 
      			$data['addit'] = ' ' . $data['CURRENCY'];
      			$data['estimated1'] = '';
			} else {
      			// standard rent size 9,- EUR + 2,- EUR
      			$data['estimated1'] = ' (estim.)';
      			$data['rentgross'] = $data['size'] * ($rate['standardrent']+$rate['overheads']); 
      			$data['addit'] = ' ' . $data['CURRENCY']; 
  			}

  			// overheads
			if ( $data['overheads'] > 0 ) { 
					$data['estimated2'] = '';
			    	$data['overheads_curr'] = number_format($data['overheads'], 2, '.', ',') . ' ' . $data['CURRENCY']; 
			} else {
					// estimate overheads 2,- 
					$data['estimated2'] = ' (estim.)';
			      	$data['overheads_curr'] = number_format( ($data['size'] * $rate['overheads']), 2, '.', ',' ) . ' ' . $data['CURRENCY']; 
			      	$data['overheads'] = $data['size'] * $rate['overheads'];
			}

			$data['overheads_ratio'] = round( $data['overheads'] / $data['rentgross'] * 100 );
			$data['reserve_ratio'] = round( $data['reserve'] / $data['rentgross'] * 100 );

			$data['rent_net'] = $data['rentgross'] - $data['overheads'] - $data['reserve']; 
			if ( $data['taxpercent'] > 0 ) {
				$data['taxtotal'] = 1 + $data['taxpercent']/100;
				$data['renttax'] = $data['taxpercent']/100;
			} else {
				$data['taxtotal'] = 1.1;
				$data['renttax'] = 0.1;
			}

			$data['rent_net_tax'] = $data['rent_net'] / $data['taxtotal'] * $data['renttax'];
			$data['rent_net'] = $data['rent_net'] / $data['taxtotal'];

			$data['rent_net_tax_ratio'] = round( $data['rent_net_tax'] / $data['rentgross'] * 100 );
			$data['rent_net_per_m2'] = $data['rent_net'] / $data['total_size'];

			$data['rent_net_ratio'] = round( $data['rent_net'] / $data['rentgross'] * 100 );

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
			} else {
				$data['alt_rent'] = $data['total_size'] * 6;
				$data['rent_rate'] = 6;
			}

			$data['diff_rent'] = $data['rentgross'] - $data['alt_rent']; 

			$data['yield'] = ($data['rent_net'] * 12) / $data['total_price'] * 100;

			$data['risk'] = $data['rent_net'] * $rate['risk'] * 12; // risk 5%

			// 1 EUR per m2
			$data['refurb'] = $data['size'] * $rate['refurbishrate'] * 12;

			if ( isset ( $data['purchasepricenet'] ) ) {
				// 20 years depreciation
			  	$data['vat_red'] = ( $data['purchaseprice'] - $data['purchasepricenet'] ) / 20;
			} else {
			 	$data['vat_red'] = $data['purchaseprice'] / 1.2 * 0.01;
			}

			// 60% of price is for building, other for "ground"
			if ( $data['depreciationpercent'] > 0 ) {
				$data['depreciation'] = $data['purchaseprice'] * 0.6 * $data['depreciationpercent']/100; // in case of old buildings it can be 2%	
			} else {
				$data['depreciation'] = $data['purchaseprice'] * 0.6 * $rate['depreciation']; // in case of old buildings it can be 2%	
			}

			$data['profite'] = ($data['rent_net'] * 12) - $data['depreciation'] - $data['loan_rate'];

			if ( $data['profite'] > 0 ) $data['taxes'] = $data['profite'] * $rate['profitetax'];
			else $data['taxes'] = 0;

			$data['earnings'] = ( $data['profite'] - $data['taxes'] + $data['vat_red'] + $data['depreciation'] ); 

			$data['refinancing'] = $data['total_price'] / $data['earnings']; 
			//$data['refinancing2'] = $data['total_price'] / ($data['earnings'] + $data['loan_rate']);

			$data['cashflow'] = ($data['rent_net'] * 12) + $data['vat_red'] - $data['taxes'] - $data['capital_payback']; 

			$data['cashflow2'] = $data['cashflow'] - $data['risk'] - $data['refurb']; 

			$data['roi'] = $data['cashflow2'] / ( $data['cashflow2'] + $data['rent_net'] * 12 ); 

			return $data;			
		}
}

