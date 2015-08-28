<form id="myForm">
    <input type="hidden" value="<?=$data['id']?>" name="id">
    <table class="table">
        <tr>
            <td>Kode Pelanggan</td>
            <td><input class="input-sm form-control" name="no_pelanggan" value="<?=$data['no_pelanggan']?>" disabled></td>
            <td rowspan="4" colspan="3">
                <center>
                    <?php
                        if(!empty($data['foto'])){
                            echo "<img src='".base_url('images/pelanggan/'.$data['foto'])."' style=\"border:2px inset #ccc;border-radius:20px 5px 20px 5px\" />";
                        }else{
                            echo "<img src='".base_url('images/pelanggan/noimage.jpg')."' style=\"border:2px inset #ccc;border-radius:20px 5px 20px 5px\" />";
                        }
                    ?>
                </center>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input class="input-sm form-control" name="nama" value="<?=$data['nama']?>"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input class="input-sm form-control" name="username" value="<?=$data['username']?>" disabled></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input class="input-sm form-control" type="password" name="password"></td>
        </tr>
        <tr>
            <td>No HP</td>
            <td><input name="hp" value="<?=$data['hp']?>" class="input-sm form-control"></td>
            <td>Foto</td>
            <td><input type="file" name="foto" class="form-control input-sm" /></td>
            <input type="hidden" value="<?=$data['foto']?>" name="old_file" />
        </tr>
        <tr>
            <td>Alamat</td>
            <td colspan="3"><input class="input-sm form-control" name="alamat" value="<?=$data['alamat']?>"></td>
        </tr>
        <tr>
            <td>Kab/Kota</td>
            <td><input class="input-sm form-control" name="kab_kota" value="<?=$data['kab_kota']?>"></td>
            <td>Kode Pos</td>
            <td><input class="input-sm form-control" name="kode_pos" value="<?=$data['kode_pos']?>"></td>
        </tr>
        <tr>
            <td>Facebook</td>
            <td colspan="3"><input class="input-sm form-control" name="fb" value="<?=$data['fb']?>"></td>
        </tr>
        <tr>
            <td colspan="4">
                <a href="javascript:void(0)" onclick="saveClick()" class="btn pull-right btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</a>
            </td>
        </tr>
    </table>
</form>