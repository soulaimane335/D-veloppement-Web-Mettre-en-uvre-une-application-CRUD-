$(document).ready(function() {
    // Initialisation du calendrier JQuery
    $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });

    // Fonction $.get() pour obtenir les données envoyées par le serveur
    function chargerExercices() {
        $.get("afficher_exercices.php", function(data) {
            $("#liste-exercices").html(data);
        });
    }

    // Chargement de la table au démarrage
    chargerExercices();

    // Fonction $.post() pour envoyer les données au serveur
    $("#btn-envoyer").click(function() {
        var titre_val = $("#titre").val();
        var auteur_val = $("#auteur").val();
        var date_val = $("#datepicker").val();

        if(titre_val !== "" && auteur_val !== "" && date_val !== "") {
            $.post("ajouter_exercice.php", {
                titre: titre_val,
                auteur: auteur_val,
                date_creation: date_val
            }, function(response) {
                chargerExercices(); // Recharger le calque <div>
                // Vider les champs texte
                $("#titre").val("");
                $("#auteur").val("");
                $("#datepicker").val("");
            });
        } else {
            alert("Veuillez remplir tous les champs.");
        }
    });

    // Suppression avec $.post()
    $(document).on("click", ".btn-supprimer", function() {
        if(confirm("Confirmer la suppression ?")) {
            var exe_id = $(this).attr("data-id");
            $.post("supprimer_exercice.php", { id: exe_id }, function(response) {
                chargerExercices();
            });
        }
    });
});