"""

Saya Mochamamd Azka Basria dengan NIM 2405170 mengerjakan Tugas Praktikum 1
dalam mata kuliah DPBO untuk keberkahanNya maka saya
tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

"""


class BarangElektronik:
    # Constructor (__init__) dijalankan saat objek baru dibuat
    def __init__(
        self,
        kodeProduk,
        namaProduk,
        merekProduk,
        hargaProduk,
        stokProduk,
        kategoriProduk,
    ):
        # Atribut private (dengan prefix __)
        self.__kodeProduk = kodeProduk
        self.__namaProduk = namaProduk
        self.__merekProduk = merekProduk
        self.__hargaProduk = hargaProduk
        self.__stokProduk = stokProduk
        self.__kategoriProduk = kategoriProduk

    # --- Getters (untuk mendapatkan nilai atribut) ---
    def get_kode_produk(self):
        return self.__kodeProduk

    def get_nama_produk(self):
        return self.__namaProduk

    def get_merek_produk(self):
        return self.__merekProduk

    def get_harga_produk(self):
        return self.__hargaProduk

    def get_stok_produk(self):
        return self.__stokProduk

    def get_kategori_produk(self):
        return self.__kategoriProduk

    # --- Setters (untuk mengubah nilai atribut) ---
    def set_nama_produk(self, nama):
        self.__namaProduk = nama

    def set_harga_produk(self, harga):
        self.__hargaProduk = harga

    def set_stok_produk(self, stok):
        self.__stokProduk = stok
