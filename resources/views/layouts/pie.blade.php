
<! ========== FOOTER ======================================================================================================>    


	</br></br>

	<div id="f">
		<div class="container">
			<div class="row center">
				<!-- ADDRESS -->
				<div class="col-lg-3">
					<h4>Proyecto Final</h4>
					<p>
						Montesanto Karen<br/>
						Rosa Allende Damian<br/>
						Texeira Lucas<br/>
					</p>
					<p>
						<i class="fa fa-mobile"></i> +55 4893.8943<br/>
						<i class="fa fa-envelope-o"></i> hello@yourdomain.com
					</p>
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
