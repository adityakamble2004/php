<?php
include('header.html');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" type = "text/css" href = "main.css">   
    <style>
    #working {
        margin-top: 150px;
        font-family: Arial, sans-serif;
        background-color: transparent;
        color: #333;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        
    }

    #working p {
        margin-top: 150px;
        font-size: 1.1em;
        line-height: 1.6;
    }

    #working p::before {
        content: "📁 ";
        font-size: 1.3em;
        color: #4CAF50;
    }

    #working p strong {
        color: #4CAF50;
    }
</style>

</head>

<body>
    <div id="mainheading">
    <h1>Welcome to Your Personal Portfolio Hosting Hub</h1>
    </div>
    <p id="mainline">Are you a creative professional, designer, or developer looking to showcase your work online? Our platform provides a secure and convenient way to upload, manage, and share your portfolio. With an easy-to-use interface, your files are organized and displayed just the way you want, making it simple for visitors to explore your work.</p>
    <div id="working">


<p>How It Works

<h1>Simple Uploads:</h1>
<h3>1. Just upload your files, including HTML, CSS, JavaScript, images, and other resources, and we'll set up your site structure.</h3>
<h3>2.Automatic Organization: Each portfolio gets its own unique folder, ensuring your files are safely stored and easy to access.</h3>
<h3>3.Direct Sharing Links: Instantly share your portfolio with friends, clients, or potential employers through a dedicated URL.</h3>
<h3>4.File Management: Our dashboard lets you view, update, and delete files with ease—no technical setup required.<h3></p>
    </div>

    <div id="filemanager">

</div>
</body>
</html>

