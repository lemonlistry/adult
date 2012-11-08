no permission
<script>
jQuery(function($) {
     if(window !== window.top.parent){
        $("body").html("no permission").css("min-width", window.innerWidth);
     }
}); 
</script>
