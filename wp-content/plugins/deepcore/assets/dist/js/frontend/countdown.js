!function(){jQuery(".countdown-w").each(function(){var e=jQuery(".days-w .count-w",this),o=jQuery(".hours-w .count-w",this),n=jQuery(".minutes-w .count-w",this),u=jQuery(".seconds-w .count-w",this),a=parseInt(jQuery(this).data("until"),10),c=jQuery(this).data("done"),r=jQuery(this),s=setInterval(function(){var t=Math.round(+new Date/1e3);if(a<=t)return clearInterval(s),void r.html(jQuery("<span />").addClass("done-w block-w").html(jQuery("<span />").addClass("count-w").text(c)));t=a-t;u.text(t%60),t=Math.floor(t/60),n.text(t%60),t=Math.floor(t/60),o.text(t%24),t=Math.floor(t/24),e.text(t)},1e3)});var t=jQuery(".countdown-clock").data("done"),e=new Date(jQuery(".countdown-clock").data("future")),o=new Date,n=e.getTime()/1e3-o.getTime()/1e3;(e-o)/864e5<100?jQuery(".countdown-clock").addClass("twoDayDigits"):jQuery(".countdown-clock").addClass("threeDayDigits"),n<0&&(n=0,jQuery(".countdown-message").html(t));jQuery(".countdown-clock").FlipClock(n,{clockFace:"DailyCounter",countdown:!0,autoStart:!0,callbacks:{stop:function(){jQuery(".countdown-message").html(t)}}})}(jQuery);