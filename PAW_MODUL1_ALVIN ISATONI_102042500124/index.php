<?php
// 1. Data produk disimpan dalam array PHP
$products = [
    ["nama" => "Laptop Ultrabook 14 inci", "kategori" => "Laptop",     "harga" => 12500000, "stok" => 5],
    ["nama" => "Smartphone Nova 5G",       "kategori" => "Smartphone", "harga" => 4800000,  "stok" => 12],
    ["nama" => "Headset Bluetooth",        "kategori" => "Audio",      "harga" => 850000,   "stok" => 20],
    ["nama" => "Keyboard Mekanik RGB",     "kategori" => "Aksesoris",  "harga" => 650000,   "stok" => 0],
    ["nama" => "Monitor IPS 24 inci",      "kategori" => "Monitor",    "harga" => 1900000,  "stok" => 7],
    ["nama" => "Mouse Wireless",           "kategori" => "Aksesoris",  "harga" => 180000,   "stok" => 0],
];

// 2. Hitung total produk otomatis
$total_produk = count($products);

// Fungsi format Rupiah
function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// Hitung harga setelah diskon
function hitung_diskon($harga, $persen) {
    return $harga - ($harga * $persen / 100);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: "Segoe UI", Tahoma, sans-serif; background: #f0f4f8; color: #0b2530; line-height: 1.5; body { font-family: "Segoe UI", Tahoma, sans-serif; background: #f0f4f8; color: #0b2530; line-height: 1.5; } }

    .product-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .card { background: #fff; border-radius: 12px; padding: 20px; border-top: 4px solid #0f766e;
            display: flex; flex-direction: column; gap: 6px; box-shadow: 0 2px 8px rgba(11,37,48,.08); }
    .card:hover { transform: translateY(-4px); transition: transform .2s ease; }

    .kategori { font-size: 13px; color: #0f766e; font-weight: 600; }
    .nama { font-size: 18px; }
    .harga { font-size: 20px; font-weight: 700; }
    .harga-normal { text-decoration: line-through; color: #94a3b8; font-size: 14px; }
    .label-diskon { background: #f97316; color: #fff; font-size: 12px; font-weight: 600;
                    padding: 2px 8px; border-radius: 20px; align-self: flex-start; }
    .stok { font-size: 14px; color: #475569; }
    .status-ada { color: #15803d; font-weight: 600; }
    .status-habis { color: #dc2626; font-weight: 600; }

    .btn { margin-top: auto; padding: 10px; border: none; border-radius: 8px; background: #0f766e;
           color: #fff; font-size: 15px; font-weight: 600; cursor: pointer; }
    .btn:hover { opacity: .85; }
    .btn:disabled { background: #cbd5e1; color: #64748b; cursor: not-allowed; opacity: 1; }
    .container { max-width: 1080px; margin: 0 auto; padding: 0 20px; }

.navbar { background: #0b2530; color: #fff; }
.navbar .container { display: flex; justify-content: space-between; align-items: center; padding-top: 16px; padding-bottom: 16px; }
.logo { font-size: 22px; font-weight: 700; }
.navbar nav { display: flex; gap: 20px; }
.navbar a { color: #cbd5e1; text-decoration: none; }

.hero { background: #0f766e; color: #fff; padding: 64px 0; }
.hero h1 { font-size: 38px; margin-bottom: 10px; }
.hero p { margin-bottom: 22px; max-width: 480px; }
.btn-hero { display: inline-block; background: #fff; color: #0f766e; padding: 12px 22px;
            border-radius: 8px; font-weight: 700; text-decoration: none; }

.info-bar { display: flex; justify-content: space-between; align-items: center; margin: 36px 0 20px; }
.info-bar span { background: #fff; padding: 8px 14px; border-radius: 8px; }

.footer { margin-top: 48px; background: #0b2530; color: #94a3b8; text-align: center; padding: 22px; font-size: 14px; }

@media (max-width: 900px) { .product-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px) {
    .product-grid { grid-template-columns: 1fr; }
    .hero h1 { font-size: 28px; }
}
</style>
</head>
<body>

    <header class="navbar">
        <div class="container">
            <span class="logo">Cia Store</span>
            <nav>
                <a href="#">Home</a>
                <a href="#produk">Produk</a>
                <a href="#tentang">Tentang</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Perangkat teknologi pilihan untuk kebutuhanmu</h1>
            <p>Laptop, smartphone, dan aksesoris terbaik dengan harga bersahabat.</p>
            <a class="btn-hero" href="#produk">Lihat Produk</a>
        </div>
    </section>

    <main class="container" id="produk">
        <div class="info-bar">
            <h2>Katalog Produk</h2>
            <span>Total Produk: <strong><?php echo $total_produk; ?></strong></span>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $item) : ?>

                <?php
                    $dapat_diskon = $item['harga'] >= 1000000;
                    if ($dapat_diskon) {
                        $harga_akhir = hitung_diskon($item['harga'], 10);
                    }
                ?>

                <article class="card">
                    <span class="kategori"><?php echo $item['kategori']; ?></span>
                    <h3 class="nama"><?php echo $item['nama']; ?></h3>

                    <?php if ($dapat_diskon) : ?>
                        <span class="harga-normal"><?php echo rupiah($item['harga']); ?></span>
                        <span class="label-diskon">Diskon 10%</span>
                        <span class="harga"><?php echo rupiah($harga_akhir); ?></span>
                    <?php else : ?>
                        <span class="harga"><?php echo rupiah($item['harga']); ?></span>
                    <?php endif; ?>

                    <?php if ($item['stok'] > 0) : ?>
                        <p class="stok">Stok: <?php echo $item['stok']; ?> - <span class="status-ada">Tersedia</span></p>
                        <button class="btn">Beli Sekarang</button>
                    <?php else : ?>
                        <p class="stok">Stok: 0 - <span class="status-habis">Stok Habis</span></p>
                        <button class="btn" disabled>Stok Habis</button>
                    <?php endif; ?>
                </article>

            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer" id="tentang">
        <p>&copy; 2026 Cia Store - dibuat dengan HTML, CSS, dan PHP Native</p>
    </footer>

</body>
</html>