<?php

class BarangElektronik
{
    private $kodeProduk;
    private $namaProduk;
    private $merekProduk;
    private $hargaProduk;
    private $stokProduk;
    private $kategoriProduk;
    private $gambar;

    public function __construct($kode, $nama, $merek, $harga, $stok, $kategori, $gambar)
    {
        $this->kodeProduk = $kode;
        $this->namaProduk = $nama;
        $this->merekProduk = $merek;
        $this->hargaProduk = $harga;
        $this->stokProduk = $stok;
        $this->kategoriProduk = $kategori;
        $this->gambar = $gambar;
    }

    public function getKodeProduk()
    {
        return $this->kodeProduk;
    }
    public function getNamaProduk()
    {
        return $this->namaProduk;
    }
    public function getMerekProduk()
    {
        return $this->merekProduk;
    }
    public function getHargaProduk()
    {
        return $this->hargaProduk;
    }
    public function getStokProduk()
    {
        return $this->stokProduk;
    }
    public function getKategoriProduk()
    {
        return $this->kategoriProduk;
    }
    public function getGambar()
    {
        return $this->gambar;
    }
    
    public function setNamaProduk($nama)
    {
        $this->namaProduk = $nama;
    }
    public function setHargaProduk($harga)
    {
        $this->hargaProduk = $harga;
    }
    public function setStokProduk($stok)
    {
        $this->stokProduk = $stok;
    }
}