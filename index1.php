<?php
    require "libs/db.php";
    
    
    $data = $_GET;

    
    if (isset($data['do_signup']) )
    {   
        $userSearch = $data['id'];

        $user = R::load( 'user', $userSearch);

        $re_id = $user->id;

        $re_name = $user->name;

        $re_lastName = $user->lastName;

        $data['re_name'] = $user->name;

    }
    if (isset($data['re_user']) )
    {   
        $userSearch = $data['id'];
        $user = R::load( 'user', $userSearch);
        $user->name = $data['re_name'];
        R::store($user);
    }
    if (isset($data['user_del']) )
    {   
        $userSearch = $data['id'];
        R::trash( 'user', $userSearch);
    }

?>

<form action="index1.php" method="GET">
    <br> <input type="text" name="re_id" value="<?php echo @$re_id ?>"> <br>
    <br> <input type="text" name="re_name" value="<?php echo @$re_name ?>"> <br>
    <br> <input type="text" name="re_lastName" value="<?php echo @$re_lastName ?>"> <br>

    <br>

    <input class="user-user-textbox" type="text" name="id" value="<?php echo @$data['id']?>">
    
    <button class="registration-buttun-2" type="submit" name="do_signup">поиск </button>
    <br>
    <button class="registration-buttun-2" type="submit" name="re_user">обновить </button>
    <br>
    <button class="registration-buttun-2" type="submit" name="user_del">Удалить </button>
</form>

<div>
    <?php
    $users = R::find( 'user', 'id < ?', array(50));
    foreach($users as $user){
        $textId = $user->id;
        $textName = $user->name;
        $textLastName = $user->lastName;
        echo'   
            <div class="row">
                <div class="col-md-4">
                    <p class="admin-name-user">'.$textId.'</p>
                </div>
                <div class="col-md-3">
                    <p class="admin-login-user centered">'.$textName.'</p>
                </div>
                <div class="col-md-3">
                    <p class="admin-password-user centered">'.$textLastName.'</p>
                </div>
            </div>
            <hr>';
        }    
    ?>
</div>




