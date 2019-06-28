$("a[class*=btn]").on("click", function (e) {
    var link = this;
    e.preventDefault();
    $.confirm({
        useBootstrap: false,
        type: 'blue',
        title: 'Conferma',
        content: "<p>Procedere con l'eliminazione della prenotazione?</p>",
        buttons: {
            "Procedi": function () {
                window.location = link.href;
            },
            "Annulla": {}
        }
    });

});
