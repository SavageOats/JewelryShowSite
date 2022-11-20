<?php
    require "../libs/db.php";
    // $send = '<div class="registration-text-login" style="color:#E8d8c8">Пользователь с таким Логином уже существует</div>';
    $data = $_GET;
    if (isset($data['do_signup']) )
    {
        //регистрация
        
        $errors = array();
        if (trim($data['login'])=='')
        {
            $errors[] = 'Введите логин!';
        }

        if (R::count('user',"login = ?", array($data['login']))>0 )
        {
            $errors[] = 'Пользователь с таким Логином уже существует';
        }

        if ($data['password']=='')
        {
            $errors[] = 'Введите пароль!';
        }

        if ($data['password_2'] != $data['password'])
        {
            $errors[] = 'Повторный пароль введен не верно!';
        }
        
        if(empty($errors))
        {
            //
            $user = R::dispense('user');
            $user->login = $data['login'];
            $user->name = '';
            $user->root = '1';
            $user->lastName = '';
            $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
            R::store($user);
            // echo '<div style="color:green">Вы зарегестрированы</div><hr>';
            header('location:login.php');
        }else
        {
            $send = '<div class="registration-text-login" style="color:red">'.array_shift($errors).'</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ювелирынй магазин</title>
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/main.css">
</head>
<body>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="conteiner">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-md-1">&nbsp</div>
                    <div class="col-md-1">
                        <center>
                            <div class="icon">
                                <img class="icon-image" src="../IMAGE/diamond.svg" alt=""></img>
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 logo-textbox">
                        <p class="logo-text">Юверирная Мастерская “Орфей”</p>
                    </div>
                    <div class="col-md-1">&nbsp</div>
                    <div class="col-md-1">
                        <div class="navbar-text-button button centered">
                            <a href="../index.php">Главная</a>
                        </div> 
                    </div>
                    <div class="col-md-1">
                        <div class="navbar-text-button button centered">Заказы</div> 
                    </div>
                    <div class="col-md-2">
                        <div class="navbar-text-button-contact button centered">Контакты</div>
                    </div>
                    <div class="col-md-1">
                        <div class="navbar-text-button button centered">
                            <a href="login.php">Войти</a>
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp</div> 
                </div>
            </div>
        </div>
    </div>

    <div class="row registration">
        <div class="col-md-12">
            <div class="col-md-4">&nbsp</div>
            <div class="col-md-4">
                
                <form class="row registration-box" action="registration.php"  method="GET" style="height: 602px;">
    
                    <center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered registration-text-head">
                                Регистрация
                            </div>
                        </div>
                    </div>
                    
                    <hr style="border-color: #555555;">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered registration-text-login">
                                Логин
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <input class="registration-textbox" type="text" name="login" value="<?php echo @$data['login']?>">
                            </center>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered registration-text-login" >
                                Пароль
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <input class="registration-textbox" type="password" name="password" value="<?php echo @$data['password']?>">
                            </center>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered registration-text-login">
                                Пароль
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <input class="registration-textbox" type="password" name="password_2" value="<?php echo @$data['password_2']?>">
                            </center>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <button class="registration-buttun-2" type="submit" name="do_signup">Зарегистрироваться </button>
                            </center>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered registration-text-login">
                                &nbsp
                                <?php echo($send) ?>
                            </div>
                        </div>
                    </div>

                    </center>
                </form>
            </div>
            <div class="col-md-4">&nbsp</div>
        </div>
    </div>
    <!-- <script src="JS/bootstrap.min.js"></script> -->
    <script src="../JS/jquery-3.5.1.min.js"></script>
</body>
</html>


<!-- <div class="navbar-header">
                <button type="buttom" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>    
                </button>
                <a href="#" class="navbar-brand">asd</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Домой</a></li>
                    <li><a href="#">Домой</a></li>
                    <li><a href="#">Домой</a></li>
                    <li><a href="#">Домой</a></li>
                    <li><a href="#">Домой</a></li>
                </ul>
            </div> -->