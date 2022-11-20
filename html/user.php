<?php
    require "../libs/db.php";
    
    $data = $_GET;

    $user = R::load( 'user', $_SESSION['logged_user']->id );

    if (isset($data['editUser']) )
    {   
        $user->name = $data['name'];
        $user->login = $data['login'];
        $user->lastName = $data['lastName'];
        R::store($user);
        $_SESSION['logged_user'] = $user;
    }else
    {
        $data['name'] = $user->name;
        $data['login'] = $user->login;
        $data['lastName'] = $user->lastName;
        $_SESSION['logged_user'] = $user;
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
                            
                            <?php if (isset($_SESSION['logged_user']) ) : ?>
                            <?php echo '<a href="user.php" style="">'.$_SESSION['logged_user']->login.'</a>';?>
                            <?php else : ?>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-md-1">&nbsp</div> 
                </div>
            </div>
        </div>
    </div>

    <form class="row admin-main-user" action="user.php"  method="GET">
        <div class="col-md-2">&nbsp</div>
        <div class="col-md-8 admin-main-birca-1-user">
            <p class="klients centered">Личный кабинет </p>
            
            <hr class="admin-main-hr-user">

            <div class="row">
                <div class="col-md-1">&nbsp</div>
                <div class="col-md-2">
                    <p class="admin-name-user">Имя</p>
                    <p class="admin-name-user">Фимилия</p>
                    <p class="admin-name-user">Логин</p>
                    <p class="admin-name-user">Пароль</p>
                    <p class="admin-name-user">Пароль 2</p>

                </div>
                <div class="col-md-6">
                    <center>
                        <input class="user-user-textbox" type="text" name="name" value="<?php echo @$data['name']?>">
                    </center>
                    <center>
                        <input class="user-user-textbox" type="text" name="lastName" value="<?php echo @$data['lastName']?>">
                    </center>
                    <center>
                        <input class="user-user-textbox" type="text" name="login" value="<?php echo @$data['login']?>">
                    </center>
                    <center>
                        <input class="user-user-textbox" type="text" name="password">
                    </center>
                    <center>
                        <input class="user-user-textbox" type="text" name="password_2">
                    </center>
                </div>
                <div class="col-md-2">
                    <div class="admin-icon-container-user centered">
                        <a href="#">
                            <img class="admin-icon-image-user" src="../IMAGE/edit.svg" alt="" name="name_ren"></img>
                        </a>
                    </div>
                    <div class="admin-icon-container-user centered">
                        <a href="#">
                            <img class="admin-icon-image-user" src="../IMAGE/edit.svg" alt="" name="_ren"></img>
                        </a>
                    </div>
                    <div class="admin-icon-container centered">
                        <a href="#">
                            <img class="admin-icon-image-user" src="../IMAGE/edit.svg" alt="" name="login_ren"></img>
                        </a>                   
                    </div>
                    <div class="admin-icon-container-user centered">
                        <a href="#">
                            <img class="admin-icon-image-user" src="../IMAGE/edit.svg" alt="" name="passwoerd_ren"></img>
                        </a>
                    </div>
                    <div class="admin-icon-container-user centered">
                        <a href="#">
                            <img class="admin-icon-image-user" src="../IMAGE/edit.svg" alt="" name="passwoerd_ren"></img>
                        </a>
                    </div>
                    
                </div>
            </div>

            <div class="row"></div>
            <center>
            <div class="col-md-3">&nbsp</div>
            <div class="col-md-2">
                <button class="email-buttun-user centered" type="submit" name="editUser">
                    <div class="email-buttun centered" style="margin-bottom:5px">
                        Обновить 
                    </div>
                </button>
            </div>
            <div class="col-md-2">&nbsp</div>
            <a href="../php/logout.php">
                <div class="col-md-2">
                    <div class="email-buttun-user">
                        <div class="email-buttun centered" style="margin-bottom:5px">
                            Выйти
                        </div> 
                    </div>
                </div>
            </a>
            <div class="col-md-3">&nbsp</div>
            </center>                

        </div>
        <div class="col-md-2">&nbsp</div>
    </form>

    <div class="row user-main">
        <div class="col-md-2">&nbsp</div>
        <div class="col-md-4 user-main-birca-1">
            <p class="spisok centered">Список заказов</p>
            <div class="row user-row">
                <div class="col-md-5">
                    <p class="user-name">Изделия</p>
                </div>
                <div class="col-md-3">
                    <p class="user-counte centered">Количество</p>
                </div>
                <div class="col-md-3">
                    <p class="user-prise centered">Цена</p>
                </div>
                <div class="col-md-1">
                    <p class="admin-icon-container-tovar centered"></p>
                </div>
            </div>
            <hr class="user-main-hr">
            
            <div class="row">
                <div class="col-md-5">
                    <p class="user-name-">Кольцо</p>
                </div>
                <div class="col-md-3">
                    <p class="user-counte centered">x 1</p>
                </div>
                <div class="col-md-3">
                    <p class="user-prise centered">5555 р.</p>
                </div>
                <div class="col-md-1 icon-box-user">
                    <div class="icon-container-user centered">
                        <a href="#">
                            <img class="icon-image-user" src="../IMAGE/delete.svg" alt=""></img>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <p class="user-name">Колье</p>
                </div>
                <div class="col-md-3">
                    <p class="user-counte centered">x 15</p>
                </div>
                <div class="col-md-3">
                    <p class="user-prise centered">15555 р.</p>
                </div>
                <div class="col-md-1 icon-box-user">
                    <div class="icon-container-user centered">
                        <a href="#">
                            <img class="icon-image-user" src="../IMAGE/delete.svg" alt=""></img>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4 user-main-birca-2">
            <p class="oplata centered">Оплата и доставка</p>
            <div class="row">
                <div class="col-md-6 ">

                
                    
                </div>
                <div class="col-md-6">
                <center>
                    
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 user-dirca2-size">
                    <p class="user-adres">Имя</p>
                    <p class="user-adres">Фамилия</p>
                    <p class="user-adres">Телефон</p>
                    <p class="user-dostavka">Доставка</p>
                    <p class="user-adres">Адрес</p>
                    <p class="user-totalprise-text">Email</p>
                    <p class="user-totalprise-text">Цена</p>
                </div>
                <div class="col-md-6 user-dirca2-size">
                    <div class="birca2-user-margin">
                        <center>
                            <input class="user-textbox" type="text" value="<?php echo @$data['name']?>">
                        </center>
                    </div>
                    <div class="birca2-user-margin" >
                        <center>
                            <input class="user-textbox" type="text" value="<?php echo @$data['lastName']?>">
                        </center>
                    </div>
                    <div class="birca2-user-margin">
                        <center>
                            <input class="user-textbox" type="text">
                        </center>
                    </div>
                     
                    <div class="select-deliveri">
                        <center>
                        <select name="" class="select-deliveri">
                            <option value="самовывоз">самовывоз</option>
                            <option value="доставка на дом">доставка на дом</option>
                        </select>
                        </center>
                    </div>

                    <div class="birca2-user-margin">
                        <center>
                            <input class="user-textbox" type="text">
                        </center>
                    </div>
                    <div class="birca2-user-margin">
                        <center>
                            <input class="user-textbox" type="text">
                        </center>
                    </div>
                    <p class="user-totalprise centered">20000 р.</p>
                </div>
            </div>
            <center>
                <div class="oplata-buttun">
                    <a href="#">
                        <p class="oplata-buttun-box">Обновить</p>
                    </a>
                </div
            </center>
            <center>
                <div class="oplata-buttun">
                    <a href="#">
                        <p class="oplata-buttun-box">Оплатить</p>
                    </a>
                </div
            </center>
        </div>
        <div class="col-md-2">&nbsp</div>
    
    </div>
    <!-- <script src="JS/bootstrap.min.js"></script> -->
    <script src="../JS/jquery-3.5.1.min.js"></script>
</body>
</html>