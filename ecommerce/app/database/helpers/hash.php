<?php

function bcrypt(string $password){

return password_hash($password,PASSWORD_BCRYPT);

}




?>