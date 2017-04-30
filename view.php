<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th class="text-center">NO</th>
            <th class="text-center">FOTO</th>
            <th class="text-center">NIS</th>
            <th class="text-center">NAMA</th>
            <th class="text-center">JENIS KELAMIN</th>
            <th class="text-center">TELP</th>
            <th class="text-center">ALAMAT</th>
            <th colspan="2" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
        </tr>
        <?php
            // include / load file koneksi.php
            include "koneksi.php";

            // Buat query untuk menampilkan semua data siswa
            $sql = $pdo->prepare("SELECT * FROM siswa");
            $sql->execute(); // Eksekusi querynya

            $no = 1; // Untuk penomoran table. di awal set dengan 1
            while ($data = $sql->fetch()) { // Ambil semua data dari hasl eksekusi $sql
        ?>
        <tr>
            <td class="align-middle text-center"><?php echo $no; ?></td>
            <td class="align-middle text-center">
                <img src="foto/<?php echo $data['foto']; ?>" width="80" height="80">
            </td>
            <td class="align-middle"><?php echo $data['nis']; ?></td>
            <td class="align-middle"><?php echo $data['nama']; ?></td>
            <td class="align-middle"><?php echo $data['jenis_kelamin']; ?></td>
            <td class="align-middle"><?php echo $data['telp']; ?></td>
            <td class="align-middle"><?php echo $data['alamat']; ?></td>
            <td class="align-middle text-center">
                <a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
            <td class="align-middle text-center">
                <a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
            </td>
        </tr>
        <!--
        Membuat sebuah textbox hidden yang akan digunakan untuk form ubah
        -->
        <input type="hidden" id="nis-value-<?php echo $no; ?>" value="<?php echo $data['nis']; ?>">
        <input type="hidden" id="nama-value-<?php echo $no; ?>" value="<?php echo $data['nama']; ?>">
        <input type="hidden" id="jeniskelamin-value-<?php echo $no; ?>" value="<?php echo $data['jenis_kelamin']; ?>">
        <input type="hidden" id="telp-value-<?php echo $no; ?>" value="<?php echo $data['telp']; ?>">
        <input type="hidden" id="alamat-value-<?php echo $no; ?>" value="<?php echo $data['alamat']; ?>">
        <?php
            $no++; // Tambah 1 setiap kali looping
            }
        ?>
    </table>
</div>

<script>
    // Fungsi ini akan dipanggil ketika tombol edit diklik
    function edit(no) {
        $("#btn-simpan").hide(); // Sembunyikan tombol simpan
        $("#btn-ubah, #checkbox_foto").show(); // Munculkan tombol ubah dan checkbox foto

        // Set judul modal dialog menjadi Form Ubah Data
        $("modal-title").html("Form Ubah data");

        var nis = $("#nis-value-" + no).val(); // Ambil nis dari input type hidden
        var nama = $("#nama-value-" + no).val(); // Ambil nama dari input type hidden
        var jeniskelamin = $("#jeniskelamin-value-" + no).val(); // Ambil jenis kelamin dari input type hidden
        var telp = $("#telp-value-" + no).val(); // Ambil telp dari input type hidden
        var alamat = $("#alamat-value-" + no).val(); // Ambil dari input type hidden

        // Set value dari textbox nis yang ada di form
        // Set textbox nis menjadi Readonly
        $("#nis").val(nis).attr("readonly", "readonly");

        $("#nama").val(nama); // Set value dari textbox nama yang ada diform
        $("#jenis_kelamin").val(jeniskelamin); // Set value dari textbox nama yang ada di form
        $("#telp").val(telp); // Set value dari textbox nama yang ada di form
        $("#alamat").val(alamat); // Set value dari textbox namam yang ada di form
        $("#foto").val("");
    }

    // Fungsi ini akan dipanggil ketika tombol hapus diklik
    function hapus(no) {
        var nis = $("#nis-value-" + no).val(); // Ambil nis dari input type hidden

        // Set textbox hidden nis yang ada di modal dialog hapus
        $("#data-nis").val(nis);
    }
</script>