<!DOCTYPE html>

<head>
    <title>Captcha</title>
    <link href="css/captcha.css" rel="stylesheet" />
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/image-puzzle.js"></script>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/icon.png" />
    </head>

<body>
    <header></header>
<main style="margin-top:50px;">
    <div id="collage">
    
        <div id="playPanel" style="padding:5px;display:flex;">
        <h2>Résolvez le captcha pour continuer</h2>
        <div id="gameOver" style="display:none;">
            <div style=" padding: 5px 10px 20px 10px; text-align: center; ">
                <a href="../connexion.php">
                    <h3> Continuer </h3>
                </a>
            </div>
        </div>
            <div style="display:inline-block; margin:auto; width:95%; vertical-align:top;">
                <ul id="sortable" class="sortable"></ul>
				<p id="levelPanel"><input type="radio" name="level" id="hard" checked="checked" value="2" /></p>
                <div id="actualImageBox"></div>
            </div>
        </div>

        
    </div>
	
	
    <script>
        var images = [
            { src: 'images/1.jpg' },
            { src: 'images/2.jpg' },
            { src: 'images/3.jpg'},
            { src: 'images/4.jpg' },
            { src: 'images/5.jpg' }
        ];

            $(function () {
                var gridSize = $('#levelPanel :radio:checked').val();
                imagePuzzle.startGame(images, gridSize);
                $('#newPhoto').click(function () {
                    imagePuzzle.startGame(images, gridSize);
                });

                $('#levelPanel :radio').change(function (e) {
                    var gridSize = $(this).val();
                    imagePuzzle.startGame(images, gridSize);
                });
            });
			
        var h1 = document.getElementsByTagName('h1')[0],
        start = document.getElementById('start'),
        stop = document.getElementById('stop'),
        clear = document.getElementById('clear'),
        seconds = 0, minutes = 0, hours = 0;

    function add() {
        seconds++;
        if (seconds >= 60) {
            seconds = 0;
            minutes++;
            if (minutes >= 60) {
                minutes = 0;
                hours++;
            }
        }
    
        h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
        
    }

    </script>
    </main>
    <footer>
        <div>
            <p>Fin captcha</p>
        </div>
    </footer>
</body>
</html>