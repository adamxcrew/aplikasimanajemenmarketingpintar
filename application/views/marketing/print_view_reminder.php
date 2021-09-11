<!DOCTYPE html>
<html>
<head>
	<title>Print Termin Reminder</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<table width="100%" style="border-color: grey">
		<thead>
		  <tr>
		    <th colspan="3">BUKTI PEMBAYARAN TERMIN PELANGGAN<hr></th>
		  </tr>
		</thead>
		<tbody style="font-size: 12px">
		  <tr>
		    <td>Marketer</td>
		    <td colspan="2"><?= $result['marketer_name'] ?></td>
		  </tr>
		  <tr>
		    <td>Supervisor</td>
		    <td colspan="2"><?= $result['supervisor_name'] ?></td>
		  </tr>
		  <tr>
		    <td colspan="3" style="font-size: 14px"><hr><b>Pelanggan</b></td>
		  </tr>
		  <tr>
		    <td>Nama</td>
		    <td colspan="2"><?= $result['pelanggan_name'] ?></td>
		  </tr>
		  <tr>
		    <td>Website</td>
		    <td colspan="2"><?= $result['website'] ?></td>
		  </tr>
		  <tr>
		    <td>Biaya</td>
		    <td colspan="2">Rp. <?= number_format($result['harga']) ?></td>
		  </tr>
		  <tr>
		    <td colspan="3" style="font-size: 14px"><hr><b>Termin</b></td>
		  </tr>
		</tbody>
	</table>
	<table class="table table-bordered" width="100%" style="font-size: 12px; margin-top: 10px; margin-bottom: 10px">
		<tr align="center">
		    <td>Pertama</td>
		    <td>Kedua</td>
		    <td>Ketiga</td>
		  </tr>
		  <tr>
		    <!-- =================TERMIN 1================ -->
                <?php if (empty($result['bukti_termin1'])) : ?>
                    <td>-</td>
                <?php else : ?>
                    <td>
                        <p>Pembayaran selesai sebesar Rp. <?= number_format($result['termin1']) ?> atau <i>"50%"</i></p>
                    </td>
                <?php endif; ?>
                <!-- =================TERMIN 2================ -->
                <?php if (empty($result['bukti_termin2'])) : ?>
                    <td>-</td>
                <?php else : ?>
                    <td>
                        <p>Pembayaran selesai sebesar Rp. <?= number_format($result['termin2']) ?> atau <i>"30%"</i></p>
                    </td>
                <?php endif; ?>
                <!-- =================TERMIN 3================ -->
                <?php if (empty($result['bukti_termin3'])) : ?>
                    <td>-</td>
                <?php else : ?>
                    <td>
                        <p>Pembayaran selesai sebesar Rp. <?= number_format($result['termin3']) ?> atau <i>"20%"</i></p>
                    </td>
                <?php endif; ?>
		  </tr>
	</table>
	<hr>
	<p style="font-size: 10px; color: grey;">Dicetak pada <?= $now ?></p>
</body>
</html>