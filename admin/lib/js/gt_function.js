/*gt_function.js*/

//attendre que toute la page soit chargée
$(document).ready(function(){
    
    $("#gt_carousel").carousel({
        interval:9500,
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