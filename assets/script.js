$body = $("body");

// $(document).on({
//     ajaxStart: function() { $body.addClass("loading");    },
//      ajaxStop: function() { $body.removeClass("loading"); }    
// });

window.onload = function(){
    $body.removeClass("loading");
}

$(function(){
  $('[data-toggle="tooltip"]').tooltip({
      placement : 'top'
  });
});
