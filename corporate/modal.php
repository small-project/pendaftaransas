<style type="text/css">

 @media (min-width: 992px)
{
.modal-lg {
    width: 32%;
}

}

</style>

<div class="modal fade" id="perusahaanMPO" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-inline" method="post" action="">
                    <input type="text" name="kodeMPO" value="<?=$code?>">
                    <div class="form-group">
                        <select name="listPekerjaan" class="form-control" required>
                            <option value="0">--list pekerjaan--</option>
                            <?php
                        // ambil data dari database
                        $cek = new USER();
                        $stmt = $cek->runQuery("SELECT * FROM tb_jenis_pekerjaan");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                            ?>
                                <option value="<?php echo $row['kd_pekerjaan'] ?>">
                                    <?php echo $row['nama_pekerjaan'] ?>
                                </option>
                                <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="total" placeholder="total" required>
                    </div>
                    <button type="submit" name="addList" class="btn btn-default">SIMPAN</button>
                </form>

            </div>
        </div>
    </div>
</div>
