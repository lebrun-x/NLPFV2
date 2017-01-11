$(document).ready(function () {
		$("#submitUser").click(submitUser);
	});

	var userName = false;
	var password = false;
	var userFirstname = false;
	var email = false;

	function surligne(champ, erreur)
	{
	   if(erreur)
	      champ.style.backgroundColor = "#fba";
	   else
	      champ.style.backgroundColor = "";
	}


	function verifName(champ)
	{
	   if(champ.value.length < 2 || champ.value.length > 41)
		{
		      surligne(champ, true);
		      alert("Veuillez entrer un nom ne dépassant pas les 40 caractères");
		    switch (champ.id)
		    {
		    	case 'name':
		    		userName = false;
		    		break;
	    		case 'firstname':
	    			userFirstname = false;
	    			break;
	    		default:
	    			return false;
		    }
		}
		   else
		   {
		      surligne(champ, false);
		      switch (champ.id)
			    {
			    	case 'name':
			    		userName = true;
			    		break;
		    		case 'firstname':
		    			userFirstname = true;
		    			break;
		    		default:
		    			return true;
			    }
		   }
		   verifUser();
	}

	function verifMail(champ)
	{
	   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	   if(!regex.test(champ.value))
	   {
	      surligne(champ, true);
	      alert("Veuillez entrer une adresse mail valide");
	      email = false;
	   }
	   else
	   {
	      surligne(champ, false);
	      email = true;
	   }
	 verifUser();  
	}

	function verifPassword(champ)
	{
		var regex = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
	   if(!regex.test(champ.value)) 
	   {
	      surligne(champ, true);
	      alert("Votre mot de passe doit faire au minimum 8 caractères et doit contenir au moins une majuscule et un nombre ou un caractère spécial");
	      password = false;
	   }
	   else
	   {
	      surligne(champ, false);
	      password = true;
	   }
	 verifUser();
	}

	function verifUser()
	{
		if (userName && userFirstname && password && email)
		{
			document.getElementById('submitUser').disabled = '';
		}
		else
		{
			document.getElementById('submitUser').disabled = 'disabled';
		}
	}