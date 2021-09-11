<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Report</title>
  </head>
  <body>
    <h1>Laporan pendapatan</h1>
    <p><?= $between['start']. ' - ' .$between['end'] ?></p>
    <hr>
	<table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Termin</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Website</th>
                <th scope="col">Harga</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php if (!empty($result)) : ?>
                <?php $total=0; foreach ($result as $pend) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?> </th>
                        <td><?= $pend['id_termin'] ?></td>
                        <td><?= $pend['pelanggan_name']; ?></td>
                        <td><?= $pend['website']; ?></td>
                        <td><?= $pend['harga']; ?></td>
                        <td><?= date("d F Y", strtotime($pend['created_at'])) ?></td>
                        <td><?= number_format($pend['total_pendapatan']) ?></td>
                        <?php $total += $pend['total_pendapatan'] ?>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="6" align="right"><b>Total Pendapatan  </b></td>
                        <td><?= number_format($total,2) ?></td>
                    </tr>
            <?php else : ?>
                <p>Belum ditemukan data</p>
            <?php endif; ?>
        </tbody>

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