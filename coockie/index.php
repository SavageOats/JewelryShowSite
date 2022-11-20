<?php
    // session_start();

    // сколько раз пользователь перезапустил страницу 
    if(isset($_COOKIE['key'])){
        $key = $_COOKIE['key'];
    }else
    {
        $key = 0;
    }
    
    $key++;
    // $_SESSION['name']++;
    setcookie('key',$key,0);

    echo $key;

    // var_dump($_SESSION);
    //

    if ($login = '')
    {
        echo 'Введите логин!';
    }

?>

<form action="index.php"  method="POST" >

    <div>Логин</div>

    <input type="text" name="login" value="<?php echo @$data['login']?>">

    <div>Пароль</div>

    <input type="password" name="password" value="<?php echo @$data['password']?>">
    
    <div>Email</div>
    
    <input type="email" name="email" value="<?php echo @$data['email']?>">

    <input type="submit" name="do_signup"></button>

</form>