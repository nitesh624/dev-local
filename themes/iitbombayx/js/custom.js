(function($) {
        Drupal.behaviors.myBehavior = {
          attach: function (context, settings) {
           // hide show function for faq page

               $('.showfaqque').next().hide(); //initialy hide all answers
               
               $('.showfaqque').unbind("click").click(function(){  //on click event called on question click

               if($(this).next().css('display') == 'block'){  //if answer is already open
                $(this).removeClass('showfaqque-close').next().slideToggle("slow"); // change down arrow to up arrow and close the answer
               }
               else { // if answer is closed
                $(this).addClass('showfaqque-close').next().slideToggle("slow"); // change down arrow to down arrow and open the answer
               }
           });
           }
          }



          // responsive main menu: drop down toggle

          $('#myResponsiveMenuButton').click(function() {           
                      
             if($(".nav-global").hasClass( "responsive" )) {
                $(".nav-global").removeClass( "responsive" );               
             }
             else{
                $(".nav-global").addClass( "responsive" );                                   
                $(".tempclass").css( "display","block");
             }
          });

          $('body').click(function() {           
                      
             if($(".nav-global").hasClass( "responsive" ))
                $(".nav-global").removeClass( "responsive" );               
            
          });


          //responsive sidebar menu

          // Create the dropdown base
          $("<select />").appendTo(".sidebar");

          // Create default option "Go to..."
          $("<option />", {
            "selected": "selected",
            "value"   : "",
            "text"    : "Go to..."
          }).appendTo(".sidebar select");

          // Populate dropdown with menu items
          $(".sidemenu a").each(function() {
            var el = $(this);
            $("<option />", {
              "value"   : el.attr("href"),
              "text"    : el.text()
            }).appendTo(".sidebar select");
          });

           // To make dropdown actually work
           // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
          $(".sidebar select").change(function() {
            window.location = $(this).find("option:selected").val();
          });


          
})(jQuery);

