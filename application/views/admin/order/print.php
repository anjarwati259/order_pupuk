<html>
<head>
    <meta charset="ISO-8859-1">
    <style>

        html, body {
            width: 23cm; /* was 907px */
            height: 13.5cm; /* was 529px */
            display: block;
            font-family: "Consolas";
            margin:0;
            /*font-size: auto; NOT A VALID PROPERTY */
        }
        table{
            width:100%;
            display:inline;
            font-size:13px;
        }
        .box-body{
            padding:10px;
            font-size:13px;
        }
        @media print {
            html, body {
                width: 23cm; /* was 8.5in */
                height: 13.5cm; /* was 5.5in */
                display: block;
                font-family: "Consolas";
                padding:0 10px;
                margin:0;
                /*font-size: auto; NOT A VALID PROPERTY */
            }
            table{
                width:100%;
                display:inline;
                font-size:13px;
            }
            .box-body{
                padding:10px;
                font-size:13px;
            }

            @page {
                size: 24cm 14cm /* . Random dot? */;
            }
        }
    </style>
</head>
<body>
    <div class="box-body">
        <table style="display:inline;">
            <thead>
                <tr>
                    <td style="width:350px;">Pelanggan</td>
                    <td style="width:200px;">Invoice</td>
                    <td style="width:200px;">: <?php echo $detail->kode_transaksi?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $detail->nama_pelanggan?></td>
                    <td>Tgl Pembelian</td>
                    <td>: <?php echo date("d-m-Y H:i:s",strtotime($detail->tanggal_transaksi));?></td>
                </tr>
                <tr>
                    <td><?php echo $detail->alamat;?> </td>
                    <td valign="top">Pembayaran</td>
                    <td valign="top">: <?php echo $detail->metode_pembayaran == 1 ? "Transfer Bank" : "COD";?></td>
                </tr>
                <tr>
                    <td>Phone: <?php echo $detail->no_hp;?></td>
                    
                </tr>
            </tbody>
        </table>
        <br />
        <?php $line = "==================================================================================================================";?>
        <?php echo $line;?>
        <table>
            <thead>
            <tr>
                <td style="width:160px;">Produk</td>
                <td style="width:100px;">Jumlah</td>
                <td style="width:200px;">Harga Satuan</td>
                <td style="width:100px;text-align: right;">Subtotal</td>
            </tr>
            </thead>
        </table>
        <?php echo $line;?>
        <table>
            <thead  style="height:270px;">
                <?php foreach($order as $order){?>
                    <tr valign="top" style="height:10px;font-size:14px;">
                        <td style="width:160px;"><?php echo $order->nama_produk;?></td>
                        <td style="width:100px; text-align: left;"><?php echo $order->jml_beli;?></td>
                        <td style="width:200px; text-align: left;">Rp<?php echo number_format($order->harga);?></td>
                        <td style="width:100px; text-align: right;">Rp<?php echo number_format($order->total_harga);?></td>
                    </tr>
                <?php } ?>
            </thead>
        </table>
        <?php echo $line;?>
        <br>
        <br>
        <table>
            <thead>
            <tr><td style="width:60px;"></td>
                <td style="width:100px;"></td>
                <td style="width:100px;"></td>
                <td style="width:200px;">Total</td>
                <td style="width:100px;text-align: right;">Rp<?php echo number_format($detail->total_bayar);?></td>
            </tr>
            </thead>
        </table>
        <?php echo $line;?>
        <br />
        
    </div>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>