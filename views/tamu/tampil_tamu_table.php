<?php  ?>

<div class="card">
    <h2 style="margin-bottom: 16px;">Data Kritik & Saran</h2>

    <div class="table-responsive">
        <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
            <thead>
                <tr style="border-bottom: 1px solid var(--hairline); text-align: left; color: var(--text-muted);">
                    <th style="padding: 12px 8px;">Nama</th>
                    <th style="padding: 12px 8px;">Email</th>
                    <th style="padding: 12px 8px;">Pesan</th>
                    <th style="text-align: right; padding: 12px 8px; white-space: nowrap;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $hasil = mysqli_query($koneksi, 'SELECT * FROM tamu ORDER BY id_tamu');
                while ($data = mysqli_fetch_array($hasil)) {
                ?>
                    <tr style="border-bottom: 1px solid var(--hairline);">
                        <td style="font-weight: 500; padding: 12px 8px;"><?php echo $data['nama']; ?></td>
                        <td style="padding: 12px 8px;"><?php echo $data['email']; ?></td>
                        <td style="padding: 12px 8px;"><?php echo $data['pesan']; ?></td>

                        <td style="text-align: right; padding: 12px 8px;">
                            <div style="display: flex; justify-content: flex-end; align-items: center; gap: 12px; white-space: nowrap;">
                                <a href="index.php?page=edit_tamu&id=<?php echo $data['id_tamu']; ?>" style="font-weight: 600; color: var(--primary); text-decoration: none;">Edit</a>

                                <a href="controllers/hapus_tamu.php?id=<?php echo $data['id_tamu']; ?>" class="btn-danger" style="padding: 6px 12px; font-size: 13px; border-radius: 6px; text-decoration: none;" onclick="return confirm('Yakin ingin menghapus pesan ini?');">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>