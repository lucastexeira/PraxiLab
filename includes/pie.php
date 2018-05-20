
<! ========== FOOTER ======================================================================================================>    
	
	<div id="f">
		<div class="container">
			<div class="row">
				<!-- ADDRESS -->
				<div class="col-lg-3">
					<h4>Our Studio</h4>
					<p>
						Some Ave. 987,<br/>
						Postal 64733<br/>
						London, UK.<br/>
					</p>
					<p>
						<i class="fa fa-mobile"></i> +55 4893.8943<br/>
						<i class="fa fa-envelope-o"></i> hello@yourdomain.com
					</p>
				</div>
			</div>
		</div>
	</div>
	

  	<script>
		$(window).scroll(function() {
			$('.si').each(function(){
			var imagePos = $(this).offset().top;
	
			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});
		});
	</script>    

	<script>
		$(window).scroll(function() {
			if ($("#menu").offset().top > 320){
				$("#menu").removeClass("bg-transparent");
				$("#menu").addClass("bg-dark");
			} else {
				$("#menu").removeClass("bg-dark");
				}
			});
	</script> 

	<script>
		$("#verMas").click(function() {
		    $('html, body').animate({
		        scrollTop: $("#black").offset().top
		    }, 2000);
		});
	</script> 

  </body>
</html>
