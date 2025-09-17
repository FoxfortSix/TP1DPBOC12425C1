<?php

// 1. Mengimpor file class agar bisa digunakan di sini
require_once 'BarangElektronik.php';

// 2. Memulai Session
session_start();

// 3. Inisialisasi Penyimpanan Data
if (!isset($_SESSION['gudang'])) {
    $_SESSION['gudang'] = [];
}

// 4. Logika Pemrosesan Form (CRUD)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'tambah') {
        $produkBaru = new BarangElektronik(
            $_POST['kode'], $_POST['nama'], $_POST['merek'],
            (int)$_POST['harga'], (int)$_POST['stok'],
            $_POST['kategori'], $_POST['gambar']
        );
        $_SESSION['gudang'][] = $produkBaru;
    }
    
    if (isset($_POST['action']) && $_POST['action'] === 'hapus') {
        $index = $_POST['index'];
        if (isset($_SESSION['gudang'][$index])) {
            unset($_SESSION['gudang'][$index]);
            $_SESSION['gudang'] = array_values($_SESSION['gudang']);
        }
    }
    
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $index = $_POST['index'];
        if (isset($_SESSION['gudang'][$index])) {
            $_SESSION['gudang'][$index]->setNamaProduk($_POST['nama']);
            $_SESSION['gudang'][$index]->setHargaProduk((int)$_POST['harga']);
            $_SESSION['gudang'][$index]->setStokProduk((int)$_POST['stok']);
        }
    }

if (isset($_POST['action']) && $_POST['action'] === 'hapus_semua') {
    $_SESSION['gudang'] = [];
}
}

$produk_edit = null;
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['gudang'][$index])) {
        $produk_edit = $_SESSION['gudang'][$index];
    }
}

$daftar_tampil = $_SESSION['gudang']; // Secara default, tampilkan semua data
if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
    $keyword = strtolower(trim($_GET['keyword']));
    $hasil_pencarian = [];
    foreach ($_SESSION['gudang'] as $produk) {
        // Cek apakah keyword cocok (case-insensitive) dengan kode atau nama produk
        if (strpos(strtolower($produk->getKodeProduk()), $keyword) !== false || 
            strpos(strtolower($produk->getNamaProduk()), $keyword) !== false) {
            $hasil_pencarian[] = $produk;
        }
    }
    $daftar_tampil = $hasil_pencarian; // Ganti daftar yang akan ditampilkan dengan hasil pencarian
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Toko Elektronik Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-gray-300 bg-slate-900">

<div class="container max-w-5xl p-4 mx-auto md:p-8">
    <h1 class="mb-4 text-4xl font-bold text-center md:text-5xl text-cyan-400">Toko Elektronik</h1>
    <p class="mb-10 text-center text-gray-400">Manajemen data produk elektronik.</p>

    <div class="p-6 mb-10 border bg-slate-800 rounded-2xl border-slate-700">
        <?php if ($produk_edit): ?>
            <h2 class="mb-5 text-2xl font-semibold text-gray-100">Ubah Data Produk</h2>
            <form action="index.php" method="POST" class="space-y-4">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="index" value="<?= htmlspecialchars($_GET['index']) ?>">
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-400">Kode Produk:</label>
                    <input type="text" value="<?= htmlspecialchars($produk_edit->getKodeProduk()) ?>" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" disabled>
                </div>
                <div>
                    <label for="nama" class="block mb-1 text-sm font-medium text-gray-400">Nama Produk:</label>
                    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($produk_edit->getNamaProduk()) ?>" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div><label for="harga" class="block mb-1 text-sm font-medium text-gray-400">Harga:</label><input type="number" id="harga" name="harga" value="<?= htmlspecialchars($produk_edit->getHargaProduk()) ?>" class="w-full p-3 border rounded-lg bg-slate-700 border-slate-600" required></div>
                    <div><label for="stok" class="block mb-1 text-sm font-medium text-gray-400">Stok:</label><input type="number" id="stok" name="stok" value="<?= htmlspecialchars($produk_edit->getStokProduk()) ?>" class="w-full p-3 border rounded-lg bg-slate-700 border-slate-600" required></div>
                </div>
                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="w-full px-6 py-3 font-bold transition rounded-full md:w-auto bg-cyan-400 text-slate-900 hover:bg-cyan-500">Update Produk</button>
                    <a href="index.php" class="w-full px-6 py-3 font-bold text-center text-white transition rounded-full md:w-auto bg-slate-600 hover:bg-slate-700">Batal</a>
                </div>
            </form>
        <?php else: ?>
            <h2 class="mb-5 text-2xl font-semibold text-gray-100">Tambah Produk Baru</h2>
            <form action="index.php" method="POST" class="space-y-4">
                <input type="hidden" name="action" value="tambah">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div><label for="kode" class="block mb-1 text-sm font-medium text-gray-400">Kode Produk:</label><input type="text" id="kode" name="kode" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" required></div>
                    <div><label for="nama" class="block mb-1 text-sm font-medium text-gray-400">Nama Produk:</label><input type="text" id="nama" name="nama" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" required></div>
                    <div><label for="merek" class="block mb-1 text-sm font-medium text-gray-400">Merek:</label><input type="text" id="merek" name="merek" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" required></div>
                    <div><label for="kategori" class="block mb-1 text-sm font-medium text-gray-400">Kategori:</label><input type="text" id="kategori" name="kategori" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" required></div>
                    <div><label for="harga" class="block mb-1 text-sm font-medium text-gray-400">Harga:</label><input type="number" id="harga" name="harga" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" required></div>
                    <div><label for="stok" class="block mb-1 text-sm font-medium text-gray-400">Stok:</label><input type="number" id="stok" name="stok" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" required></div>
                </div>
                <div>
                    <label for="gambar" class="block mb-1 text-sm font-medium text-gray-400">Path Gambar (e.g., images/laptop.jpg):</label>
                    <input type="text" id="gambar" name="gambar" class="w-full p-3 text-gray-200 border rounded-lg bg-slate-700 border-slate-600" required>
                </div>
                <button type="submit" class="w-full px-6 py-3 font-bold transition rounded-full bg-cyan-400 text-slate-900 hover:bg-cyan-500">Tambah Produk</button>
            </form>
        <?php endif; ?>
    </div>
    
    <div class="overflow-hidden border bg-slate-800 rounded-2xl border-slate-700">
