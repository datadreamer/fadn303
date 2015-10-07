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


  $("#jstest8a").click(function(){
    var stuff = $("#jstest8b").text();
    $("#jstest8c").text(stuff);
  });


  $("#jstest9a").click(function(){
    $("#jstest9c").append("more stuff after!<br/>");
  });
  $("#jstest9b").click(function(){
    $("#jstest9c").prepend("more stuff before!<br/>");
  });


  $("#jstest10a").click(function(){
    $("#jstest10c").after("<div style='width:65%; background-color:#0099ff; padding: 20px 0px 20px 0px; margin-right: 5%; clear:both; font-size: 0.4em'>more after</div>");
  });
  $("#jstest10b").click(function(){
    $("#jstest10c").before("<div style='width:65%; background-color:#33ccff; padding: 20px 0px 20px 0px; margin-right: 5%; clear:both; font-size: 0.4em'>more before</div>");
  });

  $("#jstest11a").click(function(){
    var w = $("#jstest11a").width();
    var h = $("#jstest11a").height();
    $("#jstest11a").after("<br/>" + w +" "+ h);
  });

});
