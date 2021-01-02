
<?php 


$conn = new mysqli($config['host'],$config['user'],$config['pass'],$config['db']) or die;
// die;
/*dang nhap*/

if (isset($_POST['name_in']) && isset($_POST['pass_in'])) {
    $name_in = $_POST['name_in'];
    $pass_in = $_POST['pass_in'];


    // kiem tra xem tai khoan & mat khau co dung khong
    $select_in = "SELECT * FROM `user` WHERE `name` = '$name_in' AND `pass`='$pass_in'";
    // echo $select_in;
    $result = $conn->query($select_in);
    if ($result == true) {
      if ($result->num_rows > 0) {
        echo 'dang nhap thanh cong';
        header("Location: http://localhost/index.html");
        $conn->close();
      }else{
        echo 'sai tai khoan';
        $conn->close();
      }
    }


    
  }else{
      echo 'tai khoan mat khau chua duoc nhap';
    }

// /*dang ky*/
    if(isset($_POST['name_up']) && isset($_POST['pass_up']) && isset($_POST['re_pass_up'])){// kiem tra du lieu dau vao
      if ($_POST['pass_up'] != $_POST['re_pass_up']) {
        echo '2 pass nhap cho dung vao';
      }else{

        // dat bien tam
        $name_up = $_POST['name_up'];
        $pass_up = $_POST['pass_up'];

        // select tai khoan trong db
        $select_up = "SELECT * FROM `user` WHERE name = '$name_up' ";
          $result = $conn->query($select_up);//kiem tra thuc hien truy van

        if ($result->num_rows > 0) {// kiem tra xem co du lieu trung voi cau truy van ko
          echo 'tai khoan da ton tai !';
          $conn->close();
        } else {

            //them tai khoan
            $ins_up = "INSERT INTO `user`(`name`, `pass`) VALUES ('$name_up','$pass_up')";
            if ($conn->query($ins_up) ==true) {
              echo 'dang ky thanh cong';
              $conn->close();
            }else{
              echo 'dang ky khong thanh cong';
            }   
        }
      }
    }else{
      echo 'ban chua nhap du';
    }

?>

<div class="login-page">
  <div class="form">


    <!-- dang ky -->
    <form class="register-form" method="POST" action="">
      <input name="name_up" type="text" placeholder="name"/>
      <input name="pass_up" type="password" placeholder="password"/>
      <input name="re_pass_up" type="password" placeholder="re password"/>
      <button >create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>



    <!-- dang nhap -->
    <form class="login-form"method="POST" action=""> 
      <input name="name_in" type="text" placeholder="username"/>
      <input name="pass_in" type="password" placeholder="password"/>
      <button >login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>