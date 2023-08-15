<?php
use Core\App;
use Core\Session;
use Http\Form\LoginForm;

LoginForm::checkLogin($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$db = App::Container()->resolver('Core\Database');

$checkEmail = $db->query('select * from sale where usersMail = :email',[
    'email'=>$_POST['email']
])->rowCount();
if($checkEmail){
    Session::oldValue($_POST['email']);
 redirect('/register');
}else{
    $db->query('insert into sale(usersMail,usersPwd) values(:email, :password)',[
        'email'=> $_POST['email'],
        'password'=> password_hash($_POST['password'], PASSWORD_BCRYPT)

    ]);
    Session::put('user',[
        'email'=>$_POST['email']
    ]);
    redirect('/');
}



