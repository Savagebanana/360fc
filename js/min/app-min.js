function submitForm(){console.log("TestSubmit");var e="./php/form.php",t={};$("#week").find(":input").each(function(){t[this.name]="checkbox"===$(this).attr("type")?$(this).prop("checked"):$(this).val()});var o=$("#sucmessage").append("<p>Thank You! Your message has been sent. You can reach Coach Paul at (416) 707-8850 with any questions, and he will be in contact with you this week to confirm your registration and collect your payment.</p>");$.ajax({type:"POST",url:e,data:t,success:o})}function addCamper(){document.getElementById("kid-two").style.display="block",document.getElementById("add-camper").style.display="none"}$(document).foundation({orbit:{animation:"fade",timer_speed:7e3,pause_on_hover:!0,resume_on_mouseout:!0,animation_speed:500,slide_number:!1,navigation_arrows:!1,swipe:!0,bullets:!1}});var myElement=document.getElementById("header"),headroom=new Headroom(myElement);headroom.init(),$(".project-item").click(function(){var e="#"+$(this).data("project-id");$(".project").hide(),$(e).show(),$("html, body").animate({scrollTop:$(e).offset().top-76},600)}),$(".project-close").click(function(){$(this).closest(".project").hide(),$("html, body").animate({scrollTop:$("#our-team").offset().top-76},600)}),$("#contact").submit(function(e){console.log("contact script submit"),$(this).each(function(){var e=$(this).find(":input[data-invalid]").length;if(0===e){var t="./php/form.php",o=$(this).serialize(),a=$(this).append("<p>Thank You! Your message has been sent.</p>");$.ajax({type:"POST",url:t,data:o,success:a})}}),e.preventDefault()});
//# sourceMappingURL=./app-min.js.map