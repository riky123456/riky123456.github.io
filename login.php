<?php
    include('head.php');
?>
<html>

<body style="background-color: #abc4ed">
    <div style="width: 33%; display: inline-block"></div>
    <div style="width: 33%; display: inline-block">
        <p class="logo-login"><i class="fas fa-user-friends"></i></p>
        <h3 class="ms-bold-22" style="text-align: center">Bentornato in UserManager!</h3>
        <div class="folder block-center" style="width:70% !important;">
            <form name="login" method="post" action="forms.php">
                <div style="width: 75%">
                    <input type="hidden" name="action" value="login"/>
                    <label class="login">Email<input class="login" type="text" name="username"></label>
                    <br>
                    <label class="login">Password<input class="login" type="password" name="password"></label>
                </div>
                <button style="margin-top: 50px" class="block-center">Accedi</button>
            </form>
        </div>
    </div>
    <div style="width: 33%; display: inline-block"></div>
</body>
</html>