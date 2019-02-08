<?php
	
	include('Rest.inc.php');
	include('../fn_client.php');
	include('../fn_decaissement.php');
	include('../fn_decaissement_m1.php');
	include('../fn_demande.php');
	include('../fn_engagement.php');
	include('../fn_impaye.php');
	include('../fn_impaye_det.php');
	include('../fn_liste_ech_auj.php');
	include('../fn_liste_ech_fut.php');
	include('../fn_portfeuille.php');
	include('../fn_repect_ech_m.php');
	include('../fn_repect_ech_m1.php');
	include('../fn_suivi_crm.php');
	include('../lst_visit_orbit.php');
	include('../crm_orbit_suivi.php');
	include('../fonctions.php');
	/* Rapport Maturité 08/02/2016*/
	include('../fn_maturite_40.php');
	/*29.04.2016 Notification*/
	include('../fn_show_notif.php');
	/*07/10/2016 reporting_crm_hebdo.php*/
	include('../reporting_crm_hebdo.php');
	
	include('../lst_r_abondan.php');
	include('../lst_r_clients_credit_complem.php');
	
	class API extends REST {
	
		public function __construct(){
			parent::__construct();				
							
		}

		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404);			
		}
	/*Liste des Impayes*/
		private function liste_impaye(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=impaye();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste des suivi CRM*/
		private function suivi_crm(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=suivi_crm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function suivi_orbit(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=suivi_orbit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function crm_orbit(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=crm_orbit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste des Impayes détaillé*/
		private function liste_impaye_det(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=impaye_det();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste des demandes*/
		private function liste_demande(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=demande();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste des clients*/
		private function liste_clt(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=client();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste des engagements*/
		private function liste_eng(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=engagement();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste portfeuille*/
		private function portfeuille(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=portfeuille();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste ech auj*/
		private function liste_ech_auj(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_ech_auj();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste respect ech m-1*/
		private function repect_ech_m1(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=repect_ech_m1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste respect ech m*/
		private function repect_ech_m(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=repect_ech_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste ech future*/
		private function liste_ech_fut(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_ech_fut();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste décaissement*/
		private function decaissement(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=decaissement();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste décaissement m-1*/
		private function decaissement_m1(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=decaissement_m1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste nb_la_pending*/
		private function nb_la_pending(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_la_pending();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Liste nb_la_pending_10*/
		private function nb_la_pending_10(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_la_pending_10();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Heure Batch*/
		private function heure_batch(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=heure_batch();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*NB_decaissement M*/
		private function nb_decaissement_m(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_decaissement_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*volume_decaissement M*/
			private function vl_decaissement_m(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_decaissement_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}

			private function nb_clt(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_clt();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function vl_clt(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_clt();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function par0(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par0();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function volpar0(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=volpar0();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function impaye_penal(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=impaye_penal();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
			private function par30(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function vlpar30(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vlpar30();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function per_par0(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=per_par0();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function per_par30(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=per_par30();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/* Rapport Maturité 08/02/2016*/
		private function fn_maturite_40()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_maturite_40();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*notification */
		private function show_notification()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=show_notification();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Reporting CRM HEBDO*/
		private function fn_creation_prospect_crm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_creation_prospect_crm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_relance_prospect_crm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_relance_prospect_crm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_stock_prospect_crm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_stock_prospect_crm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
			private function fn_transformation_prospect_crm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_transformation_prospect_crm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_creation_relance_crm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_creation_relance_crm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/****************Suivi CC OUTIL SUIVI*************************/
		private function fn_suivi_cc()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_suivi_cc();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*10.04.2017 data_cc_dashbord*/
		private function data_cc_dashbord()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=data_cc_dashbord();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function liste_r_abondan(){

            if($this->get_request_method() != "GET"){
                $this->response('',406);
            }

            $result=liste_r_abondan();
            $this->response($this->json($result), 200);
            $this->response('',204);
        }
        private function liste_r_clients_credit_complem(){

            if($this->get_request_method() != "GET"){
                $this->response('',406);
            }

            $result=liste_r_clients_credit_complem();
            $this->response($this->json($result), 200);
            $this->response('',204);
        }
		private function json($data){
			if(is_array($data)){
				
				return json_encode($data);
			}
		}
	}
	$api = new API;
	$api->processApi();

?>