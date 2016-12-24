<?php

class Realestate_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

		public function get_objects($objid = FALSE)
		{
		        if ($objid === FALSE)
		        {
		                $query = $this->db->where(array('owner_id' => $this->session->owner_id))->order_by('modification', 'DESC')->get('realestate');
		                return $query->result_array();
		        }

		        $query = $this->db->from('realestate')->where(array('objid' => $objid, 'owner_id' => $this->session->owner_id))->get();
		        return $query->row_array();
		}

		public function remove_objects($objid = FALSE)
		{
		        if ($objid === FALSE)
		        {
		        		return false;
		        } else {
		        	$sql = 'DELETE FROM realestate WHERE objid = ' . $objid . ' AND owner_id = ' . $this->session->owner_id;
					$query = $this->db->query( $sql );
			        return true;
		        }
		}

		public function set_objects($data = null)
		{
		    //$this->load->helper('url');

			// enlarge rent gross if parameters are set TODO
			//if ( $this->input->post('freerent') == 1 ) { }

			if ( $this->input->post('kitchen') == 1 ) 
				$kitchen = 1;
			else 
				$kitchen = 0;

			if ( !isset( $data['rei']['mainimage'] ) ) $data['rei']['mainimage'] = '';
			
		    $data = array(
		        //'objid' => $objid,
		        'title' => $this->input->post('title'),		        
		        'description' => $this->input->post('description'),
		        'street' => $this->input->post('street'),
		        'zip' => $this->input->post('zip'),
		        'city' => $this->input->post('city'),
		        'country' => $this->input->post('country'),
		        'purchaseprice' => $this->input->post('purchaseprice'),
		        'purchasepricenet' => $this->input->post('purchasepricenet'),
		        'size' => $this->input->post('size'),
		        'outdoorspace' => $this->input->post('outdoorspace'),
		        'renovationprice' => $this->input->post('renovationprice'),
		        'equityratio' => $this->input->post('equityratio'),
		        'freerent' => $this->input->post('freerent'),
		        'goodlocation' => $this->input->post('goodlocation'),
		        'attic' => $this->input->post('attic'),
		        'patio' => $this->input->post('patio'),
		        'publictransport' => $this->input->post('publictransport'),
		        'garage' => $this->input->post('garage'),
		        'rentgross' => $this->input->post('rentgross'),
		        'kitchen' => $kitchen,
		        'overheads' => $this->input->post('overheads'),
		        'reserve' => $this->input->post('reserve'),
		        'vatreduction' => $this->input->post('vatreduction'),
		        'link' => $this->input->post('link'),
		        'createdate' => $this->input->post('createdate'),
		        'modification' => date("Y-m-d",time()),
		        'agent' => $this->input->post('agent'),
		        'mainimage' => $data['rei']['mainimage'],
		        'rating' => $this->input->post('rating'),
		        'taxpercent' => str_replace( ',', '.', $this->input->post('taxpercent')),
		        'depreciationpercent' => str_replace( ',', '.', $this->input->post('depreciationpercent')),
		        'loanregistrypercent' => str_replace( ',', '.', $this->input->post('loanregistrypercent')),
		        'purchasetax' => str_replace( ',', '.', $this->input->post('purchasetax')),	
		        'lawyerpercent' => str_replace( ',', '.', $this->input->post('lawyerpercent')),
		        'owner_id' => $this->session->owner_id
		    );

		    $this->db->insert('realestate', $data);
		    
		    return $this->db->insert_id();
		}	

		public function update_objects($objid = FALSE, $data)
		{
			$this->config->load('config_custom');

	        // get values from config
			$rate = $this->config->item('rate'); 

			// reset agent price
			if ( $this->input->post('agent_default') == 1 ) 
				$agent = $this->input->post('purchaseprice') * $rate['agent']; 
			else 
				$agent = $this->input->post('agent');
			
			if ( $this->input->post('kitchen') == 1 ) 
				$kitchen = 1;
			else 
				$kitchen = 0;
			
			if ( !isset( $data['rei']['mainimage'] ) ) $data['rei']['mainimage'] = '';

		    $data = array(
		        'title' => $this->input->post('title'),		        
		        'description' => $this->input->post('description'),
		        'street' => $this->input->post('street'),
		        'zip' => $this->input->post('zip'),
		        'city' => $this->input->post('city'),
		        'country' => $this->input->post('country'),
		        'purchaseprice' => $this->input->post('purchaseprice'),
		        'purchasepricenet' => $this->input->post('purchasepricenet'),
		        'size' => $this->input->post('size'),
		        'outdoorspace' => $this->input->post('outdoorspace'),
		        'renovationprice' => $this->input->post('renovationprice'),
		        'equityratio' => $this->input->post('equityratio'),
		        'freerent' => $this->input->post('freerent'),
		        'goodlocation' => $this->input->post('goodlocation'),
		        'attic' => $this->input->post('attic'),
		        'patio' => $this->input->post('patio'),
		        'publictransport' => $this->input->post('publictransport'),
		        'garage' => $this->input->post('garage'),
		        'kitchen' => $kitchen,
		        'rentgross' => $this->input->post('rentgross'),
		        'overheads' => $this->input->post('overheads'),
		        'reserve' => $this->input->post('reserve'),
		        'vatreduction' => $this->input->post('vatreduction'),
		        'link' => $this->input->post('link'),
		        'createdate' => $this->input->post('createdate'),
		        'modification' => date("Y-m-d",time()),
		        'agent' => $agent,
		        'mainimage' => $data['rei']['mainimage'],
		        'rating' => $this->input->post('rating'),
		        'taxpercent' => str_replace( ',', '.', $this->input->post('taxpercent')),
		        'depreciationpercent' => str_replace( ',', '.', $this->input->post('depreciationpercent')),
		        'loanregistrypercent' => str_replace( ',', '.', $this->input->post('loanregistrypercent')),
		        'purchasetax' => str_replace( ',', '.', $this->input->post('purchasetax')),	
		        'lawyerpercent' => str_replace( ',', '.', $this->input->post('lawyerpercent'))
		    );

			$this->db->where( 'objid', $objid );
			$this->db->update( 'realestate', $data );
		    
		    return true;
		}			

		public function update_kpis_objects($objid = FALSE, $data)
		{

		    $data = array(
		        'cashflow' => $data['rei']['cashflow'],		        
		        'earnings' => $data['rei']['earnings'],
		        'yield' => $data['rei']['yield']
		    );

			$this->db->where( 'objid', $objid );
			$this->db->update('realestate', $data);
		    
		    return true;
		}	

		public function get_objects_value_sum()
		{
			/*
			$this->db->select_sum( 'purchaseprice' );
			$data = $this->db->get('realestate');
			*/

			if ( isset( $this->session->owner_id ) ) {
				$query = $this->db->query( 'SELECT sum(purchaseprice) AS sumpurchaseprice FROM realestate WHERE owner_id = ' . $this->session->owner_id );
				return $query->row_array();
			} else
				return false;
		}		

}
