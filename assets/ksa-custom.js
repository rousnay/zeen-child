jQuery(".stage > .cycler > .entrance-thumb:first").addClass("active");
jQuery(".screen > .cycler > .entrance-thumb:first").addClass("active");

function cycleImages(){

      var $activeStage = jQuery('.stage > .cycler .active');
      var $nextStage = ($activeStage.next().length > 0) ? $activeStage.next() : jQuery('.stage > .cycler .entrance-thumb:first');
      $nextStage.css('z-index',2);//move the next image up the pile
      $activeStage.fadeOut(1500,function(){//fade out the top image
	      $activeStage.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $nextStage.css('z-index',3).addClass('active');//make the next image the top one
      });

      var $activeScreen = jQuery('.screen > .cycler .active');
      var $nextScreen = ($activeScreen.next().length > 0) ? $activeScreen.next() : jQuery('.screen > .cycler .entrance-thumb:first');
      $nextScreen.css('z-index',2);//move the next image up the pile
      $activeScreen.fadeOut(1500,function(){//fade out the top image
	      $activeScreen.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $nextScreen.css('z-index',3).addClass('active');//make the next image the top one
      });
    }

jQuery(document).ready(function(){
// run every 4s
setInterval('cycleImages()', 4000);
});