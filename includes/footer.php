
	<!-- jquery-->
	<script src="js/jquery-3.5.0.min.js"></script>
	<!-- Popper js -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Imagesloaded js -->
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<!-- Validator js -->
	<script src="js/validator.min.js"></script>
	<!-- Custom Js -->
	<script src="js/main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>

		$(function(){
			
			<?php
			// toastr output & session reset			
			if(isset($_SESSION['toastr']))
			{
				echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
				unset($_SESSION['toastr']);
			}
			?>    
			  
		});
	</script>


</body>

</html>