
<! ========== FOOTER ======================================================================================================>    


	</br></br>

	<div id="f">
		<div class="container">
			<div class="row mt centered">
				<!-- ADDRESS -->
				<div class="col-lg-12">
					<img width="100" src="{{asset('img/logos/logo_blanco_y_negro.png')}}" alt="">
					<p>
						Montesanto Karen | Rosa Allende Damian | Texeira Lucas
				</div>
			</div>
		</div>
	</div>
</footer>	
<! ========== SCRIPTS =====================================================================================================>
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
		$("#verMas").click(function() {
		    $('html, body').animate({
		        scrollTop: $("#black").offset().top
		    }, 2000);
		});
	</script> 

  </body>
</html>
