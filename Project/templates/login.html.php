<?php
if (isset($error)) :
    echo '<div class="errors">' . $error . '</div>';
endif;
?>

<form action="" method="post">
    <label for="email">Your email address</label>
    <input type="text" name="email" id="email">

    <label for="password">Your password</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Log in" name="login">
</form>

<p>Don't have an account? <a href="/author/register">Click here to register an account</a></p>