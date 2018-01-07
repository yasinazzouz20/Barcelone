$(document).ready(function () {

    //pour pouvoir utiliser regex
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");


    //champs -> identifiants id=""
    $("#form_commande").validate({
        rules: {
            email1: "required",
            email2: {
                equalTo: "#email1"                
            },
            nom: "required",
            prenom: "required",
            telephone: {
                required: true,
                regex: /^(0)[0-9]{2,3}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            adresse: "required",
            numero: "required",
            codepostal: {
                required: true,
                min: 1000,
                max: 9999
            },
            localite: "required",
            submitHandler: function (form) {
                form.submit();
            }
        }
    });

    //TRADUCTION DES MESSAGES DE VALIDATION EN FRANÇAIS
    $.extend($.validator.messages, {
        required: "Veuillez renseigner ce champ.",
        email: "Veuillez renseigner un email valide.",
        url: "Url non conforme.",
        date: "Date non valide.",
        number: "Veuillez n'entrer que des chiffres.",
        digits: "Veuillez n'entrer que des chiffres.",
        equalTo: "Les champs ne concordent pas.",
        maxlength: $.validator.format("Entrez au maximum {0} caract&egrave;res."),
        minlength: $.validator.format("Entrez au minimum {0} caract&egrave;res."),
        rangelength: $.validator.format("Votre entrée doit compter entre {0} et {1} caract&egrave;res."),
        range: $.validator.format("Entrez un nombre entre {0} et {1}."),
        max: $.validator.format("Entrez un nombre inférieur ou égal à {0}."),
        min: $.validator.format("Entrz un nombre de minimum {0}."),
        regex: "Format non conforme"
    });


});



// code de l'autre page gt_fonction

$(document).ready(function(){
    
    $("#gt_carousel").carousel({
        interval:1500,
        pause:false
    });
    
    //Traitement direct de la liste deroulante
    $('#id_tmt_type_produit').change(function(){
       //element appartenant a la balise select
       
        var parametre = $(this).attr('name');
        var val = $(this).val();
        //recréer l'URL
        var refresh = 'index.php?' + parametre + '=' + val + '&choix_type=1';
        window.location.href = refresh;
    });
    $("#choix_type").hide();
    $("#balise3").hide();
    $("#balise1").on(
            'mouseover',function(){
               $("#balise4").css({
                  'color':'red',
                  'font-weight':'hold'
               }); 
               $("#balise3").show();
            }).on(
                    'mouseout', function(){
                     $("#balise4").css({
                         'color':'blue',
                  'font-weight':'hold'
                     }),
                             $("#balise3").hide();
                    
                    });
    $("#lien1,#lien2,#lien3").hide();
    $("#lien4").click(function(){
       $("#lien1").show(); 
       $("#lien4").hover(function(){
          $("#lien2,#lien3").show(); 
          $("#lien3").hover(function(){
             $("#lien1,#lien2,#lien3").hide ();
          });
       });
    });
    
    
    $("#coucou").hide();
    
    $("#clic_couleur").click(function(){
      $(".clic").css("color","red"); 
      $("#coucou").show();
      $("#ajoutClasse").addClass("txtBleu");
    });
    
    
});
