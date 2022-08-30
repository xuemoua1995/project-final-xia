
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lrsjng.jquery-qrcode/0.13.1/jquery-qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/barcodes/JsBarcode.msi.min.js" integrity="sha512-SdvaPea2CC3DfZHLn6qZ5/MkWQ/BPCTL1Jx1e5HZd3mb7bT7qdaMsNFNfB+xYjppkgmUknHETRU1mhIbyfJZsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Barcode Prodcut</title>
    <style type="text/css">
        @page { size: 50mm 50mm }
        @media print {
            .print {
                page-break-after: always;
                text-align: left !important;
                padding-left:40px;
            }
            
        }
    </style>
</head>

<body onload="window.print(); window.onafterprint=window.close">
        <?php
        // include_once("config/connection.php");
        // $query = mysqli_query($conn, "SELECT * FROM tb_ProductItem");
        // echo "Data from database: ",$query;
        // while ($result = $query->fetch_assoc()) {
        //     $barcode = $result['barcode'];

        include_once("config/connection.php");
        $id=$_REQUEST['id'];
        echo 'ID: ',$id;
        $query = "SELECT barcode from tb_ProductItem where id='".$id."'"; 
        $result = mysqli_query($conn, $query) or die ( mysqli_error());

        echo "dddd:...",$result;
        $row = mysqli_fetch_assoc($result);
        echo "Data from:..:...",$row;
        while($row =  $query->fetch_assoc()) {
        ?>
            <div class="print">
                <svg class="barcode" 
                jsbarcode-format="CODE39" 
                jsbarcode-value="<?php echo $row["barcode"]; ?>"
                 jsbarcode-textmargin="2" 
                 jsbarcode-fontoptions="bold">
                </svg>
            </div>
        <?php
        }
        ?>
    <script type="text/javascript">
        JsBarcode(".barcode").init();
    </script>
</body>

</html>