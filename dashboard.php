 
 <?php
session_start();
 include('include/header.php'); 
 include('include/topbar.php'); 
 include('include/sidebar.php'); 
 include_once('config/connection.php');

 if(!isset($_SESSION['admin_name'])){
  header('location:index.php');
}

 ?>

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-18">ຈຳນວນສິນຄ້າ</h5>
                          <br>
                          <?php
                         
                          $sql = "SELECT * FROM tb_ProductItem";
                          $query = mysqli_query($conn,$sql);
                          if($row=mysqli_num_rows($query)){
                              echo '<h2 class="mb-3 font-20" style="color:blue">'.$row.'</h2>';
                          }
                           
                          ?>
                          <!-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> -->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-18"> ຈຳນວນຜູ້ໃຊ້</h5>
                          <br>
                          <?php
                          $sql = "SELECT * FROM tb_user";
                          $query = mysqli_query($conn,$sql);
                          if($row=mysqli_num_rows($query)){
                              echo '<h2 class="mb-3 font-20" style="color:blue">'.$row.'</h2>';
                          }
                           
                          ?>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-18">ປະເພດສິນຄ້າ</h5>
                          <br>
                          <?php
                          $sql = "SELECT * FROM tb_ProductType";
                          $query = mysqli_query($conn,$sql);
                          if($row=mysqli_num_rows($query)){
                              echo '<h2 class="mb-3 font-20" style="color:blue">'.$row.'</h2>';
                          }
                           
                          ?>
                          <!-- <p class="mb-0"><span class="col-green">18%</span>
                            Increase</p> -->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-18">ຈຳນວນລາຍໄດ້</h5>
                          <br>
                          <?php
                          $query = mysqli_query($conn, "SELECT SUM(price) AS total FROM `tb_order` WHERE tb_state!='1'") or die(mysqli_error());

                          $fetch = mysqli_fetch_array($query);
                          ?>
                          <h2 class="mb-3 font-16" style="color:blue"><?php echo number_format($fetch['total'])?> ກີບ</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-9">
                      <div id="chart1"></div>
                      <div class="row mb-0">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30">
                             
                            <i class="fas fa-signal" style="font-size:30px; color:red"></i>
                              <h5 class="m-b-0">
                              <?php 
                               $query = mysqli_query($conn,"SELECT DATE(created_date), sum(price) as total FROM tb_order WHERE DATE(created_date) = DATE(NOW()) ORDER BY `id` DESC");
                               $fetchDaily = mysqli_fetch_array($query);
                               echo number_format($fetchDaily['total'])
                              ?> ກີບ</h5>
                              <p class=" font-16 m-b-0" style="color:red">ລາຍໄດ້ປະຈຳວັນ</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30">
                           
                            <i class="fas fa-signal" style="font-size:30px; color:blue"></i>
                              <h5 class="m-b-0">
                              <?php 
                               $query = mysqli_query($conn,"SELECT MONTHNAME(created_date) as mname, sum(price) as total FROM tb_order GROUP BY MONTH(created_date)");
                               $fetchMonth = mysqli_fetch_array($query);
                               echo number_format($fetchMonth['total'])
                              ?>
                                 ກີບ</h5>
                              <p class="font-16 m-b-0" style="color:blue">ລາຍໄດ້ປະຈຳເດືອນ</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30">
                           
                            <i class="fas fa-signal" style="font-size:30px; color:green"></i>
                              <h5 class="mb-0 m-b-0">
                              <?php 
                               $query = mysqli_query($conn,"SELECT YEAR(created_date) as mname, sum(price) as total FROM tb_order GROUP BY YEAR(created_date)");
                               $fetchYear = mysqli_fetch_array($query);
                               echo number_format($fetchYear['total'])
                              ?>
                                  ກີບ</h5>
                              <p class=" font-16 m-b-0" style="color:green">ລາຍໄດ້ປະຈຳປີ</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>ລາຍການສິນຄ້າເພີ່ມໃໝ່</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                    <thead>
                      <tr>
                        <th class="text-center">
                        <div class="sort-handler">
                           <i class="fas fa-th"></i>
                        </div>
                        </th>
                        <th>ລຳດັບ</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ລະຫັດບາໂຄດ</th>
                        <th>ປະເພດສິນຄ້າ</th>
                        <th>ລາຄາຊື້</th>
                        <th>ລາຄາຂາຍ</th>
                        <th>ເພີ່ມວັນທີ່ເດຶອນປີ</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                         $i =1;
                          include_once("config/connection.php");
                          $sql = "SELECT * FROM tb_ProductItem";
                          $query = $conn->query($sql);
                        
                            while($row =  $query->fetch_assoc()) {
                              // $new_date = date("d/m/Y H:i:s", strtotime($row["created_date"]));
                              echo "
                              <tr>
                              <td>
                                <div class='sort-handler'>
                                  <i class='fas fa-th'></i>
                                </div>
                              </td>
                              <td>". $i. "</td>
                              <td>
                              <div>". $row['name'] . "</div>
                              </td>
                              <td>
                              <div>". $row['barcode'] . "</div>
                              </td>
                              <td>
                              <div>". $row['typename'] . "</div>
                              </td>
                              <td>
                              <div>". number_format($row['buy_price']) . " ກີບ</div>
                              </td>
                              <td>
                              <div>". number_format($row['sale_price']) . " ກີບ</div>
                              </td>
                              <td>
                                <div class='badge badge-success'>". $row["created_date"] . "</div>
                              </td>
                            </tr>";
                            $i++;
                            }
                          
                          ?>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

    <?php
    include('include/footer.php'); 
    ?>