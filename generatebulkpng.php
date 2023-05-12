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
        @font-face {
            font-family: 'Barlow';
            src: url('bootstrap/fonts/barlow-regular.ttf');
            font-weight: normal;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;800&display=swap');

        @font-face {
            font-family: 'Lora';
            src: url('bootstrap/fonts/lora-regular.ttf');
            font-weight: normal;
        }
        #content1 {
            transform: scale(1.1);
            height: 210vw;
            width: 130vw;
            border-width: 2px;
            border-style: solid;
            flex-direction: row;
            background-color: lightcoral;
            background-image: url('./images//bg4.png');
            background-size: contain;
            background-repeat: no-repeat;
        }
        body {
            transform-origin: 0% 0%;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: row;
            display: flex;
            flex: auto;
        }
        .imgProfile {
            height: 35vw;
            width: 35vw;
            position: absolute;
            left: 20.5vw;
            top: 37vw;
        }
        .firstname {
            position: absolute;
            font-family: 'Lora';
            font-size: 12rem;
            margin-left: 25vw;
            top: 89.5vw;
        }
        .idno {
            transform-origin: 0% 0%;
            position: absolute;
            font-family: 'Lora';
            font-size: 3vw;
            margin-left: 56vw;
            bottom: -63vw;
            width: fit-content;
        }
        .fullname {
            position: absolute;
            font-family: 'Lora';
            font-size: 3.2rem;
            left: 54.5vw;
            bottom: -70.5vw;
        }
        .position {
            position: absolute;
            font-family: 'Lora';
            font-size: 3.2rem;
            left: 68vw;
            bottom: -79vw;
        }
        .division{
            position: absolute;
            font-family: 'Barlow', 'sans-serif';
            font-size: 3.0rem;
            transform: rotate(270deg);
            bottom: -60vw;
            left: -16vw;
            text-transform: uppercase;  
        }

        .divText{
            font-family: 'Barlow', 'sans-serif';
            font-weight: 800;
            width: 700px;
            color: green;
            white-space: break-word;    
			text-align: justify;
			text-align: left;
        }
        .section{
            color: white;
            font-weight: 400    ;
            margin-top:-30px;
            font-size: 2.5rem   ;
        }
    </style>
</head>

<body>
    <div id="content1" class="id">
        <div class="imgProfile">
            <img src="<?= $imageSrc ?>" height="100%" width="100%" alt="Profile photo">
        </div>
        <div class="firstname">
            <span>
                <?php
                if (isset($firstName)) {
                    $firstNameWords = explode(' ', $firstName);
                    echo $firstNameWords[0];
                }
                ?>
            </span>
        </div>

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
        <div class="division">
            <p class="divText">
                <?php if (isset($division)) {
                    echo $division;
                } ?>
            </p>
            <p class="section">
                <?php if (isset($areaOfAssignment)) {
                    echo $areaOfAssignment;
                } ?>
            </p>
        </div>
    </div>
</body>
<script src="./html2canvas.js"></script>
<script>
    window.onload = function() {
        const elements = document.querySelectorAll('.id');
        const dpi = 250;
        const widthInches = 3.25;
        const heightInches = 4.5;
        const canvasWidth = dpi * widthInches;
        const canvasHeight = dpi * heightInches;
        for (let i = 0; i < <?php echo $count ?>; i++) {
            html2canvas(elements[i], {
                scale: 0.5,
                width: canvasWidth,
                height: canvasHeight
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = `capture-${i}.png`;
                link.href = canvas.toDataURL();
                link.click();
            });
        }
    }
</script>

</html>