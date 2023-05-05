<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@400;600&family=Barlow:wght@400;500;600&display=swap" rel="stylesheet">
    <style>

		  body{
		  	background:#fff;
		  }
#bg {
  width: 1000px;
  height: 432px;
 
  margin:60px;
 	float: left; 
 		
}

#id {
  width:312px;
  height:432px;
  position:absolute;
  opacity: 0.88;
font-family: sans-serif;

		  	transition: 0.4s;
		  	background-color: #FFFFFF;
		  	border-radius: 2%;
			  
		}


@font-face {
  font-family: 'Lora';
  src: url('bootstrap/fonts/lora-regular.ttf');
  font-weight: normal;
}

#id::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url('./images/bg4.png');
  background-repeat:repeat-x;
  background-size: 312px 432px;
  opacity: 1;
  z-index: -1;
  text-align:center;
  border:1px solid #000;
 
}
 .container{
		  	font-size: 12px;
		  	font-family: sans-serif;
		    
		  }
		 .id-1{
		  	transition: 0.4s;
		  	width:312px;
		  	height:432px;
		  	background: #FFFFFF;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:370px;
		  	
			

		  	
		  }
		  .vertical-text {
  writing-mode: vertical-rl;
  transform: rotate(180deg);
  position: absolute;
 margin-left: 5px;
  bottom: 0%; /* Adjust to desired value */
   /* Adjust to desired value */
  font-size: 10px;
  font-family: 'Barlow';
  font-weight: 600;
  letter-spacing: 1px;
  color: green;
  display: block; /* create a block-level element */
    width: 60px; /* set the width to your desired size */
    overflow: hidden; /* hide the overflow */
    text-overflow: ellipsis; /* add an ellipsis (...) to indicate truncated text */
    white-space: nowrap;
}
	</style>
</head>
<body>
	<script type="text/javascript">
		window.print();
		// setTimeout(function() {
		// 	window.close()
		// }, 5000)
	</script>

	<div id="bg">
		<div id="id">
			<br><br><br><br><br><br><br>
			<center>
				</center>
				<?php
             	 	if($imageSrc!=""){          
						echo "<img src='images/$profilePhoto' height='110px' width='110px' alt='' style='margin-left:20%; margin-top:-3%;'>";
   
									    }
								else{
									echo"<img src='admin/images/profile.jpg' height='150px' width='160px' alt='' style='border: 2px solid black;'>";	   
														     	
									} 
             	 	 ?>              <div class="container" align="center">
      
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
							
	  <div style="position: absolute; left: 26%; top: 69%; margin-left:0%; margin-top:-3%; font-size:22px; font-family: 'Lora';">
	  <span style="font-size:36px;"><?php if(isset($firstName)){echo $firstName;} ?></span></div>
	  <div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
  <span><br>
  
  <br>

</div>
<span style="position: absolute; left: 50%;right: 10%;margin-top: 110px; font-size:13px; font-family: 'Lora';"><?php if(isset($position)){echo $position;} ?></span>
<p style="margin-top:20%">&nbsp;</p>
<div style="margin-left: 40%; margin-top:10px; font-size:18px; font-family: 'Lora'; text-align:center;">
  <span style="font-size:16px;"><?php if(isset($firstName)){echo $firstName;} ?> <?php if(isset($lastName)){echo $lastName;} ?></span>
</div>

	  <p style="position: absolute; top: 0; margin-left:172px; margin-top:112%; font-size:14px; font-family: 'Lora';">ID NO. <?php if(isset($id)){ echo$id;} ?></p>
	 
		  <p style="margin-top:-4%">&nbsp;</p>
      	<p style="margin-top:-4%">&nbsp;</p>
       <p style="margin-top:-4%">&nbsp;</p>
	   <span class="vertical-text" style="position: absolute; top: 65%;white-space: pre-line; font-weight:bold"><?php if(isset($division)){ echo $division;} ?></span>
        

		  
      
              
			</div>
		</div>
		<div class="id-1">
<div id="id">
			<br><br><br><br><br><br><br>
			<center>
				
				</center>
				<?php
             	 	if($imageSrc!=""){          
						echo "<img src='images/$profilePhoto' height='110px' width='110px' alt='' style='margin-left:20%; margin-top:-3%;'>";
   
									    }
								else{
									echo"<img src='admin/images/profile.jpg' height='150px' width='160px' alt='' style='border: 2px solid black;'>";	   
														     	
									} 
             	 	 ?>              <div class="container" align="center">
      
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
							
      <div style="position: absolute; left: 26%; top: 69%; margin-left:0%; margin-top:-3%; font-size:22px; font-family: 'Lora';">
	  <span style="font-size:36px;"><?php if(isset($firstName)){echo $firstName;} ?></span></div>
	  <div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
  <span><br>
  
  <br>

</div>
<span style="position: absolute; left: 50%;right: 10%;margin-top: 110px; font-size:13px; font-family: 'Lora';"><?php if(isset($position)){echo $position;} ?></span>
<p style="margin-top:20%">&nbsp;</p>
<div style="margin-left: 40%; margin-top:10px; font-size:18px; font-family: 'Lora'; text-align:center;">
  <span style="font-size:16px;"><?php if(isset($firstName)){echo $firstName;} ?> <?php if(isset($lastName)){echo $lastName;} ?></span>
</div>

	  <p style="position: absolute; top: 0; margin-left:172px; margin-top:112%; font-size:14px; font-family: 'Lora';">ID NO. <?php if(isset($id)){ echo$id;} ?></p>
	 
		  <p style="margin-top:-4%">&nbsp;</p>
      	<p style="margin-top:-4%">&nbsp;</p>
       <p style="margin-top:-4%">&nbsp;</p>
	   <span class="vertical-text" style="position: absolute; top: 65%;white-space: pre-line"><?php if(isset($division)){ echo $division;} ?></span>
        

		  
      
      
              
			</div>
		</div>
	</div>

	</div>
</body>
</html>