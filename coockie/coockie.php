<?php
    $data=$_GET;
    $login=$data['login'];
    $password=$data['password'];
    $email=$data['email'];
    
    if(isset($_COOKIE['coockie'])){
        $coockie = $_COOKIE['coockie'];
    }else
    {
        $coockie = 0;
    }

    setcookie('coockie',$coockie,0);

    if (isset($data['access']) )
    {
        //регистрация
        
        $errors = array();
        if ($login =='')
        {
            $errors[] = 'Введите логин!';
        }

        if ($password =='')
        {
            $errors[] = 'Введите пароль!';
        }

        if ($email =='')
        {
            $errors[] = 'Введите Email !';
        }
        
        if(empty($errors))
        {
            //
            // var_dump($_COOKIE['key']);
            $coockie++;
            echo '<form method="GET"> <input type="submit" name="exit" value="exit"> </form>';
            

            // $user = R::dispense('user');
            // $user->login = $data['login'];
            // $user->name = '';
            // $user->root = '1';
            // $user->lastName = '';
            // $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
            // R::store($user);
            // echo '<div style="color:green">Вы зарегестрированы</div><hr>';
            // header('location:login.php');
        }else
        {
            echo '<div style="color:red">'.array_shift($errors).'</div>';
            $coockie++;
        }
    }
    if (isset($data['exit'])){
        // $key--;
        $data['login']='';
        $data['password']='';
        $data['email']='';
        
    }
    if (isset($data['var_dump']))
    {
        var_dump($_COOKIE['coockie']);
    }
?>

<form action="coockie.php" method="GET">

    <div>Логин</div>

    <input type="text" name="login">

    <div>Пароль</div>

    <input type="password" name="password">

    <div>Email</div>

    <input type="email" name="email">
    <button type="submit" name="access">КНОПКУ НАЖМИ АЛО</button>
    <br>
    <br>
    <br>
    <br>
    <button type="submit" name="var_dump">COOCKIS</button>
</form>