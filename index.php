<?php 
include 'include/header.php';
include_once('config/connection.php');

if(!empty($_SESSION["username"])){
 header("Location: index.php");
}

if (isset($_POST['save'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";

	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
    $_SESSION['success'] = "You have logged in";
		header("Location: dashboard.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>
<section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h1 style="text-align: center">ໜ້າຟອມເຂົ້າສູ່ລະບົບ</h1>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username" style="font-size:15px">ຊື່ຜູ້ໃຊ້</label>
                    <input id="username" type="text" class="form-control" name="username" placeholder="ຊື່ຜູ້ໃຊ້" tabindex="1" required autofocus>
                    <div class="invalid-feedback" style="font-size:15px">
                      ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label" style="font-size:15px">ລະຫັດຜ່ານ</label>
                      <div class="float-right">
                        <!-- <a href="#" style="font-size:15px" class="text-small">
                           ລືມລະຫັດຜ່ານ?
                        </a> -->
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="ລະຫັດຜ່ານ" tabindex="2" required>
                    <div class="invalid-feedback" style="font-size:15px">
                    ກະລຸນາປ້ອນລະຫັດຜ່ານກ່ອນ
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" style="font-size:15px" for="remember-me">ຈື່ຂ້ອຍໄວ້</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="save"style="font-size:15px" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    ເຂົ້າສູ່ລະບົບ
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php 
// include "include/footer.php";
?>