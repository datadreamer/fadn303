$(function(){

  $("#jstest1a").click(function(){
    $("#jstest1b").toggle();
  });


  $("#jstest2a").on({
    mouseenter: function(){
      $("#jstest2b").css("background-color", "red");
    },
    mouseleave: function(){
      $("#jstest2b").css("background-color", "#0066cc");
    },
    click: function(){
      $("#jstest2b").css("background-color", "green");
    }
  });


  $("#jstest3a").on({
    mouseenter: function(){
      $("#jstest3b").hide();
    },
    mouseleave: function(){
      $("#jstest3b").show();
    },
    click: function(){
      $("#jstest3c").toggle();
    }
  });


  $("#jstest4a").on({
    mouseenter: function(){
      $("#jstest4b").fadeOut();
    },
    mouseleave: function(){
      $("#jstest4b").fadeIn();
    },
    click: function(){
      $("#jstest4c").fadeToggle();
    }
  });


  $("#jstest5a").on({
    mouseenter: function(){
      $("#jstest5b").slideDown();
    },
    mouseleave: function(){
      $("#jstest5b").slideUp();
    },
    click: function(){
      $("#jstest5c").slideToggle();
    }
  });


  $("#jstest6a").on({
    mouseenter: function(){
      $("#jstest6b").animate({
        marginLeft: '35%'
      });
    },
    mouseleave: function(){
      $("#jstest6b").animate({
        marginLeft: '0%'
      });
    },
    click: function(){
      $("#jstest6b").animate({
        marginTop: '+=20px'
      });
    }
  });


  $("#jstest7a").on({
    mouseenter: function(){
      $("#jstest7b").animate({width:'65%'});
      $("#jstest7b").animate({height:'200px'});
    },
    mouseleave: function(){
      $("#jstest7b").animate({height:'50px'});
      $("#jstest7b").animate({width:'30%'});
    }
  });

});
