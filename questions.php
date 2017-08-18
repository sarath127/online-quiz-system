<?php require_once 'templates/header.php';?>
<?php 
	if( !empty( $_POST )){
		try {
			$user = new Cl_User();
			$results = $user->getQuestions($_POST  );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
		
	}else{
		$_SESSION['error'] = CHOOSE_CATEGORY;
		header('Location: home.php');exit;
	}
?>
<script language="JavaScript">

function disableEnterKey(e)
{
     var key;      
     if(window.event)
          key = window.event.keyCode; //IE
     else
          key = e.which; //firefox      

     return (key != 13);
}

</script>
<body oncopy="return false" oncut="return false" onpaste="return false"  onselectstart="return false;" style="-moz-user-select: none;">
     	<div class="container">
		
     		<br>
					<center><h1> Timer : <span id='timer'></span> </h1></center>
	     			<form  role="form" id='quiz_form' method="post" action="quiz-result">
						<?php
						
						$remainder = $results['remainder'];
						$number_question =  $results['number_question'];
						$rowcount =  $results['rowcount'];
						$i = 0;
						$j = 1; $k = 1;
						?>
						<?php foreach ($results['questions'] as $result) {
							
							 if ( $i == 0) echo "<div class='cont' id='question_splitter_$j'>";?>
							 
							<div id='question<?php echo $k;?>' >
							<p class='questions' id="qname<?php echo $j;?>"> <?php echo $k?>.<?php echo $result['question_name'];?></p>
							<input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
							<br/>
							<input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
							<br/>
							
							<?php if(isset( $result['answer3'] ) && !empty( $result['answer3'] )){ ?>
							<input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
							<br/>
							<?php } ?>
							
							<?php if(isset( $result['answer4'] ) && !empty( $result['answer4'] )){ ?>
							<input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
							<br/>
							<?php } ?>
							
							
							
							
							<input type="radio" checked='checked' style='display:none' value="smart_quiz" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
							<br/>
							</div>
							<?php
								 $i++; 
								 if ( ( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 ) ) {
								 	echo "<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
								 	echo "</div>";
								 }  elseif ( $rowcount > $number_question  ) {
								 	if ( $j == 1 && $i == $number_question ) {
										echo "<button id='".$j."' class='next btn btn-info' type='button'>Next</button>";
										echo "</div>";
										$i = 0;
										$j++;           
									} elseif ( $k == $rowcount ) { 
										echo " <button id='".$j."' class='previous btn btn-info' type='button'>Previous</button>
													<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
										echo "</div>";
										$i = 0;
										$j++;
									} elseif ( $j > 1 && $i == $number_question ) {
										echo "<button id='".$j."' class='previous btn btn-info' type='button'>Previous</button>
								                    <button id='".$j."' class='next btn btn-info' type='button' >Next</button>";
										echo "</div>";
										$i = 0;
										$j++;
									}
									
								 }
								  $k++;
						     } ?>	
						</form>
	     		
		</div>	
		<body oncontextmenu="return false">
		</body>
		</body>

<script>
		$('.cont').addClass('hide');
		$('#question_splitter_1').removeClass('hide');
		$(document).on('click','.next',function(){
		    last=parseInt($(this).attr('id'));  console.log( last );   
		    nex=last+1;
		    $('#question_splitter_'+last).addClass('hide');
		    
		    $('#question_splitter_'+nex).removeClass('hide');
		});
		
		$(document).on('click','.previous',function(){
		    last=parseInt($(this).attr('id'));     
		    pre=last-1;
		    $('#question_splitter_'+last).addClass('hide');
		    
		    $('#question_splitter_'+pre).removeClass('hide');
		});


		
        var c = 900;
        var t;
        timedCount();

        function timedCount() {

        	var hours = parseInt( c / 3600 ) % 24;
        	var minutes = parseInt( c / 60 ) % 60;
        	var seconds = c % 60;

        	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            
        	$('#timer').html(result);
            if(c == 0 ){
            	setConfirmUnload(false);
                $("#quiz_form").submit();
            }
            c = c - 1;
            t = setTimeout(function(){ timedCount() }, 1000);
        }
	</script>

<?php require_once 'templates/footer.php';?>		

<script type="text/javascript">

    // Prevent accidental navigation away
    setConfirmUnload(true);
    function setConfirmUnload(on)
    {
        window.onbeforeunload = on ? unloadMessage : null;
    }
    function unloadMessage()
    {
        return 'Your Answered Questions are resetted zero, Please select stay on page to continue the war';
    }

    $(document).on('click', 'button:submit',function(){
    	setConfirmUnload(false);
    });

 

</script>
