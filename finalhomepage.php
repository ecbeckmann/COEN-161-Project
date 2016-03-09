<?php
    session_start();
    $_SESSION["login"] = 0;
    $_SESSION["childName"] = 1;
?>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>EdCamps</title>
        <style>
            body {
                background-color: #7fd2fb;
                font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif
                
            }
            h1 {
                text-align: center;
                padding-top: 7%;
                opacity: 1;
                animation: hideshow 10s 1s ease infinite;
                -webkit-animation-iteration-count: 1; /* Chrome, Safari, Opera */\
                animation-iteration-count: 1;
            }
            h2 {
                padding-left: 44%;
                padding-top: 12%;
            }
            #button {
                background-color: #7fd2fb;
                margin-top: 0%;
                height: 300px;
                opacity: 0;
            }
            #button:hover{
                background-color: #72bde1;
                opacity: 1;
            }
            footer {
                margin-bottom: 0%;
                text-align: center;
            }
            @keyframes hideshow {
            0% { opacity: 0; }
            10% { opacity: 0; }
            30% { opacity: 1; }
            100% { opacity: 1; }
            
            }
        </style>
    </head>
<body>
    <div id="main">
        <h1>Welcome to EdCamps</h1>
        <a href="finalpagetemplate.html">
        <div id="button">
            <h2> Click to Enter </h2>
        
        </div>
        </a>
    <footer>
        Designed by Eric Beckmann, Mark Hattori, and Joseph Villanueva
    </footer>
</body>
</html>
    
