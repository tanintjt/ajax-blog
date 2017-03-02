<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>STL Surveillance Order Processing</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<div>
    <div>
        <h2 style="text-align: center">STL Surveillance Order Processing</h2>
    </div>
</div>

<body>
<div class="login-page" action="" method="post">
    <div class="form">
        <form class="register-form">
            <input type="text" placeholder="name" />
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" action="login.php" method="post">
            <input type="text" placeholder="username"  name="username" required/>
            <input type="password" placeholder="password"  name="password" required/>
            <button type="submit">login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>


<div id="left"></div>
<div id="right"></div>
<div id="top"></div>
<div id="bottom"></div>



<!---------------Script----------------->
<script src="js/jquery.min.js"></script>
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

</script>
</body>







