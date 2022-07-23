<?php

include_once("config/connection.php");

?>

<nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li>
              <h4 style="color:blue;">ລະບົບ ການຈັດການ ການຂາຍອຸປະກອນເຄື່ອງໃຊ້ຫ້ອງການຂອງຮ້ານສຸນິດຕາ ດ້ວຍບາໂຄດ</h4>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"> <h6>ຮ້ານ ສຸນິດຕາ ສະບາຍດີ</h6> <span style="font-size:14px; color:blue; font-weight:bold"></span></div>
              
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                ອອກຈາກລະບົບ
              </a>
            </div>
          </li>
        </ul>
      </nav>