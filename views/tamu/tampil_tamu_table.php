<?php  ?>

<div class="card">
    <h2>Data Buku Tamu</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th style="text-align: right;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $hasil = mysqli_query($koneksi, 'SELECT * FROM tamu ORDER BY id_tamu');
            while ($data = mysqli_fetch_array($hasil)){
                ?>
                <tr>
                    <td style="font-weight: 500;"><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['pesan']; ?></td>
                    <td style="text-align: right;">
                        <a href="index.php?page=edit_tamu&id=<?php echo $data['id_tamu']; ?>" style="margin-right: 12px; font-weight: 500;">Edit</a>
                        <a href="controllers/hapus_tamu.php?id=<?php echo $data['id_tamu']; ?>?id=<?php echo $data['id_tamu']; ?>" class="btn-danger" onclick="return confirm('Yakin hapus?');">Hapus</a>
                        
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>