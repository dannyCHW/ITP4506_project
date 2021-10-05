function menubar(){

    $('.toggle').click(function () {
        if ($(".toggle").attr("class") == "toggle") {
          $('.toggle').addClass("active");
          $('.navigation').addClass("active");
        } else {
          $('.toggle').removeClass("active");
          $('.navigation').removeClass("active");
        }
      });
      $('.list').hover(function () {
        $('.list').removeClass("active");
        $(this).addClass("active");
      }).mouseleave(function () {
        $('.list').removeClass("active");
      });

      $('#logOut').click(function (){
        window.location = "logoutSession.php";
      });
      
}