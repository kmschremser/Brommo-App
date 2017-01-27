<?php

class Auth_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

		public function get_user($objid = FALSE)
		{
		        if ($objid === FALSE)
		        {
		                die("no user found.");
		        }

		        $query = $this->db->from('users')->where(array('objid' => $objid))->get();
		        return $query->row_array();
		}

		public function get_user_by_email($email = FALSE)
		{
		        if ($email === FALSE)
		        {
		                die("no user found.");
		        }

		        $query = $this->db->from('users')->where(array('email' => $email))->get();
		        //print_r($query->row_array());
		        return $query->row_array();
		}

		public function activate_user($objid = FALSE)
		{
		        if ($objid === FALSE)
		        {
		                die("no user found.");
		        }

		        $query = $this->db->query('UPDATE users SET activated = 1 WHERE objid = ' . $objid );
			    return true;
		}

		public function remove_user($objid = FALSE)
		{
		        if ($objid === FALSE)
		        {
		        		return false;
		        } else {
					$query = $this->db->query('DELETE FROM users WHERE objid = ' . $objid );
			        return true;
		        }
		}

		public function register_user($data = null)
		{
		    $this->load->helper('url');

		    $objid = "";

		    $SERVERHOST = $data['SERVERHOST'];

		    $data = array(
		        'objid' => $objid,
		        'firstname' => $this->input->post('firstname'),
		        'email' => $this->input->post('email'),
		        'password' => crypt( $this->input->post('password'), $data['SALT']),
		        'newsletter' => $this->input->post('newsletter'),
		        'activated' => 0,
		        'language' => $data['LANGUAGE_SETTINGS'],
		        'owner_id' => 0
		    );

		    $this->db->insert('users', $data);
		    $iid = $this->db->insert_id();

		    if ( isset( $this->session->invitation_id ) && $this->session->invitation_id > 0 ) {
		    	$owner_id = $this->session->invitation_id;
			} else {
				$owner_id = $iid;
			}	

		    $result = $this->db->query('UPDATE users SET owner_id = ' . $owner_id . ' WHERE objid = ' . $iid );

		    $activation_url = $SERVERHOST . '/brommo/index.php?auth/login/' . md5($this->input->post('email')) . '/' . $iid;
		    //$activation_url = $activation_url . "\n\n" . crypt( $this->input->post('password'), $data['SALT'] ) . "\n\n" . ( $this->input->post('password') ) . "\n\n";

		    $headers    = "Content-Type: text/plain; charset=utf-8\n";
			$headers    .= "From: BrommoAPP <no-reply@brommoapp.com>\n";
			$recipient  = $this->input->post('email');
			$subject    = $this->lang->line('register_subject');
			$message = $this->lang->line('register_mail_body_part0').' '.$this->input->post('firstname').$this->lang->line('register_mail_body_part1').$activation_url.$this->lang->line('register_mail_body_part2');
			$message    = wordwrap($message, 1024);

			mail($recipient, $subject, $message, $headers);

		    return $iid;
		}	

		public function send_passwordforgotten($data = null)
		{
		    $this->load->helper('url');

		    $SERVERHOST = $data['SERVERHOST'];

		    if ( isset( $data['validation']['email'] ) )  
		    {
		    	$data['return_message'] = $this->lang->line('return_message_forgottenpw');

		    	$query = $this->db->from('users')->where(array('email' => $data['validation']['email']))->get();
		        $return = $query->row_array();

		    	if ( isset( $return['objid'] ) ) 
		    	{
		    		$iid = $return['objid'];
		    		$new_pw_url = $SERVERHOST . '/brommo/index.php?auth/passforgotten/' . md5($data['validation']['email']) . '/' . $iid;

		    		$headers    = "Content-Type: text/plain; charset=utf-8\n";
					$headers    .= "From: BrommoAPP <no-reply@brommoapp.com>\n";
					$recipient  = $data['validation']['email'];
					$subject    = $this->lang->line('new_pw_subject');
					$message = $this->lang->line('pwforgotten_mail_body_part0').' '.$this->input->post('firstname').$this->lang->line('pwforgotten_mail_body_part1').$new_pw_url.$this->lang->line('pwforgotten_mail_body_part2');
					$message    = wordwrap($message, 1024);

					mail($recipient, $subject, $message, $headers);
		    	}
		    }

		    return $data;
		}	

		public function update_passwordforgotten($data = null)
		{
		    $this->load->helper('url');

		    $SERVERHOST = $data['SERVERHOST'];

		    if ( isset( $data['validation']['password'] ) )  
		    {
		    	$data['return_message'] = $this->lang->line('return_message_forgottenpw_final');

		    	//$query = $this->db->from('users')->where(array('email' => $data['validation']['email']))->get();
		        //$return = $query->row_array();

			    $update_data = array(
			        'password' => crypt( $data['validation']['password'], $data['SALT'] )
			    );

				$this->db->where( 'objid', $data['objid'] );
				$this->db->update( 'users', $update_data );
				$data['no_further_checks'] = true;
		    }

		    return $data;
		}

		public function update_user($objid = FALSE, $data)
		{
			//$this->config->load('config_custom');

			// TODO check for correct email
			// password can only reset via password forgotten
		    $data = array(
		        'firstname' => $this->input->post('firstname'),
		        'newsletter' => $this->input->post('newsletter'),
		    );

			$this->db->where( 'objid', $objid );
			$this->db->update( 'users', $data );
		    
		    return true;
		}			

}