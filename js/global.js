function notificaErrore(targetNode, testo, divAlert, formErr) {
    divAlert.append("<p>"+testo+"</p>");
    divAlert.show();
    if(targetNode != null) targetNode.addClass("error");
    if(formErr != null) formErr.find(".error").first().focus();
}

function pulisciErrori(divAlert, formErr) {
    divAlert.find("p").not(".intestazione-alert").remove();
    divAlert.hide();
    if(formErr != null) formErr.find("input").removeClass("error");
}

function validaFormUtente(validazionePassword, alertErrore, form) {

    pulisciErrori(alertErrore,form);
    var formValido = true;
    var anagrafica = $("#nome, #cognome");
    anagrafica.each(function() {
        var testo = $(this).val().trim();
        if(testo.length == 0) {
            notificaErrore($(this),"Campo "+$(this).attr("name")+" obbligatorio",$(".alert.errore"),$("form"));
            formValido = false;
        }

        if(/\d+/.test(testo)){
            notificaErrore($(this),"Il campo "+$(this).attr("name")+" non può contenere numeri ",$(".alert.errore"),$("form"));
            formValido = false;
        }

    });

    var email = $("#email");
    //espressione regolare che valida un'email a grandi linee. Presa da
    //https://stackoverflow.com/questions/46155/how-to-validate-email-address-in-javascript quarta risposta
    if (/[^\s@]+@[^\s@]+\.[^\s@]+/.test(email.val().trim()) == false) {
        notificaErrore(email,"Inserire un'<span lang='en'> email </span> valida",alertErrore,form);
        formValido = false;
    }



    if(validazionePassword) {

        var password = $("#password");
        var password2 = $("#password2");

        if (!validaPassword(password, password2,alertErrore,form))
            formValido = false;
    }

    return formValido;
}

function validaPassword(password, password2, divErrore, formErrore) {

    passwordValide = true;

    if (password.val().trim().length == 0) {
        notificaErrore(password,"Inserire una nuova <span lang='en'> password </span> valida",divErrore,formErrore);
        passwordValide = false;
    }
    else if (password2.val().trim().length == 0) {
        notificaErrore(password2,"Si prega di ripetere la nuova <span lang='en'> password </span>",divErrore,formErrore);
        passwordValide = false;
    }
    else if (password.val() != password2.val()) {
        notificaErrore(password2,"Le <span lang='en'> password </span> non combaciano",divErrore,formErrore);
        passwordValide = false;
    }

    return passwordValide;
}
