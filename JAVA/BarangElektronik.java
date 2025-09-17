/*
Saya Mochamamd Azka Basria dengan NIM 2405170 mengerjakan Tugas Praktikum 1
dalam mata kuliah DPBO untuk keberkahanNya maka saya
tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin
*/

/**
 * File: BarangElektronik.java
 * Deskripsi: Kelas model (POJO - Plain Old Java Object) untuk merepresentasikan
 * entitas BarangElektronik. Bertindak sebagai blueprint untuk data produk.
 */

public class BarangElektronik {
    // Atribut/member variabel dideklarasikan sebagai 'private'
    // untuk menerapkan prinsip enkapsulasi (data hiding).
    private String kodeProduk;
    private String namaProduk;
    private String merekProduk;
    private int hargaProduk;
    private int stokProduk;
    private String kategoriProduk;

    /**
     * Konstruktor berparameter untuk menginisialisasi objek 'BarangElektronik'
     * dengan state (nilai) awal saat instansiasi.
     *
     * @param kodeProduk     ID unik untuk produk.
     * @param namaProduk     Nama dari produk.
     * @param merekProduk    Merek dari produk.
     * @param hargaProduk    Harga jual produk.
     * @param stokProduk     Jumlah stok yang tersedia.
     * @param kategoriProduk Kategori dari produk.
     */
    public BarangElektronik(String kodeProduk, String namaProduk, String merekProduk, int hargaProduk, int stokProduk,
            String kategoriProduk) {
        // 'this' digunakan untuk merujuk pada atribut milik instance class ini,
        // membedakannya dari parameter yang memiliki nama sama.
        this.kodeProduk = kodeProduk;
        this.namaProduk = namaProduk;
        this.merekProduk = merekProduk;
        this.hargaProduk = hargaProduk;
        this.stokProduk = stokProduk;
        this.kategoriProduk = kategoriProduk;
    }

    // --- Method Accessor (Getter) ---
    // Menyediakan akses baca (read-only) ke atribut privat dari luar kelas.

    /**
     * Mengambil nilai kodeProduk.
     * 
     * @return kodeProduk dalam bentuk String.
     */
    public String getKodeProduk() {
        return this.kodeProduk;
    }

    /**
     * Mengambil nilai namaProduk.
     * 
     * @return namaProduk dalam bentuk String.
     */
    public String getNamaProduk() {
        return this.namaProduk;
    }

    /**
     * Mengambil nilai merekProduk.
     * 
     * @return merekProduk dalam bentuk String.
     */
    public String getMerekProduk() {
        return this.merekProduk;
    }

    /**
     * Mengambil nilai hargaProduk.
     * 
     * @return hargaProduk dalam bentuk integer.
     */
    public int getHargaProduk() {
        return this.hargaProduk;
    }

    /**
     * Mengambil nilai stokProduk.
     * 
     * @return stokProduk dalam bentuk integer.
     */
    public int getStokProduk() {
        return this.stokProduk;
    }

    /**
     * Mengambil nilai kategoriProduk.
     * 
     * @return kategoriProduk dalam bentuk String.
     */
    public String getKategoriProduk() {
        return this.kategoriProduk;
    }

    // --- Method Mutator (Setter) ---
    // Menyediakan akses tulis (write) untuk mengubah nilai atribut privat.

    /**
     * Mengubah nilai namaProduk.
     * 
     * @param namaProduk Nama baru untuk produk.
     */
    public void setNamaProduk(String namaProduk) {
        this.namaProduk = namaProduk;
    }

    /**
     * Mengubah nilai hargaProduk.
     * 
     * @param hargaProduk Harga baru untuk produk.
     */
    public void setHargaProduk(int hargaProduk) {
        this.hargaProduk = hargaProduk;
    }

    /**
     * Mengubah nilai stokProduk.
     * 
     * @param stokProduk Jumlah stok baru untuk produk.
     */
    public void setStokProduk(int stokProduk) {
        this.stokProduk = stokProduk;
    }
}