<?php
    require "libs/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ювелирынй магазин</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function(){
        var button = $('#button-up');
        $(window).scroll (function(){
            if ($(this).scrollTop()>300){
                button.fadeIn();
            } else {
                button.fadeOut();
            }
        });
        button.on('click',function(){
            $('body, html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    </script>
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
                                <img class="icon-image" src="IMAGE/diamond.svg" alt=""></img>
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 logo-textbox">
                        <p class="logo-text">Юверирная Мастерская “Орфей”</p>
                    </div>
                    <div class="col-md-1">&nbsp</div>
                    <div class="col-md-1">
                        <div class="navbar-text-button button centered">
                            <a href="#" style="color:#cfa362">Главная</a>
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
                            <!-- кнопка войти -->
                            <?php if (isset($_SESSION['logged_user']) ) : ?>
                            <?php echo '<a href="html/login.php">'.$_SESSION['logged_user']->login.'</a>';?>
                            <?php else : ?>
                            <a href="html/login.php">Войти</a>
                            <?php endif; ?>
                            <!--  -->
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp</div> 
                </div>
            </div>
        </div>
    </div>

    <div id="headerwrap">
        <div class="row ">
            <div class="col-md-12 main-headerwrap">
                <div class="col-md-1">&nbsp</div>
                <div class="col-md-4 picture-text">
                    <p class="blest">Блестяще - это про нас</p>
                    <hr class="he-bkest-main">
                    <p class="masters">Ручная мастерская</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row main">
        <div class="col-md-6">&nbsp</div>
        <div class="col-md-4 centered birca-1">
            <p class="garant">Гарант</p>
            <p class="garant-text">Более</p>
            <p class="garant-text">5000</p>
            <p class="garant-text">заказов</p>
            <p class="garant-text">за 10 лет</p>
        </div>
        <div class="col-md-2">&nbsp</div>
    </div>

    <div class="row">
        <div class="col-md-2">&nbsp</div>
        <div class="col-md-4 centered birca-2">
            <p class="kachestvo">Качество</p>
            <p class="kachestvo-text">Вы можете</p>
            <p class="kachestvo-text">наблюдать за</p>
            <p class="kachestvo-text">процессом</p>
            <p class="kachestvo-text">изготовления</p>
        </div>
        <div class="col-md-6">&nbsp</div>
    </div>

    <div class="row">
        <div class="col-md-6">&nbsp</div>
        <div class="col-md-4 centered birca-3">
            <p class="delivery">Доставка</p>
            <p class="delivery-text">Если вы</p>
            <p class="delivery-text">не можете</p>
            <p class="delivery-text">забрать заказ</p>
            <p class="delivery-text">мы доставим</p>
            <p class="delivery-text">его на дом</p>
        </div>
        <div class="col-md-2">&nbsp</div>
    </div>

    <div class="row footers">
        <div class="col-md-1">&nbsp</div>
        <div class="col-md-1">
            <div class="row facebook">
                <center>
                    <div class="icon-facebook">
                        <img src="IMAGE/facebook.png" alt="" class="icon-image-facebook"></img>
                    </div>
                </center>
            </div>
            <div class="row google">
                <center>
                    <div class="icon-google">
                        <img src="IMAGE/google-plus.png" alt="" class="icon-image-google">
                    </div>
                </center>
            </div>
            <div class="row vk">
                <center>
                    <div class="icon-vk">
                        <img src="IMAGE/vk.png" alt="" class="icon-image-vk">
                    </div>
                </center>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row facebook">
                <a href="#">
                    <p class="facebook-text">Facebook</p>
                </a>
            </div>
            <div class="row google">
                <a href="#">
                    <p class="google-text">Google</p>
                </a>
            </div>
            <div class="row vk">
                <a href="#">
                    <p class="vk-text">Vk</p>
                </a>
            </div>
        </div>

        <div class="col-md-3 aboutit centered">
            <div class="row aboutit-head">
                <p class="abautit-head-text4">
                    Наша мастерская работает
                </p>
                <p class="abautit-head-text4">
                    с 1985 года, специальзируется
                </p>
                <p class="abautit-head-text4">
                    на изготовления украшений
                </p>
                <p class="abautit-head-text4">
                    ручной работы, вся работа
                </p>
                <p class="abautit-head-text4">
                    производиться лучшими специалистами
                </p>
            </div>
        </div>

        <div class="col-md-1">&nbsp</div>

        <div class="col-md-3 aboutit centered">
            <div class="row aboutit-head">
                <p class="abautit-head-text1">
                    Чтобы быть в курсе всех
                </p>
                <p class="abautit-head-text2">
                    событий подпишись на рассылку
                </p>
            </div>
            <div class="email-text">
                <p class="email-text-text">Элекронная почта</p>
            </div>
            <div class="email-opne">
                <input class="textbox" type="text">
            </div>
            <center>
                <div class="email-buttun">
                    <a href="#">
                        <p class="email-buttun-box">Прдписаться</p>
                    </a>
                </div>
            </center>
            <div class="phote">
                8-800-5259-67-67
            </div>

            <div class="phote">
                <p>Волгоград г. Рабоче-Крестьянская ул., 14</p>
            </div>

        </div>
    </div>

    <div id="button-up">
        <i class="fa fa-chevron-up"></i>
    </div>
    
    <!-- <script src="JS/bootstrap.min.js"></script> -->
    <script src="JS/jquery-3.5.1.min.js"></script>
</body>
</html>