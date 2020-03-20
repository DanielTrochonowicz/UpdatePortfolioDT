

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">

        <meta name="description" content="Jestem poczatkujacym programista">
        <meta name="keywords" content="Java, Junior Java Developer, Java Developer">
        <meta name="author" content="Programista, Trochonowicz Daniel">

        <title>Daniel Trochonowicz</title>
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />
    </head>

    <div id="particles-js">

    <header>
    <?php
$name=isset($_POST['name']) ? $_POST['name'] : "";
$email=isset($_POST['email']) ? $_POST['email'] : "";
$message=isset($_POST['message']) ? $_POST['message'] : "";
if($name && $email && $message){
 $headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit";
 $message_body="Formularz kontaktowy wysłany ze strony http://danieltrochonowicz.pl\n";
 $message_body.="Imię i nazwisko: $name\n";
 $message_body.="Adres email: $email\n";
 $message_body.=$message;
 if(mail("trochonowiczdaniel@wp.pl","Formularz kontaktowy ze strony http://DanielTrochonowicz.pl",$message_body,$headers)){
 $json=array("status"=>1,"msg"=>"<p class='status_ok'>Twój formularz został pomyślnie wysłany.</p>");
 }
 else{
 $json=array("status"=>0,"msg"=>"<p class='status_err'>Wystąpił problem z wysłaniem formularza.</p>"); 
 }
}
else{
 $json=array("status"=>0,"msg"=>"<p class='status_err'>Proszę wypełnić wszystkie pola przed wysłaniem.</p>"); 
}
echo '<h1 class="home wow fadeInUp" data-wow-duration="2s" data-wow-delay="2.2s">Wiadomość  Wysłana</h1>';
echo '<h1 class="home wow fadeInUp" data-wow-duration="2s" data-wow-delay="2.2s">Dziekuje za kontakt.</h1>';           
?> 
    </header>

    <!-- HOME SECTION -->
    <section id="home" class="home wow fadeIn" data-wow-duration="2s" data-wow-delay="1.2s" >
        <div class="name">
            <img src="images/3.jpg" class="photo home wow fadeInUp" data-wow-duration="3s" data-wow-delay="1.9s" style="
            width: 15rem; height: 15rem; margin-left: auto; margin-right: auto; margin-bottom: 5%; object-fit: cover; border-radius: 50%;">
            <h1 class="home wow fadeInUp" data-wow-duration="3s" data-wow-delay="1.9s">Daniel Trochonowicz</h1>
            <h5 class="home wow fadeInDown" data-wow-duration="4s" data-wow-delay="1.6s">Java Developer</h5>
            <h5 class="home wow fadeInDown" data-wow-duration="3s" data-wow-delay="1.4s">Web Developer</h5>
        </div>
    
    </section>
    </div>
</form>
    <body>

        <!-- Jquery cdn Link-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha256-z6FznuNG1jo9PP3/jBjL6P3tvLMtSwiVAowZPOgo56U=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js" integrity="sha256-+u54FaX9J+k40eAcg5K2YzICSQjrEYBI9gju5nE3HfY=" crossorigin="anonymous"></script>
        <script src="js/particles-script.js"></script>
        <script type="text/javascript">
        new WOW().init();

        $(window).scroll(function(){
            var sticky = $("header");
            if($(window).scrollTop() >= 100){
                sticky.addClass("fixed");
            }else{
                sticky.removeClass("fixed");
            }
        });
        </script>
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
         <script>
             $(document).ready(function() {
             $("html").on("submit","#contact_form",function(e){
                 e.preventDefault();
                 $("#send_form_status").html('').hide();
                 var data=$("#contact_form").serialize();
                 $.post("/send_form.php",data,function(res){
                 $("#send_form_status").html(res.msg).show();
                 if(res.status==1){ 
                     $("#contact_form")[0].reset();
                 } 
                 });
             });
          });
         </script>
    </body>
</html>