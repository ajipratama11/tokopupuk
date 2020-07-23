<!DOCTYPE html>
<html lang="en">

<body>
    <form method="post" action="<?= base_url() ?>Customer/Customer/daftar">
        <input name="nama" placeholder="Nama"><br>
        <input name="alamat" placeholder="Alamat"><br>
        <input name="kode_pos" placeholder="Kode Pos"><br>
        <input name="no_hp" placeholder="No Hp"><br>
        <input name="email" placeholder="Email"><br>
        <input name="username" placeholder="Username"><br>
        <input name="password" placeholder="Password"><br>
        <button class="button" type="submit">Daftar</button>
    </form>
</body>

</html>