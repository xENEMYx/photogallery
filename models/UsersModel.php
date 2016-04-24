<?php

/**
 * Модель для таблицы пользователей (users)
 * 
 */

/**
 * Регистрация нового пользователя
 *
 */
function registerNewUser($name, $email, $pwdMD5)
{
   $email   = htmlspecialchars(mysql_real_escape_string($email));
   $name    = htmlspecialchars(mysql_real_escape_string($name));
//   $phone   = htmlspecialchars(mysql_real_escape_string($phone));
//   $adress  = htmlspecialchars(mysql_real_escape_string($adress));

   $sql = "INSERT INTO users (`name`, `email`, `pass`) VALUES ('{$name}', '{$email}', '{$pwdMD5}')";

   $rs = mysql_query($sql); 

   if($rs){
	   $sql = "SELECT * FROM users WHERE (`email` = '{$email}' and `pass` = '{$pwdMD5}') LIMIT 1";
				
	   $rs = mysql_query($sql); 
	   $rs = createRsArray($rs);

	   if(isset($rs[0])){
		   $rs['success'] = 1;
	   } else {
		   $rs['success'] = 0;
	   }
	   
   } else {
	   
	   $rs['success'] = 0;
   }
   
   return $rs;   
}


/**
 * Проверка параметров для регистрации пользователя
 *
 */
function checkRegisterParams($email, $pwd1, $pwd2)
{
    $res = null;
    
    if(! $email){
        $res['success'] = false; 
        $res['message'] = 'Введите email'; 
    }
    
    if(! $pwd1){
        $res['success'] = false; 
        $res['message'] = 'Введите пароль'; 
    }
    
    if(! $pwd2){
        $res['success'] = false; 
        $res['message'] = 'Введите повтор пароля'; 
    }
    
    if($pwd1 != $pwd2){
        $res['success'] = false; 
        $res['message'] = 'Пароли не совпадают'; 
    }
    
    return $res;
}

/**
 * Проверка почты (есть ли email адрес в БД)
 * 
 * @param string $email
 * @return array  массив - строка из таблицы users, либо пустой массив
 */
function checkUserEmail($email)
{
     $email = mysql_real_escape_string($email);
     $sql = "SELECT id FROM users WHERE email = '{$email}'";
     
     $rs = mysql_query($sql);
     $rs = createRsArray($rs);
     
     return $rs;
}


/**
 * Авторизация пользователя
 * 
 * @param string $email почта (логин)
 * @param string $pwd пароль
 * @return array массив данных пользователя
 */
function loginUser($email, $pwd)
{
    $email   = htmlspecialchars(mysql_real_escape_string($email));
    $pwd     = md5($pwd);
    
    $sql = "SELECT * FROM users  
            WHERE (`email` = '{$email}' and `pass` = '{$pwd}')
            LIMIT 1";

   $rs = mysql_query($sql); 
  
   $rs = createRsArray($rs);
   if(isset($rs[0])){
       $rs['success'] = 1;
   } else {
	   $rs['success'] = 0;
   }
    
   return $rs;
}

/**
 * Изменение данных пользователя
 *
 */
function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd)
{
   $email   = htmlspecialchars(mysql_real_escape_string($_SESSION['user']['email']));
   $name    = htmlspecialchars(mysql_real_escape_string($name));
//   $phone   = htmlspecialchars(mysql_real_escape_string($phone));
//   $adress  = htmlspecialchars(mysql_real_escape_string($adress));
   $pwd1 = trim($pwd1);
   $pwd2 = trim($pwd2);
   
   $newPwd = null;
   if( $pwd1 && ($pwd1 == $pwd2) ){
	   $newPwd = md5($pwd1);
   }
   
   $sql = "UPDATE users SET ";
   
   if($newPwd){
	   $sql .= "`pwd` = '{$newPwd}', ";
   }
   
  $sql .= " `name` = '{$name}'
           WHERE 
            `email` = '{$email}' AND `password` = '{$curPwd}'
           LIMIT 1";

   $rs = mysql_query($sql); 
	
	
	return $rs;
}

/**
 * Загружаем аватар
 *
 */
function setAvatar($id, $avatar){

    $sql = "UPDATE `users` SET `avatar` = '$avatar' WHERE `id` = '$id' ";

    $rs = mysql_query($sql);
}

/**
 * Получаем данные пользователя
 *
 */
function setUserData($name){

    $sql = "SELECT * FROM users WHERE `name` = '$name'";

    $rs = mysql_query($sql);

    return createRsArray($rs);
}

/**
 * Добавляем пользователя в друзья
 *
 */
function setFriends($user, $friends){

    $sql = "UPDATE `users` SET `friends` = CONCAT(`friends`,'%' , '$friends') WHERE `name` = '$user' ";

    $rs = mysql_query($sql);

    return $rs;
}