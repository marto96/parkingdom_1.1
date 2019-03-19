$('.form').find('input, textarea').on('keyup blur focus', function (e) {

  var $this = $(this),
      label = $this.prev('label');

	  if (e.type == 'keyup') {
          alert("qwert");  
			if ($this.val() == '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');<!--  -->
			}
    }

});
(function(){
    $('.tab > a').click(function(){
 
});
})();

$('.tab a').on('click', function (e) {
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');
console.log(target);
  $('.tab-content > div').not(document.getElementById("signup")).hide();
  
  $("#login").fadeIn(600);
  
});
