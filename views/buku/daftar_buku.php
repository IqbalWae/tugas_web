

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h2 style="margin: 0;">Koleksi Buku</h2>
        <span class="badge" style="background-color: var(--surface); color: var(--text-muted); border: 1px solid var(--hairline);">Gallery View</span>
    </div>

    <div class="grid-4">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM buku");
        while ($data = mysqli_fetch_array($query)) {
            $status_class = ($data['status'] == 'tersedia') ? 'badge-success' : 'badge-error';
            ?>
            <a href="index.php?page=detail_buku&id=<?php echo $data['id_buku']; ?>" class="book-card">
                <div class="book-cover">
                    <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="book-info">
                    <h3 class="book-title"><?php echo $data['judul']; ?></h3>
                    <p class="book-author"><?php echo $data['pengarang']; ?></p>
                    <div class="book-footer">
                        <span class="badge <?php echo $status_class; ?>"><?php echo $data['status']; ?></span>
                        <span style="font-size: 12px; color: var(--primary); font-weight: 500;">Detail &rarr;</span>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</div>