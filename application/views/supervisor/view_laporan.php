<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Laporan Pembayaran</title>
  </head>
  <body>
    <h1>Laporan pembayaran</h1>
    <p><?= $between['start']. ' - ' .$between['end'] ?></p>
    <hr>
    <table width="100%" class="table table-bordered" style="font-size: 12px">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Termin</th>
                <th scope="col">Nama Marketing</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Website</th>
                <th scope="col">Harga</th>
                <th scope="col">Termin 1</th>
                <th scope="col">Termin 2</th>
                <th scope="col">Termin 3</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php if (!empty($result)) : ?>
                <?php $subTotal=0; $grandTotal=0; foreach ($result as $pend) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?> </th>
                        <td><?= $pend['id_termin'] ?></td>
                        <td><?= $pend['marketer_name'] ?></td>
                        <td><?= $pend['pelanggan_name']; ?></td>
                        <td><?= $pend['website']; ?></td>
                        <td><?= number_format($pend['harga']); ?></td>
                        <td>
                            <?php if(!empty($pend['termin1_created'])) : ?>
                                <span style="color: green;"><?= number_format($pend['termin1']) ?></span>
                            <?php else: ?>
                                <span style="color: red;"><?= number_format($pend['termin1']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!empty($pend['termin2_created'])) : ?>
                                <span style="color: green;"><?= number_format($pend['termin2']) ?></span>
                            <?php else: ?>
                                <span style="color: red;"><?= number_format($pend['termin2']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!empty($pend['termin3_created'])) : ?>
                                <span style="color: green;"><?= number_format($pend['termin3']) ?></span>
                            <?php else: ?>
                                <span style="color: red;"><?= number_format($pend['termin3']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?= date("d F Y", strtotime($pend['created_at'])) ?></td>
                        
                        <?php
                            $term1 = (!empty($pend['termin1_created'])) ? $pend['termin1'] : 0;
                            $term2 = (!empty($pend['termin2_created'])) ? $pend['termin2'] : 0;
                            $term3 = (!empty($pend['termin3_created'])) ? $pend['termin3'] : 0;

                            $subTotal = $term1 + $term2 + $term3;
                            //total pendaptan
                            $grandTotal += $subTotal;
                        ?>
                        <td><?= number_format($subTotal) ?></td>
                        <?php  ?>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="10" align="right"><b>Total Pendapatan  </b></td>
                        <td><?= number_format($grandTotal,2) ?></td>
                    </tr>
            <?php else : ?>
                <p>Belum ditemukan data</p>
            <?php endif; ?>
        </tbody>

    </table>
    <table style="font-size: 12px">
        <tr>
            <td colspan="2">Keterangan:</td>
        </tr>
        <tr>
            <td><span style="color: green">Warna hijau</span> : Pembayaran termin telah diterima</td>
        </tr>
        <tr>
            <td><span style="color: red">Warna merah</span> : Pembayaran termin belum diterima</td>
        </tr>
    </table>
    <br>
    <p style="color: grey; font-size: 10px">Diekspor pada : <?= $now ?></p>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>