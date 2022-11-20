<?php

    require "../libs/db.php";

    $data = $_GET;
    if ($_SESSION['logged_user']->root === '1'){
        header('location:user.php');
    }else
    {
        if (isset($data['do_signup']) )
        {   
            $userSearch = $data['id'];

            $user = R::load( 'user', $userSearch);

            $re_id = $user->id;

            $re_name = $user->name;

            $re_lastName = $user->lastName;

            $re_login = $user->login;

            $data['re_name'] = $user->name;

        }
        if (isset($data['re_user']) )
        {   
            $userSearch = $data['id'];
            $user = R::load( 'user', $userSearch);
            $user->root = $user->root;
            $user->name = $data['re_name'];
            $user->id = $data['re_id'];
            $user->lastName = $data['re_lastName'];
            $user->login = $data['re_login'];
            R::store($user);
        }
        if (isset($data['user_del']) )
        {   
            $userSearch = $data['id'];
            R::trash( 'user', $userSearch);
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

                            <?php if (isset($_SESSION['logged_user']) ) : ?>
                            <?php echo '<a href="../php/logout.php">'.$_SESSION['logged_user']->login.'</a>';?>
                            <?php else : ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp</div> 
                </div>
            </div>
        </div>
    </div>


    <div class="row admin-main-user under-head">
        <div class="col-md-2">&nbsp</div>
        <div class="col-md-8 admin-main-birca-1-user">
            <p class="klients centered">Клиенты</p>
            <form class="row admin-row-user" action="admin.php" method="GET">
                <div class="row centered">
                    <center>
                        <div class="col-md-3">&nbsp</div>
                        <div class="col-md-2">
                            <p class="admin-name-user">Поис по ID</p>
                        </div>
                        <div class="col-md-2">
                            <input class="user-user-textbox" type="text" name="id" value="<?php echo @$data['id']?>">       
                        </div>
                        <div class="col-md-2">
                            <button class="admin-search-button" type="submit" name="do_signup">поиск </button>       
                        </div>
                        <div class="col-md-3">&nbsp</div>
                    </center>
                </div>

                <div class="row centered">
                    <center>
                        <div class="col-md-3">&nbsp</div>
                        <div class="col-md-3">
                            <p class="admin-name-user">ID</p>
                        </div>
                        <div class="col-md-3">
                            <input class="user-user-textbox" type="text" name="re_id" value="<?php echo @$re_id ?>">       
                        </div>
                        <div class="col-md-3">&nbsp</div>
                    </center>
                </div>

                <div class="row centered">
                    <center>
                        <div class="col-md-3">&nbsp</div>
                        <div class="col-md-3">
                            <p class="admin-name-user">Логин</p>
                        </div>
                        <div class="col-md-3">
                            <input class="user-user-textbox" type="text" name="re_login" value="<?php echo @$re_login ?>">       
                        </div>
                        <div class="col-md-3">&nbsp</div>
                    </center>
                </div>

                <div class="row centered">
                    <center>
                        <div class="col-md-3">&nbsp</div>
                        <div class="col-md-3">
                            <p class="admin-name-user">Фимилия</p>
                        </div>
                        <div class="col-md-3">
                            <input class="user-user-textbox" type="text" name="re_lastName" value="<?php echo @$re_lastName ?>">       
                        </div>
                        <div class="col-md-3">&nbsp</div>
                    </center>
                </div>

                <div class="row centered">
                    <center>
                        <div class="col-md-3">&nbsp</div>
                        <div class="col-md-3">
                            <p class="admin-name-user">Имя</p>
                        </div>
                        <div class="col-md-3">
                            <input class="user-user-textbox" type="text" name="re_name" value="<?php echo @$re_name ?>">       
                        </div>
                        <div class="col-md-3">&nbsp</div>
                    </center>
                </div>

                <div class="row centered">
                    <center>
                        <div class="col-md-4">&nbsp</div>
                        <div class="col-md-2">
                            <button class="admin-update-button" type="submit" name="re_user">Обновить</button>     
                        </div>
                        <div class="col-md-2">
                            <button class="admin-update-button" type="submit" name="user_del">Удалить</button>     
                        </div>
                        <div class="col-md-4">&nbsp</div>
                    </center>
                </div>
            </form>

            <div class="row admin-row-user">
                <div class="col-md-1">
                    <p class="admin-name-user">ID</p>
                
                </div>
                <div class="col-md-3">
                    <p class="admin-login-user centered">Логин</p>
                </div>
                <div class="col-md-4">
                    <p class="admin-login-user centered">Фамилия</p>
                </div>
                <div class="col-md-4">
                    <p class="admin-login-user centered">Имя</p>
                </div>
            </div>

            <hr class="admin-main-hr-user">

            <?php
            $users = R::find( 'user', 'id < ?', array(50));
            foreach($users as $user){
                $textId = $user->id;
                $textLogin = $user->login;
                $textName = $user->name;
                $textLastName = $user->lastName;
                echo'   
                    <div class="row">
                        <div class="col-md-1">
                            <p class="admin-name-user centered">'.$textId.'</p>
                        </div>
                        <div class="col-md-3">
                            <p class="admin-login-user centered">'.$textLogin.'</p>
                        </div>
                        <div class="col-md-4">
                            <p class="admin-login-user centered">'.$textLastName.'</p>
                        </div>
                        <div class="col-md-4">
                            <p class="admin-login-user centered">'.$textName.'</p>
                        </div>
                    </div>
                    <hr>';
                }    
            ?>
        </div>
        <div class="col-md-2">&nbsp</div>
    </div>

    <div class="row admin-main-tovar">
        <div class="col-md-2">&nbsp</div>

        <div class="col-md-8 admin-main-birca-1-tovar">
            <p class="tovar centered">Товар</p>
            <div class="row admin-row-tovar">
                <div class="col-md-4">
                    <p class="admin-name-tovar">Название</p>
                </div>
                <div class="col-md-3">
                    <p class="admin-login-tovar centered">Вид изделия</p>
                </div>
                <div class="col-md-3">
                    <p class="admin-password-tovar centered">Цена</p>
                </div>
                <div class="col-md-2">
                    <p class="admin-icon-container-tovar centered"></p>
                </div>
            </div>

            <hr class="admin-main-hr-tovar">

            <div class="row">
                <div class="col-md-4">
                    <p class="admin-name-tovar">Кольцо</p>
                    <p class="admin-name-tovar">Колье</p>
                </div>
                <div class="col-md-3">
                    <p class="admin-login-tovar centered">Золото</p>
                    <p class="admin-login-tovar centered">Серебро</p>
                </div>
                <div class="col-md-3">
                    <p class="admin-password-tovar centered">5555 p.</p>
                    <p class="admin-password-tovar centered">1100 p.</p>
                </div>
                <div class="col-md-2">
                    <div class="admin-icon-container-tovar centered">
                        <a href="#">
                            <img class="admin-icon-image-tovar" src="../IMAGE/edit.svg" alt=""></img>
                        </a>
                        <a href="#">
                            <img class="admin-icon-image-tovar" src="../IMAGE/delete.svg" alt=""></img>
                        </a>
                    </div>
                    <div class="admin-icon-container centered">
                        <a href="#">
                            <img class="admin-icon-image-tovar" src="../IMAGE/edit.svg" alt=""></img>
                        </a>
                        <a href="#">
                            <img class="admin-icon-image-tovar" src="../IMAGE/delete.svg" alt=""></img>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                        <div class="button-tovar centered">Добавить товар</div>
                    </a>
                </div>
                <div class="col-md-9">&nbsp</div>
            </div>

        </div>

        <div class="col-md-2">&nbsp</div>
    </div>




    <!-- <script src="JS/bootstrap.min.js"></script> -->
    <script src="../JS/jquery-3.5.1.min.js"></script>
</body>
</html>