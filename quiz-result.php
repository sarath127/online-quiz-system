<?php require_once 'templates/header.php';?>
<?php 
	if( !empty( $_POST )){
		try {
			$user = new Cl_User();
			$result = $user->getAnswers( $_POST );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}else{
		header('Location: quiz-result.php');exit;
	}
?>
	
     	<div class="container">
			
     		
     			<br>
	     		
					<center><h1>Thank you for your participation</h1></center>
					<center><h1>Enjoy the events</h1></center>
                 <center><a href="https://www.youtube.com/channel/UCeRfjvDEiNjdh6w7a-8hLAA"><img src="img/Techvizha.png"  alt="" height="400" width="700"/></a></center>
                    
					
					
				
	     		
     		
     	</div>
     <!-- /container -->
<?php require_once 'templates/footer.php';?>