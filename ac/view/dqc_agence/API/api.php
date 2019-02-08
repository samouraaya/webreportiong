<?php
	
	include('Rest.inc.php');
	include('../controller/nb_clt_dmd_pret.php');
	include('../controller/fonctions.php');
	
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
	
		private function nb_client()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_client();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_demande()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_demande();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_credit()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_credit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_depot()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_credit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t1()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t2()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t2();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t3()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t3();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t4()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t4();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t5()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t5();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t6()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t6();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t7()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t7();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t7bis()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t7bis();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t8()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t8();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t9()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t9();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t10()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t10();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t11()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t11();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t12()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t12();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t13()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t13();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t14()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t14();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t15()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t15();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t17()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t17();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t18()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t18();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t19()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t19();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t20()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t20();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function t21()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=t21();
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