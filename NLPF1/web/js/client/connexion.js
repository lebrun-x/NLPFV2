$(document).ready(function () {
		$("#submitConnexion").click(submitConnexion);
	});

	var userMail = false;
	var userPassword = false;

	function surligne(champ, erreur)
	{
	   if(erreur)
	      champ.style.backgroundColor = "#fba";
	   else
	      champ.style.backgroundColor = "";
	}
 	
 	function submitConnexion()
	{
		window.location = '/connexion/' + $("#mail").val() + '/' + $("#password").val();
	}

	function verifChamp(champ)
	{
	   if(champ.value.length <= 0)
	   {
	      surligne(champ, true);
	      switch (champ.id)
		    {
		    	case 'mail':
		    		userMail = false;
		    		break;
	    		case 'password':
	    			userPassword = false;
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
		    	case 'mail':
		    		userMail = true;
		    		break;
	    		case 'password':
	    			userPassword = true;
	    			break;
	    		default:
	    			return true;
		    }
	   }
	   verifConnexion();
	}

	function verifConnexion()
	{
		console.log(userPassword, userMail);
		if(userPassword && userMail)
			document.getElementById('submitConnexion').disabled = '';
		else
			document.getElementById('submitConnexion').disabled = 'disabled';
	}