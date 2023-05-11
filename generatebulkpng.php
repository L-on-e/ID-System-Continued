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
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@800&display=swap');


        body {
            background: #fff;
        }

        #bg {
            width: 1000px;
            height: 432px;

            margin: 60px;
            float: left;

        }

        .id {
            width: 312px;
            height: 432px;
            position: absolute;
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

        .id::before {
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
            margin-left: 4px;
            bottom: 2%;
            /* Adjust to desired value */
            /* Adjust to desired value */
            font-size: 11px;
            font-family: 'Barlow';

            letter-spacing: 1.5px;
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
    </style>
</head>

<body>
    <div id="bg">
        <div id="id" class="id">
            <br><br><br><br><br><br><br>
            <center>
            </center>
            <img src="<?= $imageSrc ?>" height="110px" width="110px" alt="Profile photo" style="margin-left:20%; margin-top:-3%;">
            <div class="container" align="center">

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
                <span style="position: absolute; left: 45%;right: 2%;margin-top: 110px; font-size:11px; font-family: 'Lora';"><?php if (isset($position)) {
                                                                                                                                    echo $position;
                                                                                                                                } ?></span>
                <p style="margin-top:20%">&nbsp;</p>
                <div style="margin-left: 40%; margin-top:16px; font-size:18px; font-family: 'Lora'; text-align:center;">
                    <span style="font-size:12px;"><?php if (isset($firstName)) {
                                                        echo $firstName;
                                                    } ?> <?php if (isset($lastName)) {
                                                                echo $lastName;
                                                            } ?></span>
                </div>

                <p style="position: absolute; top: 0; margin-left:172px; margin-top:112%; font-size:14px; font-family: 'Lora';">ID NO. <?php if (isset($id)) {
                                                                                                                                            echo $id;
                                                                                                                                        } ?></p>

                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <span class="vertical-text" style="position: absolute; top: 65%;white-space: pre-line; font-weight:bold"><?php if (isset($division)) {
                                                                                                                                echo $division;
                                                                                                                            } ?></span>
            </div>
        </div>
    </div>
</body>
<script src="./html2canvas.js"></script>
<script>
    window.onload = function() {
        const elements = document.querySelectorAll('.id');
        console.log(elements);
        for (let i = 0; i < <?php echo $count ?>; i++) {
            html2canvas(elements[i]).then(canvas => {
                const link = document.createElement('a');
                link.download = `capture-${i}.png`;
                link.href = canvas.toDataURL();
                link.click();
            });
        }
    }
</script>

</html>