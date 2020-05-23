<form method="post">
  <div class="form-group" >
    <input placeholder="Email Girin" type="text" class="form-control" id="email" name="email" require>
  </div>
  <div class="form-group">
    <input placeholder="Şifre Girin" type="password" class="form-control" id="password" name="password" require>
  </div>
  <button type="submit" class="btn btn-primary">Giriş Yap</button>
  </form>
    <span>
        <?php
        			
            session_start();
            require_once(__DIR__.'./db.php');
            if (isset($_POST['email'], $_POST['password'])) {
                if (preg_match('/^[a-z0-9-_. ]*$/i', $_POST['email'])) {
                    if (strlen($_POST['password']) >= 1 && strlen($_POST['password']) <= 32) {
                        $result = $pdo->prepare("SELECT * FROM {$TableName} WHERE Name =:email OR Password =:password");
                        $result -> execute(['email' => $_POST['email'], 'password' => $_POST['password']]);
                        if ($result->rowCount()) {
                            foreach ($result->fetchAll() as $value) {
                                if ($_POST['password'] == $value['Password']) {
                                    $_SESSION['id'] =$value['Id'];
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['username'] = $value['Name'];
                                    header('Location: account.php');
                                exit();
                                }
                                else{
                                    if(isset($_POST['email'], $_POST['password']))
                                        echo "Şifre Hatalı !!!";
                                    $_SESSION['loggedin'] = false;
                                }
                            }
                        }
                        else{
                            if (isset($_POST['email'], $_POST['password']))
                                echo 'Kullanıcı Bulunamadı !!!';
                            $_SESSION['loggedin'] = false;
                        }
                    }
                    else {
                        if(isset($_POST['email'], $_POST['password']))
                            echo 'Lütfen geçerli bir şifre giriniz';
                        $_SESSION['loggedin'] = false;
                    }
                }
                else {
                    if(isset($_POST['email'], $_POST['password']))
                        echo 'Lütfen geçerli kullanıcı adı giriniz';
                    $_SESSION['loggedin'] = false;
                }
            }
            else
                echo 'girmedi';
        ?>
    </span>
