<?php
//deals with password hashing and hash verification
class Password{

public function hash($password){
return password_hash($password, PASSWORD_DEFAULT);
}

}