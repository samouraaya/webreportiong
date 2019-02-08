<?php
	
	include('Rest.inc.php');
	include('../canvas.php');
	
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
		private function total_dec_agence_vl()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_dec_agence_vl();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_dec_agence_nb()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_dec_agence_nb();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_dec_agence_vl_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_dec_agence_vl_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_dec_produit()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_dec_produit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_dec_agence_nb_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_dec_agence_nb_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_Outstanding_vl()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_Outstanding_vl();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_Outstanding_nb()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_Outstanding_nb();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_Outstanding_vl_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_Outstanding_vl_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_Outstanding_nb_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_Outstanding_nb_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_outsanding_produit_nbr()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_outsanding_produit_nbr();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function total_outsanding_produit_vl()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=total_outsanding_produit_vl();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR0_Outstanding_vl_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR0_Outstanding_vl_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR0_Outstanding_nb_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR0_Outstanding_nb_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR30_Outstanding_nb_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR30_Outstanding_nb_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR30_Outstanding_vl_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR30_Outstanding_vl_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR90_Outstanding_nb_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR90_Outstanding_nb_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR90_Outstanding_vl_br()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR90_Outstanding_vl_br();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR0_Outstanding_per_SEX()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR0_Outstanding_per_SEX();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR30_Outstanding_per_SEX()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR30_Outstanding_per_SEX();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR90_Outstanding_per_SEX()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR90_Outstanding_per_SEX();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR0_Outstanding_per_SIC()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR0_Outstanding_per_SIC();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR30_Outstanding_per_SIC()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR30_Outstanding_per_SIC();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function PAR90_Outstanding_per_SIC()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=PAR90_Outstanding_per_SIC();
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