encours_info_genre_acm=$.ajax({
            type: "GET",
            url: "../controller/api/encours_genre",
            dataType: "json",

            success: function (data) {
				var EncoursFvl = data[0].EncoursFvl;
				var EncoursMvl = data[0].EncoursMvl;
				var EncoursFnb = data[0].EncoursFnb;
				var EncoursMnb = data[0].EncoursMnb;
				var EncoursFnbclt = data[0].EncoursFnbclt;
				var EncoursMnbclt = data[0].EncoursMnbclt;

				
              
			   $('#EncoursFvl').html(EncoursFvl);
			   $('#EncoursMvl').html(EncoursMvl);
			   $('#EncoursFnb').html(EncoursFnb);
			   $('#EncoursMnb').html(EncoursMnb);
			   $('#EncoursFnbclt').html(EncoursFnbclt);
			   $('#EncoursMnbclt').html(EncoursMnbclt);
            },
            error: function (result) {
                alert("Error");
            }
        });	
decaissement_genre=$.ajax({
            type: "GET",
            url: "../controller/api/decaissement_genre",
            dataType: "json",

            success: function (data) {
				var DecFvl = data[0].DecFvl;
				var DecMvl = data[0].DecMvl;
				var DecFnb = data[0].DecFnb;
				var DecMnb = data[0].DecMnb;
				var DecMnbclt = data[0].DecMnbclt;
				var DecFnbclt = data[0].DecFnbclt;

				
              
			   $('#DecFvl').html(DecFvl);
			   $('#DecMvl').html(DecMvl);
			   $('#DecFnb').html(DecFnb);
			   $('#DecMnb').html(DecMnb);
			   $('#DecMnbclt').html(DecMnbclt);
			   $('#DecFnbclt').html(DecFnbclt);
            },
            error: function (result) {
                alert("Error");
            }
        });	
		/* 28/09/2018*/
	totale_act=$.ajax({
            type: "GET",
            url: "../controller/api/totale_act",
            dataType: "json",

            success: function (data) {
				var DECACTNB = data[0].DECACTNB;
				var DECACTVL = data[0].DECACTVL;
				var ENCATNB = data[0].ENCATNB;
				var ENCATNBCLT = data[0].ENCATNBCLT;
				var ENCATVL = data[0].ENCATVL;
			
				
              
			   $('#DECACTNB').html(DECACTNB);
			   $('#DECACTVL').html(DECACTVL);
			   $('#ENCATNB').html(ENCATNB);
			   $('#ENCATNBCLT').html(ENCATNBCLT);
			   $('#ENCATVL').html(ENCATVL);
			  
            },
            error: function (result) {
                alert("Error");
            }
        });	

INFO_AGR=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_AGR",
            dataType: "json",

            success: function (data) {
				var DECAGRVL = data[0].DECAGRVL;
				var DECAGRNB = data[0].DECAGRNB;
				var ENCAGRVL = data[0].ENCAGRVL;
				var ENCAGRNB = data[0].ENCAGRNB;
				var ENCAGRNBCLT = data[0].ENCAGRNBCLT;

				
              
			   $('#DECAGRVL').html(DECAGRVL);
			   $('#DECAGRNB').html(DECAGRNB);
			   $('#ENCAGRVL').html(ENCAGRVL);
			   $('#ENCAGRNB').html(ENCAGRNB);
			   $('#ENCAGRNBCLT').html(ENCAGRNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
		
		
		
		
		/* 28/01/2019*/
		
		INFO_ELV=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_ELV",
            dataType: "json",

            success: function (data) {
				var DECELVVL = data[0].DECELVVL;
				var DECELVNB = data[0].DECELVNB;
				var ENCELVVL = data[0].ENCELVVL;
				var ENCELVNB = data[0].ENCELVNB;
				var ENCELVNBCLT = data[0].ENCELVNBCLT;

				
              
			   $('#DECELVVL').html(DECELVVL);
			   $('#DECELVNB').html(DECELVNB);
			   $('#ENCELVVL').html(ENCELVVL);
			   $('#ENCELVNB').html(ENCELVNB);
			   $('#ENCELVNBCLT').html(ENCELVNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });	
		/* 28/09/2018*/
		INFO_log=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_log",
            dataType: "json",

            success: function (data) {
				var DECVLOGENB = data[0].DECVLOGENB;
				var DECVLOGEVL = data[0].DECVLOGEVL;
				var ENCLOGENB = data[0].ENCLOGENB;
				var ENCLOGENBCLT = data[0].ENCLOGENBCLT;
				
				var ENCLOGEVL = data[0].ENCLOGEVL;

				
              
			   $('#DECVLOGENB').html(DECVLOGENB);
			   $('#DECVLOGEVL').html(DECVLOGEVL);
			   $('#ENCLOGENB').html(ENCLOGENB);
			   $('#ENCLOGENBCLT').html(ENCLOGENBCLT);
			   $('#ENCLOGEVL').html(ENCLOGEVL);
			  
            },
            error: function (result) {
                alert("Error");
            }
        });	
