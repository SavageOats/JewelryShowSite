<?php
    require "../libs/db.php";

    $data = $_GET;
    if ($_SESSION['logged_user']->root === '2'){
        header('location:admin.php');
    }else
    {
        if ($_SESSION['logged_user']->root === '1'){
            header('location:user.php');
        }else
        {
            if(isset($data['do_login']))
            {   
                $errors = array();
                $user = R::findOne('user','login = ?', array($data['login']));
                
                if ($user)
                {
                    
                    if (password_verify($data['password'], $user->password)
                    ){
                        // вход был
                        $_SESSION['logged_user'] = $user;
                        header('location:../index.php');
                    }else
                    {
                        $errors[] = 'Неверный пароль';
                    }
                }else
                {
                    $errors[] = 'Такой пользователь не найден';
                }

                if( !empty($errors))
                {
                    $send = '<div class="registration-text-login" style="color:red">'.array_shift($errors).'</div>';
                }
            }
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
                        <div class="navbar-text-button button centered">Войти</div>
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
                <form class="row registration-box" action="login.php"  method="GET">
                    <center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered registration-text-head">
                                Авторизация
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
                            <center>
                                <button class="registration-buttun-2" type="submit" name="do_login">Войти</button>
                            </center>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered registration-text-login" >
                                <?php echo($send) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="centered">
                                <a class="registration-text-head" href="registration.php">Регистрация</a>
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