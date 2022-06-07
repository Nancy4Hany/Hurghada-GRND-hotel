<?php

class Login 
{
        public static function isLoggedIn() 
        {
                $date = date('Y-m-d H:i:s');
                if (isset($_COOKIE['USR'])) 
                {
                        if (DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['USR'])))) 
                        {
                                $userid = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['USR'])))[0]['user_id'];

                                if (isset($_COOKIE['USR_'])) 
                                {
                                        return $userid;
                                } 
                                else 
                                {
                                        $cstrong = True;
                                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id, :date)', array(':token'=>sha1($token), ':user_id'=>$userid,':date'=>$date));
                                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['USR'])));

                                        setcookie("USR", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                                        setcookie("USR_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid; 
                                }
                        }
                }

                return false;
        }
}

?>