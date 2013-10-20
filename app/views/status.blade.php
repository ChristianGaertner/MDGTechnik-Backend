<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MDGTechnik API Status</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .welcome {
            margin-top: 200px;
        }

        a, a:visited {
            color:#FF5949;
            text-decoration:none;
        }

        a:hover {
            text-decoration:underline;
        }

        ul li {
            display:inline;
            margin:0 1.2em;
        }

        p {
            margin:2em 0;
            color:#555;
        }

        .online {
            color: #45A82D;
        }

        .offline {
            color: #A82D2D;
        }

        .error {
            color: #DEB331;
        }
    
    </style>
</head>
<body>
    <div class="welcome">
        <h1>MDGTechnik API Status.</h1>
        <p>
            Status:

            @if($status == 0)
                <span class="error">Tracking paused</span>
            @elseif($status == 1)
                <span class="offline">Offline</span>
            @elseif($status == 2)
                <span class="online">Online</span>
            @elseif($status == 8)
                <span class="offline">Seems offline</span>
            @elseif($status == 9)
                <span class="offline">Offline</span>
            @else
                <span>Error Grabbing Status...<br>But if you can reed this the host is likely to be up and running anyway</span>
            @endif
            
            <br />    
        
            UpTime: {{ $uptime }}%
            
        </p>
    </div>
</body>
</html>
