<?php
	
	include('Rest.inc.php');
	include('../fn_client.php');
	include('../fn_decaissement.php');
	include('../fn_decaissement_m1.php');
	include('../fn_demande.php');
	include('../fn_demande_cdr.php');
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
	include('../fn_res_cc.php');
	include('../fn_clt_closed.php');
	include('../fn_productive.php');
	include('../fn_dmd_closed.php');
	include('../fonctions.php');
	include('../fonction_budget.php');
	include('../fn_reporting.php');
	include('../fn_canvas_110.php');
	include('../fn_canvas_120.php');
	include('../fn_provision.php');
	include('../fn_provisionm.php');
	include('../fn_encours_stats.php');
	include('../fn_histo_global.php');
	include('../fn_prod_110.php');
	include('../fn_prod_120.php');
	include('../fn_prod_130.php');
	include('../fonction_budgetm.php');
	include('../fn_rsm.php');
	include('../fn_histo_cc_chart.php');
	include('../fn_transfere_cr.php');
	include('../fn_clot_anticip_m.php');
	include('../fn_clot_anticip.php');
	/* Rapport Maturité 08/02/2016*/
	include('../fn_maturite_40.php');
	/* Onglet Backoffice 22/02/2016 */
	include('../fn_regul.php');
	include('../liste_ech_bo.php');
	/* Rapport Encours CDR 26/02/2016*/
	include('../fn_portfeuille_cdr.php');
	include('../fn_portfeuille_cdr_bank.php');
	/* bancarisation 26/02/2016*/
	include('../fn_bancaire.php');
	/*18.04.2016 tirage BM*/
	include('../tirage_BM.php');
	/*29.04.2016 Notification*/
	include('../liste_notification.php');
	include('../fn_show_notif.php');
	/*23.05.2016 Audit AC*/
	include('../audit_ac.php');
	include('../audit_ac_m-1.php');
	include('../audit_ac_week.php');
	include('../audit_ac_week_1.php');
	/*27052016 Reporting V2*/
	include('../reporting.php');
	/*31/05/2016 Silatech*/
	include('../fn_reporting_silatech.php');
	/*27/06/2016 Silatech*/
	include('../maturite_portefeuille.php');
	/*29/06/2016 Silatech*/
	include('../graph_dg.php');
	/*05/07/2016 ACM*/
	include('../fn_par_acm.php');
		/*05/07/2016 reserve_credit*/
	include('../reserve_credit.php');
	/*18/07/2016 RAPPORT ACM*/
	include('../reporting_acm.php');
	/*07/10/2016 reporting_crm_hebdo.php*/
	include('../reporting_crm_hebdo.php');
	/*10/10/2016 cdr_orbit.php*/
	include('../cdr_orbit.php');
	/*07/12/2016 lst_cr_ref.php*/
	include('../lst_cr_ref.php');
	/*21/12/2016 fn_reporting_frais_gage.php*/
	include('../fn_reporting_frais_gage.php');
	/*21/12/2016 fn_reporting_test_garantis.php*/
	include('../fn_reporting_test_garantis.php');
	/*21/12/2016 fn_reporting_histo_gl.php*/
	include('../fn_reporting_histo_gl.php');
	
	
	include('../provisionm_2017.php');
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
		
		private function res_cc(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=res_cc();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function clt_closed()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=clt_closed();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function dmd_closed(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=dmd_closed();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function vl_moyenne_dec(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_moyenne_dec();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner l'encours dans le reporting opérationnel de l'agence 100*/
		private function Encours_100(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Encours_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner l'encours dans le reporting opérationnel de l'agence 110*/
		private function Encours_110(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Encours_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner l'encours dans le reporting opérationnel de l'agence 110*/
		private function Encours_120(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Encours_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner l'encours dans le reporting opérationnel de l'agence 130*/
		private function Encours_130(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Encours_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des clients actifs pour l'agence 100*/
		private function nb_clt_act_100(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_clt_act_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des clients actifs pour l'agence 110*/
		private function nb_clt_act_110(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_clt_act_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le nombre des clients actifs pour l'agence 120*/
		private function nb_clt_act_120(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_clt_act_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le nombre des clients actifs pour l'agence 130*/
		private function nb_clt_act_130(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_clt_act_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le nombre des clients actifs pour l'agence 130*/
		private function nb_dec_auj_130(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_auj_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des clients actifs pour l'agence 120*/
		private function nb_dec_auj_120(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_auj_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le nombre des clients actifs pour l'agence 110*/
		private function nb_dec_auj_110(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_auj_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le volume de décaissement d'aujourd'hui pour l'agence 110*/
		private function vl_dec_auj_110(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_auj_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le volume de décaissement d'aujourd'hui pour l'agence 120*/
		private function vl_dec_auj_120(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_auj_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le volume de décaissement d'aujourd'hui pour l'agence 130*/
		private function vl_dec_auj_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_auj_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des echeances attendues pour l'agence 100*/
		private function nb_ech_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des echeances attendues pour l'agence 110*/
		private function nb_ech_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le nombre des echeances attendues pour l'agence 120*/
		private function nb_ech_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
			/*Fonction pour retourner le nombre des echeances attendues pour l'agence 130*/
		private function nb_ech_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des echeances impayés pour l'agence 100*/
		private function nb_ech_imp_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_imp_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des echeances impayés pour l'agence 110*/
		private function nb_ech_imp_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_imp_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des echeances impayés pour l'agence 120*/
		private function nb_ech_imp_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_imp_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des echeances impayés pour l'agence 130*/
		private function nb_ech_imp_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_ech_imp_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR0 100*/
		private function nb_par0_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par0_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR0 110*/
		private function nb_par0_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par0_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR0 110*/
		private function nb_par0_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par0_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
	
		/*Fonction pour retourner le nombre PAR0 130*/
		private function nb_par0_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par0_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR0 100*/
		private function vl_par0_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par0_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR0 110*/
		private function vl_par0_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par0_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR0 130*/
		private function vl_par0_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par0_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR0 130*/
		private function vl_par0_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par0_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR30 100*/
		private function nb_par30_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par30_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR30 120*/
		private function nb_par30_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par30_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR30 110*/
		private function nb_par30_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par30_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR30 130*/
		private function nb_par30_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par30_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR30 100*/
		private function vl_par30_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par30_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR30 130*/
		private function vl_par30_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par30_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR30 130*/
		private function vl_par30_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par30_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR30 130*/
		private function vl_par30_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par30_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR7 100*/
		private function nb_par7_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par7_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR7 120*/
		private function nb_par7_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par7_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR7 110*/
		private function nb_par7_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par7_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR7 130*/
		private function nb_par7_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par7_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR7 130*/
		private function vl_par7_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par7_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR7 130*/
		private function vl_par7_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par7_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR7 130*/
		private function vl_par7_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par7_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR7 130*/
		private function vl_par7_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par7_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR90 100*/
		private function nb_par90_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par90_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR90 120*/
		private function nb_par90_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par90_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR90 110*/
		private function nb_par90_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par90_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre PAR90 130*/
		private function nb_par90_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_par90_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR90 100*/
		private function vl_par90_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par90_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR90 130*/
		private function vl_par90_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par90_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR90 130*/
		private function vl_par90_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par90_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume PAR90 130*/
		private function vl_par90_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_par90_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des nouvelle demande agence 110*/
		private function nb_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des nouvelle demande agence 120*/
		private function nb_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des nouvelle demande agence 130*/
		private function nb_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des nouvelle demande agence 110*/
		private function vl_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des nouvelle demande agence 120*/
		private function vl_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des nouvelle demande agence 130*/
		private function vl_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des demandes cloturés agence 110*/
		private function clo_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=clo_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des demande cloturés agence 120*/
		private function clo_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=clo_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des demandes cloturés agence 130*/
		private function clo_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=clo_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes peding agence 130*/
		private function pen_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=pen_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes peding agence 120*/
		private function pen_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=pen_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes peding agence 110*/
		private function pen_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=pen_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes reviewed agence 130*/
		private function rev_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=rev_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes reviewed agence 120*/
		private function rev_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=rev_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes reviewed agence 110*/
		private function rev_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=rev_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes approved agence 130*/
		private function app_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=app_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes approved agence 120*/
		private function app_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=app_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes approved agence 110*/
		private function app_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=app_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Fonction pour retourner le nombre des demandes peding agence 130*/
		private function vl_pen_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_pen_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes peding agence 120*/
		private function vl_pen_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_pen_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes peding agence 110*/
		private function vl_pen_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_pen_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes reviewed agence 130*/
		private function vl_rev_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_rev_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes reviewed agence 120*/
		private function vl_rev_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_rev_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes reviewed agence 110*/
		private function vl_rev_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_rev_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes approved agence 130*/
		private function vl_app_dmd_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_app_dmd_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes approved agence 120*/
		private function vl_app_dmd_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_app_dmd_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes approved agence 110*/
		private function vl_app_dmd_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_app_dmd_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes cumulé de l'agence 110*/
		private function cum_dmd_week_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cum_dmd_week_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes cumulé de l'agence 120*/
		private function cum_dmd_week_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cum_dmd_week_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes cumulé de l'agence 130*/
		private function cum_dmd_week_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cum_dmd_week_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des crédit décaissé de l'agence 110*/
		private function nb_cr_week_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_cr_week_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des crédit décaissé de l'agence 120*/
		private function nb_cr_week_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_cr_week_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des crédit décaissé de l'agence 130*/
		private function nb_cr_week_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_cr_week_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des crédit décaissé de l'agence 110*/
		private function vl_cr_week_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_cr_week_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des crédit décaissé de l'agence 120*/
		private function vl_cr_week_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_cr_week_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des crédit décaissé de l'agence 130*/
		private function vl_cr_week_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_cr_week_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes cumulé de l'agence 110*/
		private function cum_dmd_month_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cum_dmd_month_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes cumulé de l'agence 120*/
		private function cum_dmd_month_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cum_dmd_month_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des demandes cumulé de l'agence 130*/
		private function cum_dmd_month_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cum_dmd_month_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des crédit décaissé de l'agence 110*/
		private function nb_cr_month_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_cr_month_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des crédit décaissé de l'agence 120*/
		private function nb_cr_month_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_cr_month_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le nombre des crédit décaissé de l'agence 130*/
		private function nb_cr_month_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_cr_month_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des crédit décaissé de l'agence 110*/
		private function vl_cr_month_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_cr_month_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des crédit décaissé de l'agence 120*/
		private function vl_cr_month_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_cr_month_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Fonction pour retourner le volume des crédit décaissé de l'agence 130*/
		private function vl_cr_month_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_cr_month_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}		
	//////////////////////////////////////////////////////	
	

		private function enc_total_budget_objectnb()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budget_objectnb();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_total_budgetm_object()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budgetm_object();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function som_decaiss_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=som_decaiss_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function som_decaiss_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=som_decaiss_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function som_decaiss_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=som_decaiss_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function som_decaiss_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=som_decaiss_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function som_encours_per()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=som_encours_per();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_br_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_br_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_br_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_br_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_br_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_br_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_tot()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_tot();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function encours_nb_stats()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=encours_nb_stats();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function encours_vl_stats()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=encours_vl_stats();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		////////////////////////////Provision ///////////////////////////////
		private function Provision_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_total_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_total_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_total_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_total_prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total_prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_total_prov_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total_prov_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_total_prov_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total_prov_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_total_prov_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_total_prov_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function saintotal()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function saintotalm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_totalm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_totalm_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_totalm_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function saintotalprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_provm_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_provm_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_prov_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_prov_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function saintotalprovm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_provm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalm_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalm_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprovm_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprovm_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprov_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprov_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_totalm_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_totalm_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_total_restru()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_total_restru();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprovm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprovm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_totalm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_totalm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_totalm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_totalm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_totalm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_totalm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_totalm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_totalm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_totalprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_totalprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_totalprovm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_totalprovm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_totalprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_totalprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_totalprovm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_totalprovm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_totalprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_totalprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_totalprovm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_totalprovm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_totalprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_totalprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_totalprovm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_totalprovm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		////////////////////////////////////////////////////////////
		private function sain_total_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_501prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_501prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total501prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total501prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total501prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total501prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total501prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total501prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total501prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprovm_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprovm_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprov_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprov_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalm_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalm_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_totalm_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_totalm_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_provm_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_provm_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_prov_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_prov_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_totalm_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_totalm_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_total_restru501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_total_restru501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		////////////////////////////////////////////Provision 501////////////////////////////////////////////////////
		private function sain_total_501m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_501m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_501mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_501mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total501m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total501m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total501mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total501mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total501m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total501m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total501mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total501mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total501m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total501mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total501mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total501m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total501m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total501mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total501mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total501m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total501m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total501mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total501mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprovm_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprovm_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprov_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprov_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalm_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalm_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_totalm_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_totalm_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_provm_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_provm_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
			private function sain_total_prov_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_prov_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_totalm_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_totalm_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_total_restru511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_total_restru511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		////////////////////////////////////////////////////////////////////////////////////////////////
		private function sain_total_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_511prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_511prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total511prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total511prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total511prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total511prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total511prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total511prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total511prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total511prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total511prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total511prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		//////////////////////////////////Provision 511///////////////////////////////////////
		private function sain_total_511m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_511m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_511mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_511mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total511m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total511m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total511mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total511mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total511m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total511m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total511mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total511mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total511m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total511m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total511mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total511mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total511m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total511m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total511mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total511mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total511m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total511m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total511mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total511mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/////////////////////////////////////////////////////////////////////////
		private function sain_total_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_521prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_521prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total521prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total521prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total521prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total521prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total521prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total521prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total521prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total521prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total521prov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total521prov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprov_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprov_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_prov_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_prov_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_total_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_total_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/////////////////////////////////////Provision 521//////////////////////////////////////////////
		private function sain_total_521m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_521m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_521mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_521mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total521m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total521m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_total521mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_total521mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total521m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total521m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_60_total521mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_60_total521mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total521m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total521m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_90_total521mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_90_total521mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total521m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total521m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_180_total521mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_180_total521mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total521m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total521m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_181_total521mprov()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_181_total521mprov();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalprovm_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalprovm_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_1_30_totalm_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_1_30_totalm_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_totalm_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_totalm_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_provm_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_provm_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_31_totalm_restru521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_31_totalm_restru521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		///////////////////////////////////////////////////////////////////////////////////
		private function fn_productive()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_productive();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_histo_global()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_histo_global();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		///////////////////*****Fonctions productivité synthetique 110 ****///////////////////////
		private function fn_vl_encours_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_vl_encours_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_avg_trait_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_avg_trait_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_nb_encours_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_nb_encours_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_vl_cr_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_vl_cr_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_nb_cr_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_nb_cr_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		///////////////////*****Fonctions productivité synthetique 120 ****///////////////////////
		private function fn_vl_encours_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_vl_encours_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_avg_trait_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_avg_trait_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_nb_encours_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_nb_encours_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_vl_cr_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_vl_cr_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_nb_cr_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_nb_cr_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		///////////////////*****Fonctions productivité synthetique 130 ****///////////////////////
		private function fn_vl_encours_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_vl_encours_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_nb_encours_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_nb_encours_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_avg_trait_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_avg_trait_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_vl_cr_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_vl_cr_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_nb_cr_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_nb_cr_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_demande_stats()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_demande_stats();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_demande_stats()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_demande_stats();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_rsm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_rsm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_histo_cc_chart_vl()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_histo_cc_chart_vl();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_histo_cc_chart_nbr()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_histo_cc_chart_nbr();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_transfere_cr()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_transfere_cr();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_clot_anticipe_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_clot_anticipe_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_clot_anticipe()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_clot_anticipe();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Liste demande CDR 13/01/2016 */
		private function demande_cdr()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=demande_cdr();
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
		/* Onglet Backoffice 22/02/2016 */
		private function liste_regul()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_regul();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function liste_ech_bo()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_ech_bo();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/* Rapport Encours CDR 26/02/2016*/
		private function portfeuille_cdr()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=portfeuille_cdr();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function portfeuille_cdr_bank()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=portfeuille_cdr_bank();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/* bancarisation 26/02/2016*/
		private function bancaire_110_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_110_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_100_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_100_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_120_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_120_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_130_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_130_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total_501()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total_501();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/* 511 bancarisation client */
		
		private function bancaire_110_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_110_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_100_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_100_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_120_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_120_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_130_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_130_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total_511()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total_511();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/* 521 bancarisation client */
		
		private function bancaire_110_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_110_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_100_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_100_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_120_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_120_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_130_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_130_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total_521()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total_521();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total_100()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total_100();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total_110()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total_110();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total_120()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total_120();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total_130()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total_130();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function bancaire_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=bancaire_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Reporting Hebdo ajout l'agence 210*/
		
		/*Ajout l'agence 210 Reporting Operationnel*/
		private function Encours_210(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Encours_210();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_clt_act_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_clt_act_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function nb_dec_auj_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_dec_auj_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function vl_dec_auj_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_dec_auj_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function nb_ech_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_ech_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function nb_ech_imp_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_ech_imp_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function nb_par0_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_par0_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function vl_par0_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_par0_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}		
		private function nb_par30_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_par30_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function vl_par30_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_par30_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function nb_par7_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_par7_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function vl_par7_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_par7_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function nb_par90_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_par90_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function vl_par90_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_par90_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}		
		private function nb_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function vl_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function clo_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=clo_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function pen_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=pen_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function rev_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=rev_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function app_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=app_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function vl_pen_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_pen_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function vl_rev_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_rev_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function vl_app_dmd_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_app_dmd_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function cum_dmd_week_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=cum_dmd_week_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function nb_cr_week_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_cr_week_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function vl_cr_week_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_cr_week_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function cum_dmd_month_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=cum_dmd_month_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}
		private function nb_cr_month_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=nb_cr_month_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		private function vl_cr_month_210(){	
					
					if($this->get_request_method() != "GET"){
						$this->response('',406);
					}
					
					$result=vl_cr_month_210();
					$this->response($this->json($result), 200);
					$this->response('',204);	
				}	
		/*TIRAGE BM*/
		private function tirage_BM()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=tirage_BM();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Notification*/
		private function liste_notification()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_notification();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function show_notification()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=show_notification();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		/*Taux Passage En perte %*/
		
		
		/**********************Taux d'échéance remboursé à temps (%)********************/
		
		/*Audit AC*/
		private function fn_rim_crees()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_rim_crees();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_la_disbursed()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_la_disbursed();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_li_crees()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_li_crees();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_la_closed()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_la_closed();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_la_reviewed()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_la_reviewed();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_orbit()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_orbit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_prospect()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_prospect();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_crm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_crm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*fn_stock_relance_ac 04/10/2016*/
		private function fn_stock_relance_ac()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_stock_relance_ac();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_m_1()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_m_1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_crm_m_1()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_crm_m_1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_orbit_m_1()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_orbit_m_1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_orbit_week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_orbit_week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_crm_week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_crm_week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_orbit_week_1()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_orbit_week_1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_crm_week_1()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_crm_week_1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Audit AC*/
		private function fn_synthese_audit_week_1()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_synthese_audit_week_1();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*24/05/2016 Reporting V2*/
		private function credit()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=credit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function credit_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=credit_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function demande_reporting()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=demande_reporting();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function demande_reporting_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=demande_reporting_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function cumul_week_reporting()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cumul_week_reporting();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function cumul_week_reporting_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cumul_week_reporting_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function cumul_month_reporting()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cumul_month_reporting();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function cumul_month_reporting_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=cumul_month_reporting_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*31/05/2016 Silatech*/
		private function reporting_silatech()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=reporting_silatech();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*27/06/2016 maturite portefeuille*/
		
		/******************Créances Saines (0.5 %)***********************/
		
		private function sain1day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain1day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain1week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain1week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain1month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain1month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain2month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain2month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain3month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain3month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain6month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain6month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain12month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain12month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain24month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain24month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain36month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain36month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain60month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain60month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sain_total_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sain_total_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************PAR Entre 1 et 30 jours (10 %)***********************/
		private function par11day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par11day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par11week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par11week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par11month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par11month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par12month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par12month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par13month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par13month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par16month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par16month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par112month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par112month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par124month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par124month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par136month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par136month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par160month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par160month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************PAR Entre 31 et 60 jours (40 %)***********************/
		private function par301day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par301day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par301week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par301week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par301month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par301month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par302month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par302month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par303month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par303month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par306month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par306month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par3012month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par3012month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par3024month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par3024month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par3036month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par3036month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par3060month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par3060month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************PAR Entre 61 et 90 jours (70 %)***********************/
		private function par601day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par601day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par601week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par601week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par601month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par601month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par602month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par602month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par603month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par603month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par606month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par606month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par6012month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par6012month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par6024month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par6024month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par6036month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par6036month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par6060month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par6060month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par60_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par60_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************PAR Entre 91 et 180 jours (100 %)***********************/
		private function par901day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par901day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par901week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par901week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par901month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par901month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par902month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par902month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par903month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par903month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par906month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par906month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par9012month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par9012month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par9024month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par9024month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par9036month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par9036month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par9060month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par9060month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par90_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par90_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************PAR >180 jours***********************/
		private function par1801day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1801day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1801week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1801week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1801month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1801month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1802month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1802month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1803month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1803month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1806month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1806month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par18012month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par18012month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par18024month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par18024month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par18036month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par18036month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par18060month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par18060month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par180_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par180_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************Restructuré - Sain (20%)***********************/
		private function sainre1day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre1day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre1week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre1week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre1month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre1month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre2month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre2month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre3month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre3month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre6month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre6month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre12month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre12month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre24month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre24month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre36month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre36month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre60month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre60month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function sainre_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=sainre_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************estructuré - PAR Entre 1 et 30 jours (50%))***********************/
		private function par1re1day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re1day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re1week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re1week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re1month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re1month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re2month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re2month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re3month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re3month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re6month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re6month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re12month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re12month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re24month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re24month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re36month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re36month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re60month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re60month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par1re_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par1re_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/******************Restructuré/PAR >= 31 jours (100%)***********************/
		private function par30re1day()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re1day();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re1week()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re1week();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re1month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re1month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re2month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re2month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re3month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re3month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re6month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re6month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re12month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re12month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re24month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re24month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re36month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re36month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re60month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re60month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function par30re_tot_maturite()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=par30re_tot_maturite();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*********************Begin Graph DG 29 06 2016************************/
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
		/**********************************End Graph DG 29 06 2016************/
		private function fn_par_acm()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_par_acm();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_par_acm_perte()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_par_acm_perte();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**************reserve_credit******************************/
		private function reserve_credit()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=reserve_credit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************decaissement_genre******************************/
		private function decaissement_genre()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=decaissement_genre();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************encours_genre******************************/
		private function encours_genre()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=encours_genre();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_AGR******************************/
		private function INFO_AGR()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_AGR();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_SERV******************************/
		private function INFO_SERV()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_SERV();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_PROD******************************/
		private function INFO_PROD()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_PROD();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_VENTE******************************/
		private function INFO_VENTE()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_VENTE();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_N_A******************************/
		private function INFO_N_A()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_N_A();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_1000******************************/
		private function INFO_1000()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_1000();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_2000******************************/
		private function INFO_2000()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_2000();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************INFO_3000******************************/
		private function INFO_3000()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=INFO_3000();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/**ACM************Total_Region******************************/
		private function Total_Region()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Total_Region();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*Réamenagement reporting direction 22082016*/
		private function budget_information_branch()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=budget_information_branch();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function budget_information_branch_total()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=budget_information_branch_total();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function top_agence()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=top_agence();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function top_dec_month()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=top_dec_month();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_encours()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_encours();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_object_budget_year()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_object_budget_year();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function top_dec_month_nb()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=top_dec_month_nb();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_object_budgetyear()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_object_budgetyear();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_total_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_total_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_total_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_total_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_m_object_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_m_object_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_total_budgetnb()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budgetnb();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_m_object_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_m_object_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_total_budget_object()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budget_object();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}

		/*Réamenagement reporting direction M-1 22082016*/
		private function budget_information_branch_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=budget_information_branch_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function budget_information_branch_total_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=budget_information_branch_total_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}

		private function top_dec_month_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=top_dec_month_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_encours_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_encours_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_object_budget_year_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_object_budget_year_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function top_dec_month_nb_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=top_dec_month_nb_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_object_budgetyear_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_object_budgetyear_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_total_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_total_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_total_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_total_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_m_object_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_m_object_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_total_budgetnb_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budgetnb_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_m_object_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_m_object_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_total_budget_object_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budget_object_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_total_budget_objectnb_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budget_objectnb_m();
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
		/****************CDR ORBIT*************************/
		private function fn_conforme_orbit()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_conforme_orbit();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_conforme_cdr_dec()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_conforme_cdr_dec();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_conforme_cdr_outstanding()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_conforme_cdr_outstanding();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_conforme_cdr_PAR()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_conforme_cdr_PAR();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function fn_conforme_ORBIT_PAR_P_Detail()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_conforme_ORBIT_PAR_P_Detail();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*lst_cr_ref*/
		private function fn_cr_ref()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=fn_cr_ref();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*reporting_frais_gage*/
		private function reporting_frais_gage()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=reporting_frais_gage();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*reporting_test_garantis*/
		private function reporting_test_garantis()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=reporting_test_garantis();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*reporting_histo_gl*/
		private function reporting_histo_gl()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=reporting_histo_gl();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*reporting_cur_bal_gl*/
		private function reporting_cur_bal_gl()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=reporting_cur_bal_gl();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function Provision_prood_total_2017()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_prood_total_2017();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_prood501_total_2017()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_prood501_total_2017();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_prood511_total_2017()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_prood511_total_2017();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function Provision_prood521_total_2017()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=Provision_prood521_total_2017();
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