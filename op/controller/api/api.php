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
	include('../fn_res_cc.php');
	include('../fn_clt_closed.php');
	include('../fn_dmd_closed.php');
	include('../fonctions.php');
	include('../fonction_budget.php');
	include('../fn_liste_rec_synth.php');
	include('../fn_liste_rec_flx_rem.php');
	include('../fn_liste_rec_flx_rem_prec.php');
	include('../fn_liste_rec_cloture.php');
	include('../fn_liste_rec_cloture_prec.php');
	include('../fn_liste_rec_action.php');
	include('../fn_liste_rec_strategie.php');
	include('../fn_reporting.php');
	include('../fn_transfere_cr.php');
	include('../fn_clot_anticip_m.php');
	include('../fn_clot_anticip.php');
	/* Rapport Maturité */
	include('../fn_maturite_40.php');
	/* Onglet Backoffice 22/02/2016 */
	include('../fn_regul.php');
	include('../liste_ech_bo.php');
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
	/*14092016 Relance impayés*/
	include('../fn_impaye_relance.php');
	/*07/10/2016 reporting_crm_hebdo.php*/
	include('../reporting_crm_hebdo.php');
	/*16/12/2016 fn_portfeuille_cdr.php*/
	include('../fn_portfeuille_cdr.php');
	
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
		
		private function res_cc(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=res_cc();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function clt_closed(){	
			
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
		/*Fonction pour retourner le nombre des echeances impayés pour l'agence 10*/
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
		/*Fonction pour retourner le volume PAR0 130*/
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
		/*Fonction pour retourner le volume PAR7 100*/
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
		private function nb_dec_110_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_110_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_120_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_120_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_130_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_130_budget();
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
		private function nb_dec_object_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_object_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
	////////////////////////////////////////////////////////
		private function vl_dec_110_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_110_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_120_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_120_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_130_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_130_budget();
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
		private function vl_dec_object_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_object_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
	////////////////////////////////////////////////////////	
		private function nb_dec_110_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_110_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_120_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_120_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_130_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_130_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function nb_dec_tot_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=nb_dec_tot_budget_m();
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
	////////////////////////////////////////////////////////
		private function vl_dec_110_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_110_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_120_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_120_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_130_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_130_budget_m();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function vl_dec_tot_budget_m()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=vl_dec_tot_budget_m();
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
	////////////////////////////////////////////////////////
		private function enc_100_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_100_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_110_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_110_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_120_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_120_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_130_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_130_budget();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function enc_total_budget()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=enc_total_budget();
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
		/*14092016 Relance impayés*/
		private function impaye_relance()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=impaye_relance();
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
		/****************portfeuille_cdr*************************/
		private function portfeuille_cdr()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=portfeuille_cdr();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		/*30.05.2017 ADD*/
		private function data_dg_dashbord()
		{	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=data_dg_dashbord();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function json($data){
			if(is_array($data)){
				
				return json_encode($data);
			}
		}
				private function liste_rec_synth(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_synth();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
				private function liste_rec_clot(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_clot();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
				private function liste_rec_clot_prec(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_clot_prec();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		private function liste_rec_flx_rem(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_flx_rem();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
			private function liste_rec_flx_rem_prec(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_flx_rem_prec();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
		
			private function liste_rec_synth_externe(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_synth_externe();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function liste_rec_action(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_action();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		private function liste_rec_strategie(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_strategie();
			$this->response($this->json($result), 200);
			$this->response('',204);	
		}
		
				private function liste_rec_synth_agence(){	
			
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			$result=liste_rec_synth_agence();
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
	}
	$api = new API;
	$api->processApi();

?>