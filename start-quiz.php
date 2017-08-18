<?php require_once 'templates/header.php';?>
<?php 				
	try {
		$user = new Cl_User();
		$categories = $user->getCategory();
		if(empty($categories)){
			$_SESSION['error'] = NO_CATEGORY;
			header('Location: index.php');exit;
		}
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
		header('Location: index.php');exit;
	}
	
?>
	
     	<div class="container">
			
     		
     			<?php require_once 'templates/tutorials.php';?>
	     		<div class="container">
				<br>
				<br>
				<br>
				<br>
				<br>
				
				
	     			<center><h1>Choose The Batch </h1></center>
					<br>
					
					<form  method="post" id='signin' name="signin" action="questions.php">
						<div class="form-group">
					
							<select class="form-control" name="category" id="category">
								<option value="">Choose The batch</option>
								<?php  foreach ($categories as $key=>$category){ ?>
									<option value="<?php echo $key; ?>"><?php echo $category; ?></option>
								<?php } ?>
							</select> 
							<span class="help-block"></span>
						</div>
	
						
	
						<br>
						
						<center><button id="start_btn" class="btn btn-success btn-lg" type="submit"><i class="fa fa-thumbs-o-up"></i> Take Test</button></center>
						
					</form>
				</div>
	     		
     		
			
     	</div>
  
    
<script src="js/start.js"></script>

	
