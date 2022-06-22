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
                <h4>ລາຍງານຂໍ້ມູນພະນັກງານ</h4>
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
                        <th>ລະຫັດ</th>
                        <th>ຊື່ເຕັມ</th>
                        <th>ເພດ</th>
                        <th>ວັນເດືອນປີເກີດ</th>
                        <th>ທີ່ຢູ່</th>
                        <th>ເບີໂທ</th>
                        <th>ວັນທີ່ເພີ່ມ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET["from_date"]) && isset($_GET["to_date"])){
                      $from_date = $_GET["from_date"];
                      $to_date = $_GET["to_date"];

                      $query = "SELECT * FROM tb_Staff WHERE created_date BETWEEN '$from_date' AND '$to_date'";
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
                          <div><?php echo $row["fullname"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["gender"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["birthday"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["address"]; ?></div>
                          </td>
                          <td>
                          <div><?php echo $row["phone"]; ?></div>
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
<?php 
include "include/footer.php";
?>