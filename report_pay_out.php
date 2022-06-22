<?php 
include "include/header.php";
include "include/topbar.php";
include "include/sidebar.php";
include_once("config/connection.php");
?>

<div class="main-content">
    <section class="section">
      <div class="section-body">   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>ລາຍງານຂໍ້ມູນລາຍຈ່າຍ</h4>
                <div>
                <form action="" methods="POST">
                      <input type="date" id="from" name="from_date"/>
                      <lable name="from">ຫາ</lable>
                      <input type="date" id="to" name="to_date"/>
                      <input type="submit" value="ຄົ້ນຫາ" class="btn btn-primary">
                      <button class="btn btn-warning" type="submit">ປຣິນໃບລາຍງານ</button>
                  </form>
                  
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped" id="sortable-table">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <i class="fas fa-th"></i>
                        </th>
                        <th>ລະຫັດສິນຄ້າ</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ລະຫັດບາໂຄດ</th>
                        <th>ລາຄາ</th>
                        <th>ຈຳນວນ</th>
                        <th>ວັນທີ່ຊື້</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET["from_date"]) && isset($_GET["to_date"])){
                      $from_date = $_GET["from_date"];
                      $to_date = $_GET["to_date"];

                      $query = "SELECT * FROM tb_ProductItem WHERE created_date BETWEEN '$from_date' AND '$to_date'";
                      $query_num = mysqli_query($conn, $query);

                      if(mysqli_num_rows($query_num) > 0){
                        foreach($query_num as $row){
                          ?>
                          <tr>
                          <td>
                            <div class='sort-handler'>
                              <i class='fas fa-th'></i>
                            </div>
                          </td>
                          <td><?php echo $row["id"]; ?></td>
                          <td>
                          <div><?php echo $row["name"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["barcode"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["typename"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["qty"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["buy_price"]; ?> ກີບ</div>
                          </td>
                          <td>
                          <div><?php echo $row["sale_price"]; ?> ກີບ</div>
                          </td>
                          <td>
                            <div class='badge badge-success'><?php echo $row["created_date"]; ?></div>
                          </td>
                        </tr>
                        <?php
                        }
                      }else{
                        echo "<span class='badge badge-danger'>ບໍມີຂໍ້ມູນ</span>";
                      }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(function () {
    $('button[type="submit"]').click(function () {
        var pageTitle = 'ຮ້ານ ສຸນິດຕາ',
            stylesheet = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
            win = window.open('', 'Print', 'width=500,height=300');
        win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<link rel="stylesheet" href="' + stylesheet + '">' +
            '</head><body>' + $('.table')[0].outerHTML + '</body></html>');
        win.document.close();
        win.print();
        win.close();
        return false;
    });
});
  </script>
<?php include('user-add.php') ?>
<?php 
include "include/footer.php";
?>