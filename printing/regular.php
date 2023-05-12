<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;800&display=swap');


		body {
			background: #fff;
		}

		#bg {
			width: 1000px;
            height: 432px;
            float: left;

		}

		@media print {

			#id,
			#id-1 {
				transform: scale(1.40);
				transform-origin: top left;
			}
		}

		#id {
			width: 312px;
			height: 432px;
			position: absolute;
			opacity: 0.88;
			font-family: sans-serif;

			transition: 0.4s;
			background-color: #FFFFFF;
		}

		#id::before {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			background: url('./images/bg4.png');
			background-repeat: repeat-x;
			background-size: 312px 432px;
			opacity: 1;
			z-index: -1;
			text-align: center;
			border: 1px solid #000;
		}



		.container {
			font-size: 12px;
			font-family: sans-serif;

		}

		.id-1 {
			transition: 0.4s;
			width: 312px;
			height: 432px;
			background: #FFFFFF;
			font-size: 16px;
			font-family: sans-serif;
			float: left;
			margin: auto;
			margin-left: 370px;
		}

		.vertical-text {
			writing-mode: vertical-rl;
			transform: rotate(180deg);
			position: absolute;
			margin-left: -6px;
			bottom: 2%;
			/* Adjust to desired value */
			/* Adjust to desired value */
			font-size: 7px;
			font-family: 'Barlow';
			font-weight: 800;
			letter-spacing: 1px;
			color: green;
			display: block;
			/* create a block-level element */
			width: 60px;
			/* set the width to your desired size */
			overflow: hidden;
			/* hide the overflow */
			text-overflow: ellipsis;
			/* add an ellipsis (...) to indicate truncated text */
			white-space: nowrap;
			text-align: justify;
			text-align: left;
		}

		.vertical-text2 {
			writing-mode: vertical-rl;
			transform: rotate(180deg);
			position: absolute;
			margin-left: 16px;
			bottom: 2%;
			/* Adjust to desired value */
			/* Adjust to desired value */
			font-size: 8px;
			font-family: 'Barlow', sans-serif;
			font-weight: 800;
			letter-spacing: 1px;
			color: green;
			display: block;
			/* create a block-level element */
			width: 60px;
			/* set the width to your desired size */
			overflow: hidden;
			/* hide the overflow */
			text-overflow: ellipsis;
			/* add an ellipsis (...) to indicate truncated text */
			white-space: nowrap;
			text-align: justify;
			text-align: left;
			text-transform: capitalize;
		}


		.lowercontext {
			top: 360px;
			margin-left: -260px;
			font-family: 'Lora';
			position: absolute;
			bottom: 10px;
			left: 380px;
			display: flex;
			flex-direction: column;
			justify-content: center;
			text-align: center;
			width: 200px;
			height: 50px;
		}

		.idno {
			transform-origin: 0% 0%;
			font-family: 'Lora';
			font-size: 11px;
			width: fit-content;
		}

		.fullname {
			font-family: 'Lora';
			font-size: 10px;
			margin-bottom: 12px;
			margin-top: 12px;
		}

		.position {
			font-family: 'Lora';
			font-size: 10px;
		}
	</style>
</head>

<body>
	<script type="text/javascript">
		window.print();
	</script>

	<div id="bg" style="margin-bottom:310px ">
		<div id="id">
			<br><br><br><br><br><br><br>
			<center>
			</center>
			<?php
			if ($imageSrc != "") {
				echo "<img src='images/$profilePhoto' height='110px' width='110px' alt='' style='margin-left:20%; margin-top:-3%;'>";
			} else {
				echo "<img src='admin/images/profile.jpg' height='150px' width='160px' alt='' style='border: 2px solid black;'>";
			}
			?> <div class="container" align="center">

				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>

				<div style="position: absolute; left: 26%; top: 69%; margin-left:0%; margin-top:-3%; font-size:22px; font-family: 'Lora';">
					<span style="font-size:36px;"><?php if (isset($firstName)) {
														echo explode(' ', $firstName)[0];
													} ?></span>
				</div>
				<div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
					<span><br>

						<br>

				</div>
				<div class="lowercontext">
					<div>
						<span class="idno">
							ID NO.
							<?php if (isset($employeeID)) {
								echo $employeeID;
							} ?>
						</span>
					</div>
					<div class="fullname">
						<span>
							<?php if (isset($lastName)) {
								echo $firstName . ' ' . $lastName . ' ' . $suffix;
							} ?>
						</span>
					</div>
					<div class="position">
						<span>
							<?php if (isset($position)) {
								echo $position;
							} ?>
						</span>
					</div>
				</div>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<div style="display: flex;  flex-direction: column;">

					<p class="vertical-text" style="font-weight: 800;  color: white; position: absolute; top: 74%; white-space: pre-line;">
						<span style="font-weight: Bold; color: Green; position: absolute; left 4%;"><?php if (isset($division)) {
																										echo $division;
																									} ?></span>
						<?php if (isset($division) && isset($areaOfAssignment) && $division !== "REGULATIONS, LICENSING AND ENFORCEMENT DIVISION") echo '<br><br>'; ?>
						<?php if (isset($areaOfAssignment) && $division !== "REGULATIONS, LICENSING AND ENFORCEMENT DIVISION") {
							echo $areaOfAssignment;
						} ?>
					</p>

				</div>
			</div>
		</div>

		<div id="id" style="margin-left: 500px;">
			<br><br><br><br><br><br><br>
			<center>
			</center>
			<?php
			if ($imageSrc != "") {
				echo "<img src='images/$profilePhoto' height='110px' width='110px' alt='' style='margin-left:20%; margin-top:-3%;'>";
			} else {
				echo "<img src='admin/images/profile.jpg' height='150px' width='160px' alt='' style='border: 2px solid black;'>";
			}
			?> <div class="container" align="center">

				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>

				<div style="position: absolute; left: 26%; top: 69%; margin-left:0%; margin-top:-3%; font-size:22px; font-family: 'Lora';">
					<span style="font-size:36px;"><?php if (isset($firstName)) {
														echo explode(' ', $firstName)[0];
													} ?></span>
				</div>
				<div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
					<span><br>

						<br>

				</div>
				<div class="lowercontext">
					<div>
						<span class="idno">
							ID NO.
							<?php if (isset($employeeID)) {
								echo $employeeID;
							} ?>
						</span>
					</div>
					<div class="fullname">
						<span>
							<?php if (isset($lastName)) {
								echo $firstName . ' ' . $lastName . ' ' . $suffix;
							} ?>
						</span>
					</div>
					<div class="position">
						<span>
							<?php if (isset($position)) {
								echo $position;
							} ?>
						</span>
					</div>
				</div>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<p style="margin-top:-4%">&nbsp;</p>
				<div style="display: flex;  flex-direction: column;">

					<p class="vertical-text" style="font-weight: 800;  color: white; position: absolute; top: 74%; white-space: pre-line;">
						<span style="font-weight: Bold; color: Green; position: absolute; left 4%;"><?php if (isset($division)) {
																										echo $division;
																									} ?></span>
						<?php if (isset($division) && isset($areaOfAssignment) && $division !== "REGULATIONS, LICENSING AND ENFORCEMENT DIVISION") echo '<br><br>'; ?>
						<?php if (isset($areaOfAssignment) && $division !== "REGULATIONS, LICENSING AND ENFORCEMENT DIVISION") {
							echo $areaOfAssignment;
						} ?>
					</p>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