INFO_SERV=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_SERV",
            dataType: "json",

            success: function (data) {
				var DECSERVVL = data[0].DECSERVVL;
				var DECSERVNB = data[0].DECSERVNB;
				var ENCSERVVL = data[0].ENCSERVVL;
				var ENCSERVNB = data[0].ENCSERVNB;
				var ENCSERVNBCLT = data[0].ENCSERVNBCLT;

				
              
			   $('#DECSERVVL').html(DECSERVVL);
			   $('#DECSERVNB').html(DECSERVNB);
			   $('#ENCSERVVL').html(ENCSERVVL);
			   $('#ENCSERVNB').html(ENCSERVNB);
			   $('#ENCSERVNBCLT').html(ENCSERVNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
INFO_PROD=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_PROD",
            dataType: "json",

            success: function (data) {
				var DECPRODVL = data[0].DECPRODVL;
				var DECPRODNB = data[0].DECPRODNB;
				var ENCPRODVL = data[0].ENCPRODVL;
				var ENCPRODNB = data[0].ENCPRODNB;
				var ENCPRODNBCLT = data[0].ENCPRODNBCLT;

				
              
			   $('#DECPRODVL').html(DECPRODVL);
			   $('#DECPRODNB').html(DECPRODNB);
			   $('#ENCPRODVL').html(ENCPRODVL);
			   $('#ENCPRODNB').html(ENCPRODNB);
			   $('#ENCPRODNBCLT').html(ENCPRODNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
INFO_VENTE=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_VENTE",
            dataType: "json",

            success: function (data) {
				var DECVENTEVL = data[0].DECVENTEVL;
				var DECVENTENB = data[0].DECVENTENB;
				var ENCVENTEVL = data[0].ENCVENTEVL;
				var ENCVENTENB = data[0].ENCVENTENB;
				var ENCVENTENBCLT = data[0].ENCVENTENBCLT;

				
              
			   $('#DECVENTEVL').html(DECVENTEVL);
			   $('#DECVENTENB').html(DECVENTENB);
			   $('#ENCVENTEVL').html(ENCVENTEVL);
			   $('#ENCVENTENB').html(ENCVENTENB);
			   $('#ENCVENTENBCLT').html(ENCVENTENBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
INFO_SCO=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_SCO",
            dataType: "json",

            success: function (data) {
				var DECSOCNB = data[0].DECSOCNB;
				var DECSOCVL = data[0].DECSOCVL;
				var ENCSOCNB = data[0].ENCSOCNB;
				var ENCSOCVL = data[0].ENCSOCVL;
				var ENCSOCNBCLT = data[0].ENCSOCNBCLT;

				
              
			   $('#DECSOCNB').html(DECSOCNB);
			   $('#DECSOCVL').html(DECSOCVL);
			   $('#ENCSOCNB').html(ENCSOCNB);
			   $('#ENCSOCVL').html(ENCSOCVL);
			   $('#ENCSOCNBCLT').html(ENCSOCNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
INFO_NA=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_N_A",
            dataType: "json",

            success: function (data) {
				var DECNAVL = data[0].DECNAVL;
				var DECNANB = data[0].DECNANB;
				var ENCNAVL = data[0].ENCNAVL;
				var ENCNANB = data[0].ENCNANB;
				var ENCNANBCLT = data[0].ENCNANBCLT;

				
              
			   $('#DECNAVL').html(DECNAVL);
			   $('#DECNANB').html(DECNANB);
			   $('#ENCNAVL').html(ENCNAVL);
			   $('#ENCNANB').html(ENCNANB);
			   $('#ENCNANBCLT').html(ENCNANBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });

INFO_1000=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_1000",
            dataType: "json",

            success: function (data) {
				var DEC1000VL = data[0].DEC1000VL;
				var DEC1000NB = data[0].DEC1000NB;
				var ENC1000VL = data[0].ENC1000VL;
				var ENC1000NB = data[0].ENC1000NB;
				var ENC1000NBCLT = data[0].ENC1000NBCLT;

				
              
			   $('#DEC1000VL').html(DEC1000VL);
			   $('#DEC1000NB').html(DEC1000NB);
			   $('#ENC1000VL').html(ENC1000VL);
			   $('#ENC1000NB').html(ENC1000NB);
			   $('#ENC1000NBCLT').html(ENC1000NBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		/*04/10/2018*/
		INFO_5000=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_5000",
            dataType: "json",

            success: function (data) {
				var DEC5000VL = data[0].DEC5000VL;
				var DEC5000NB = data[0].DEC5000NB;
				var ENC5000VL = data[0].ENC5000VL;
				var ENC5000NB = data[0].ENC5000NB;
				var ENC5000NBCLT = data[0].ENC5000NBCLT;

				
              
			   $('#DEC5000VL').html(DEC5000VL);
			   $('#DEC5000NB').html(DEC5000NB);
			   $('#ENC5000VL').html(ENC5000VL);
			   $('#ENC5000NB').html(ENC5000NB);
			   $('#ENC5000NBCLT').html(ENC5000NBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
INFO_2000=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_2000",
            dataType: "json",

            success: function (data) {
				var DEC2000VL = data[0].DEC2000VL;
				var DEC2000NB = data[0].DEC2000NB;
				var ENC2000VL = data[0].ENC2000VL;
				var ENC2000NB = data[0].ENC2000NB;
				var ENC2000NBCLT = data[0].ENC2000NBCLT;

				
              
			   $('#DEC2000VL').html(DEC2000VL);
			   $('#DEC2000NB').html(DEC2000NB);
			   $('#ENC2000VL').html(ENC2000VL);
			   $('#ENC2000NB').html(ENC2000NB);
			   $('#ENC2000NBCLT').html(ENC2000NBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
INFO_3000=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_3000",
            dataType: "json",

            success: function (data) {
				var DEC3000VL = data[0].DEC3000VL;
				var DEC3000NB = data[0].DEC3000NB;
				var ENC3000VL = data[0].ENC3000VL;
				var ENC3000NB = data[0].ENC3000NB;
				var ENC3000NBCLT = data[0].ENC3000NBCLT;

				
              
			   $('#DEC3000VL').html(DEC3000VL);
			   $('#DEC3000NB').html(DEC3000NB);
			   $('#ENC3000VL').html(ENC3000VL);
			   $('#ENC3000NB').html(ENC3000NB);
			   $('#ENC3000NBCLT').html(ENC3000NBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
INFO_4000=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_4000",
            dataType: "json",

            success: function (data) {
				var DEC4000VL = data[0].DEC4000VL;
				var DEC4000NB = data[0].DEC4000NB;
				var ENC4000VL = data[0].ENC4000VL;
				var ENC4000NB = data[0].ENC4000NB;
				var ENC4000NBCLT = data[0].ENC4000NBCLT;

				
              
			   $('#DEC4000VL').html(DEC4000VL);
			   $('#DEC4000NB').html(DEC4000NB);
			   $('#ENC4000VL').html(ENC4000VL);
			   $('#ENC4000NB').html(ENC4000NB);
			   $('#ENC4000NBCLT').html(ENC4000NBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* 28/09/2018*/
		
Total_Region=$.ajax({
            type: "GET",
            url: "../controller/api/Total_Region",
            dataType: "json",

            success: function (data) {
				var ENCREGNB = data[0].ENCREGNB;
				var ENCREGVL = data[0].ENCREGVL;
				var DECREGNB = data[0].DECREGNB;
				var DECREGVL = data[0].DECREGVL;
				var ENCREGNBCLT = data[0].ENCREGNBCLT;
				var DECREGNBCLT = data[0].DECREGNBCLT;

				$('#ENCGENRENBCLT').html(ENCREGNBCLT);
				
				$('#ENCREGNBCLT').html(ENCREGNBCLT);
				
				$('#ENCACTNBCLT').html(ENCREGNBCLT);
				
				$('#DECGENRENBCLT').html(DECREGNBCLT);
              
			   $('#ENCREGNB').html(ENCREGNB);
			   $('#ENCREGVL').html(ENCREGVL);
			   $('#DECREGNB').html(DECREGNB);
			   $('#DECREGVL').html(DECREGVL);
			   

			   
			   $('#ENCGENRENB').html(ENCREGNB);
			   $('#ENCGENREVL').html(ENCREGVL);
			   $('#DECGENRENB').html(DECREGNB);
			   $('#DECGENREVL').html(DECREGVL);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
INFO_TUN=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_TUN",
            dataType: "json",

            success: function (data) {
				var DECTUNVL = data[0].DECTUNVL;
				var ENCTUNVL = data[0].ENCTUNVL;
				var DECTUNNB = data[0].DECTUNNB;
				var ENCTUNNB = data[0].ENCTUNNB;
				var ENCTUNNBCLT = data[0].ENCTUNNBCLT;

				
              
			   $('#DECTUNVL').html(DECTUNVL);
			   $('#ENCTUNVL').html(ENCTUNVL);
			   $('#DECTUNNB').html(DECTUNNB);
			   $('#ENCTUNNB').html(ENCTUNNB);
			   $('#ENCTUNNBCLT').html(ENCTUNNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* 28/09/2018*/		
INFO_MAN=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_MAN",
            dataType: "json",

            success: function (data) {
				var DECMANVL = data[0].DECMANVL;
				var ENCMANVL = data[0].ENCMANVL;
				var DECMANNB = data[0].DECMANNB;
				var ENCMANNBCLT = data[0].ENCMANNBCLT;
				var ENCMANNB = data[0].ENCMANNB;

				
              
			   $('#DECMANVL').html(DECMANVL);
			   $('#ENCMANVL').html(ENCMANVL);
			   $('#DECMANNB').html(DECMANNB);
			   $('#ENCMANNBCLT').html(ENCMANNBCLT);
			   $('#ENCMANNB').html(ENCMANNB);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* 01/10/2018*/		
INFO_GAB=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_GAB",
            dataType: "json",

            success: function (data) {
				var DECGABVL = data[0].DECGABVL;
				var ENCGABVL = data[0].ENCGABVL;
				var DECGABNB = data[0].DECGABNB;
				var ENCGABNBCLT = data[0].ENCGABNBCLT;
				var ENCGABNB = data[0].ENCGABNB;

				
              
			   $('#DECGABVL').html(DECGABVL);
			   $('#ENCGABVL').html(ENCGABVL);
			   $('#DECGABNB').html(DECGABNB);
			   $('#ENCGABNBCLT').html(ENCGABNBCLT);
			   $('#ENCGABNB').html(ENCGABNB);
            },
            error: function (result) {
                alert("Error");
            }
        });
/* 01/10/2018*/		
INFO_MED=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_MED",
            dataType: "json",

            success: function (data) {
				var DECMEDVL = data[0].DECMEDVL;
				var ENCMEDVL = data[0].ENCMEDVL;
				var DECMEDNB = data[0].DECMEDNB;
				var ENCMEDNBCLT = data[0].ENCMEDNBCLT;
				var ENCMEDNB = data[0].ENCMEDNB;

				
              
			   $('#DECMEDVL').html(DECMEDVL);
			   $('#ENCMEDVL').html(ENCMEDVL);
			   $('#DECMEDNB').html(DECMEDNB);
			   $('#ENCMEDNBCLT').html(ENCMEDNBCLT);
			   $('#ENCMEDNB').html(ENCMEDNB);
            },
            error: function (result) {
                alert("Error");
            }
        });

		/* 01/10/2018*/
INFO_BIZ=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_BIZ",
            dataType: "json",

            success: function (data) {
				var DECBIZVL = data[0].DECBIZVL;
				var ENCBIZVL = data[0].ENCBIZVL;
				var DECBIZNB = data[0].DECBIZNB;
				var ENCBIZNB = data[0].ENCBIZNB;
				var ENCBIZNBCLT = data[0].ENCBIZNBCLT;

				
              
			   $('#DECBIZVL').html(DECBIZVL);
			   $('#ENCBIZVL').html(ENCBIZVL);
			   $('#DECBIZNB').html(DECBIZNB);
			   $('#ENCBIZNB').html(ENCBIZNB);
			   $('#ENCBIZNBCLT').html(ENCBIZNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });	

INFO_ARI=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_ARI",
            dataType: "json",

            success: function (data) {
				var DECARIVL = data[0].DECARIVL;
				var ENCARIVL = data[0].ENCARIVL;
				var DECARINB = data[0].DECARINB;
				var ENCARINB = data[0].ENCARINB;
				var ENCARINBCLT = data[0].ENCARINBCLT;

				
              
			   $('#DECARIVL').html(DECARIVL);
			   $('#ENCARIVL').html(ENCARIVL);
			   $('#DECARINB').html(DECARINB);
			   $('#ENCARINB').html(ENCARINB);
			   $('#ENCARINBCLT').html(ENCARINBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });	
		
INFO_BEN=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_BEN",
            dataType: "json",

            success: function (data) {
				var DECBENVL = data[0].DECBENVL;
				var ENCBENVL = data[0].ENCBENVL;
				var DECBENNB = data[0].DECBENNB;
				var ENCBENNB = data[0].ENCBENNB;
				var ENCBENNBCLT = data[0].ENCBENNBCLT;

				
              
			   $('#DECBENVL').html(DECBENVL);
			   $('#ENCBENVL').html(ENCBENVL);
			   $('#DECBENNB').html(DECBENNB);
			   $('#ENCBENNB').html(ENCBENNB);
			   $('#ENCBENNBCLT').html(ENCBENNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
INFO_NAB=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_NAB",
            dataType: "json",

            success: function (data) {
				var DECNABVL = data[0].DECNABVL;
				var DECNABNB = data[0].DECNABNB;
				var ENCNABVL = data[0].ENCNABVL;
				var ENCNABNB = data[0].ENCNABNB;
				var ENCNABNBCLT = data[0].ENCNABNBCLT;

				
              
			   $('#DECNABVL').html(DECNABVL);
			   $('#DECNABNB').html(DECNABNB);
			   $('#ENCNABVL').html(ENCNABVL);
			   $('#ENCNABNB').html(ENCNABNB);
			   $('#ENCNABNBCLT').html(ENCNABNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
INFO_ZAGH=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_ZAGH",
            dataType: "json",

            success: function (data) {
				var DECZAGHVL = data[0].DECZAGHVL;
				var ENCZAGHVL = data[0].ENCZAGHVL;
				var DECZAGHNB = data[0].DECZAGHNB;
				var ENCZAGHNB = data[0].ENCZAGHNB;
				var ENCZAGHNBCLT = data[0].ENCZAGHNBCLT;

				
              
			   $('#DECZAGHVL').html(DECZAGHVL);
			   $('#ENCZAGHVL').html(ENCZAGHVL);
			   $('#DECZAGHNB').html(DECZAGHNB);
			   $('#ENCZAGHNB').html(ENCZAGHNB);
			   $('#ENCZAGHNBCLT').html(ENCZAGHNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
INFO_BEJ=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_BEJ",
            dataType: "json",

            success: function (data) {
				var DECBEJVL = data[0].DECBEJVL;
				var ENCBEJVL = data[0].ENCBEJVL;
				var DECBEJNB = data[0].DECBEJNB;
				var ENCBEJNB = data[0].ENCBEJNB;
				var ENCBEJNBCLT = data[0].ENCBEJNBCLT;

				
              
			   $('#DECBEJVL').html(DECBEJVL);
			   $('#ENCBEJVL').html(ENCBEJVL);
			   $('#DECBEJNB').html(DECBEJNB);
			   $('#ENCBEJNB').html(ENCBEJNB);
			   $('#ENCBEJNBCLT').html(ENCBEJNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
INFO_JEN=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_JEN",
            dataType: "json",

            success: function (data) {
				var DECJENVL = data[0].DECJENVL;
				var ENCJENVL = data[0].ENCJENVL;
				var DECJENNB = data[0].DECJENNB;
				var ENCJENNB = data[0].ENCJENNB;
				var ENCJENNBCLT = data[0].ENCJENNBCLT;

				
              
			   $('#DECJENVL').html(DECJENVL);
			   $('#ENCJENVL').html(ENCJENVL);
			   $('#DECJENNB').html(DECJENNB);
			   $('#ENCJENNB').html(ENCJENNB);
			   $('#ENCJENNBCLT').html(ENCJENNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
INFO_KAIR=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_KAIR",
            dataType: "json",

            success: function (data) {
				var DECKAIRVL = data[0].DECKAIRVL;
				var ENCKAIRVL = data[0].ENCKAIRVL;
				var DECKAIRNB = data[0].DECKAIRNB;
				var ENCKAIRNB = data[0].ENCKAIRNB;
				var ENCKAIRNBCLT = data[0].ENCKAIRNBCLT;

				
              
			   $('#DECKAIRVL').html(DECKAIRVL);
			   $('#ENCKAIRVL').html(ENCKAIRVL);
			   $('#DECKAIRNB').html(DECKAIRNB);
			   $('#ENCKAIRNB').html(ENCKAIRNB);
			   $('#ENCKAIRNBCLT').html(ENCKAIRNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		
INFO_SOU=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_SOU",
            dataType: "json",

            success: function (data) {
				var DECSOUVL = data[0].DECSOUVL;
				var ENCSOUVL = data[0].ENCSOUVL;
				var DECSOUNB = data[0].DECSOUNB;
				var ENCSOUNB = data[0].ENCSOUNB;
				var ENCSOUNBCLT = data[0].ENCSOUNBCLT;

				
              
			   $('#DECSOUVL').html(DECSOUVL);
			   $('#ENCSOUVL').html(ENCSOUVL);
			   $('#DECSOUNB').html(DECSOUNB);
			   $('#ENCSOUNB').html(ENCSOUNB);
			   $('#ENCSOUNBCLT').html(ENCSOUNBCLT);
            },
            error: function (result) {
                alert("Error");
            }
        });
		/* 28/09/2018*/
INFO_MON=$.ajax({
            type: "GET",
            url: "../controller/api/INFO_MON",
            dataType: "json",

            success: function (data) {
				var DECMONVL = data[0].DECMONVL;
				var ENCMONVL = data[0].ENCMONVL;
				var DECMONNB = data[0].DECMONNB;
				var ENCMONNBCLT = data[0].ENCMONNBCLT;
				var ENCMONNB = data[0].ENCMONNB;

				
              
			   $('#DECMONVL').html(DECMONVL);
			   $('#ENCMONVL').html(ENCMONVL);
			   $('#DECMONNB').html(DECMONNB);
			   $('#ENCMONNBCLT').html(ENCMONNBCLT);
			   $('#ENCMONNB').html(ENCMONNB);
            },
            error: function (result) {
                alert("Error");
            }
        });		
		/* 28/09/2018*/
		totale_genre=$.ajax({
            type: "GET",
            url: "../controller/api/totale_genre",
            dataType: "json",

            success: function (data) {
				var Decnb = data[0].Decnb;
				var Decnbclt = data[0].Decnbclt;
				var Decvl = data[0].Decvl;
				var Encoursgnb = data[0].Encoursgnb;
				var Encoursgnbclt = data[0].Encoursgnbclt;
				var Encoursgvl = data[0].Encoursgvl;

				
              
			   $('#Decnb').html(Decnb);
			   $('#Decnbclt').html(Decnbclt);
			   $('#Decvl').html(Decvl);
			   $('#Encoursgnb').html(Encoursgnb);
			   $('#Encoursgnbclt').html(Encoursgnbclt);
			   $('#Encoursgvl').html(Encoursgvl);
            },
            error: function (result) {
                alert("Error");
            }
        });		
		
		
		
		
		
		
		
		