<div class="overflow-hidden border bg-slate-800 rounded-2xl border-slate-700">
        <div class="p-6">
            <div class="items-center justify-between md:flex">
                <h2 class="mb-4 text-2xl font-semibold text-gray-100 md:mb-0">Daftar Produk</h2>
                <?php if (!empty($_SESSION['gudang'])): ?>
                <form action="index.php" method="POST" onsubmit="return confirm('Anda YAKIN ingin menghapus SEMUA data produk? Tindakan ini tidak bisa dibatalkan.');">
                    <input type="hidden" name="action" value="hapus_semua">
                    <button type="submit" class="w-full px-4 py-2 text-sm font-semibold text-white transition bg-red-700 rounded-lg hover:bg-red-800 md:w-auto">
                        Hapus Semua Data
                    </button>
                </form>
                <?php endif; ?>
            </div>
            <div class="flex items-center mt-4">
                <form action="index.php" method="GET" class="flex-grow">
                    <div class="flex">
                        <input type="text" id="keyword" name="keyword" placeholder="Cari Kode atau Nama..." class="w-full p-3 text-gray-200 border rounded-l-lg bg-slate-700 border-slate-600 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
                        <button type="submit" class="px-4 py-2 text-white transition rounded-r-lg bg-slate-600 hover:bg-slate-700">Cari</button>
                    </div>
                </form>
                <a href="index.php" class="px-4 py-3 ml-2 text-white transition rounded-lg bg-slate-600 hover:bg-slate-700">Reset</a>
            </div>
            </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-700">
                    <tr>
                        <th class="p-3 font-semibold text-left text-gray-300">Kode</th>
                        <th class="p-3 font-semibold text-left text-gray-300">Nama</th>
                        <th class="p-3 font-semibold text-left text-gray-300">Merek</th>
                        <th class="p-3 font-semibold text-left text-gray-300">Harga</th>
                        <th class="p-3 font-semibold text-left text-gray-300">Stok</th>
                        <th class="p-3 font-semibold text-left text-gray-300">Gambar</th>
                        <th class="p-3 font-semibold text-left text-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    <?php if (empty($daftar_tampil)): ?>
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-400"><?= isset($_GET['keyword']) ? 'Produk tidak ditemukan.' : 'Data masih kosong.' ?></td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($daftar_tampil as $original_index => $produk): ?>
                            <tr class="hover:bg-slate-700">
                                <td class="p-3 whitespace-nowrap"><?= htmlspecialchars($produk->getKodeProduk()) ?></td>
                                <td class="p-3 font-medium text-gray-100"><?= htmlspecialchars($produk->getNamaProduk()) ?></td>
                                <td class="p-3"><?= htmlspecialchars($produk->getMerekProduk()) ?></td>
                                <td class="p-3">Rp <?= number_format($produk->getHargaProduk(), 0, ',', '.') ?></td>
                                <td class="p-3"><?= htmlspecialchars($produk->getStokProduk()) ?> unit</td>
                                <td class="p-3"><img src="<?= htmlspecialchars($produk->getGambar()) ?>" alt="<?= htmlspecialchars($produk->getNamaProduk()) ?>" class="object-cover rounded-md w-14 h-14"></td>
                                <td class="p-3">
                                    <div class="flex items-center gap-3">
                                        <a href="index.php?action=edit&index=<?= $original_index ?>" class="font-semibold text-cyan-400 hover:text-cyan-300">Ubah</a>
                                        <form action="index.php" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
                                            <input type="hidden" name="action" value="hapus">
                                            <input type="hidden" name="index" value="<?= $original_index ?>">
                                            <button type="submit" class="px-2 py-1 text-xs text-white transition bg-red-700 rounded-full hover:bg-red-800">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>