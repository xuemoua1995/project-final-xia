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
                <h4>ລາຍງານຂໍ້ມູນນຳເຂົ້າສິນຄ້າ</h4>
                <div>
                <form action="" methods="POST">
                      <input type="date" name="from_date" value="<?php if(isset($_GET["from_date"])) echo $_GET["from_date"];?>"/>
                      <lable name="from">ຫາ</lable>
                      <input type="date" name="to_date" value="<?php if(isset($_GET["to_date"])) echo $_GET["to_date"];?>"/>
                      <input type="submit" value="ຄົ້ນຫາ" class="btn btn-primary">
                </form>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                
                  <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <i class="fas fa-th"></i>
                        </th>
                        <th>ລຳດັບ</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ບາໂຄດ</th>
                        <th>ປະເພດສິນຄ້າ</th>
                        <th>ຈຳນວນ</th>
                        <th>ລາຄາ</th>
                        <th>ເພີ່ມວັນທີ່ເດຶອນປີ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET["from_date"]) && isset($_GET["to_date"])){
                      $from_date = $_GET["from_date"];
                      $to_date = $_GET["to_date"];

                      $query = "SELECT * FROM tb_import WHERE created_date BETWEEN '$from_date' AND '$to_date'";
                      $query_num = mysqli_query($conn, $query);

                      if(mysqli_num_rows($query_num) > 0){
                        foreach($query_num as $row){
                          // $new_date = date("d/m/Y H:i:s", strtotime($row["created_date"]));
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
                          <div><?php echo number_format($row["buy_price"]); ?> ກີບ</div>
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
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat:"dd/mm/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat:"dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
<?php 
include "include/footer.php";
?>

