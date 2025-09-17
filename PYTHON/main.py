"""

Saya Mochamamd Azka Basria dengan NIM 2405170 mengerjakan Tugas Praktikum 1
dalam mata kuliah DPBO untuk keberkahanNya maka saya
tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

"""

from BarangElektronik import BarangElektronik


def main():
    gudang = []
    pilihan = -1

    gudang.append(
        BarangElektronik(
            "LP-AS01", "Laptop ROG Zephyrus G14", "ASUS", 25999000, 15, "Laptop Gaming"
        )
    )
    gudang.append(
        BarangElektronik(
            "KB-LG01",
            "Mechanical Keyboard G Pro X",
            "Logitech",
            1850000,
            45,
            "Aksesoris Komputer",
        )
    )
    gudang.append(
        BarangElektronik(
            "MN-SM01", 'Monitor Odyssey G7 27"', "Samsung", 8500000, 22, "Monitor"
        )
    )
    gudang.append(
        BarangElektronik(
            "MS-RZ01",
            "Mouse Gaming Viper Ultimate",
            "Razer",
            1500000,
            78,
            "Aksesoris Komputer",
        )
    )

    while pilihan != 0:
        print("\n+------------------------------------+")
        print("|        MENU TOKO ELEKTRONIK        |")
        print("+------------------------------------+")
        print("| 1. Tambah Produk                   |")
        print("| 2. Tampilkan Semua Produk          |")
        print("| 3. Ubah Produk                     |")
        print("| 4. Hapus Produk                    |")
        print("| 5. Cari Produk                     |")
        print("| 0. Keluar                          |")
        print("+------------------------------------+")

        try:
            pilihan = int(input("Silahkan Pilih: "))
        except ValueError:
            print("\nInputan tidak valid. Harap masukkan angka.")
            continue

        if pilihan == 1:
            # CREATE: Menambah produk baru
            print("\n-->> Masukkan Data Produk Baru <<--")
            kode_tmp = input("Kode Produk : ")
            nama_tmp = input("Nama Produk : ")
            merek_tmp = input("Merek       : ")
            harga_tmp = int(input("Harga       : "))
            stok_tmp = int(input("Stok        : "))
            kat_tmp = input("Kategori    : ")

            produk_baru = BarangElektronik(
                kode_tmp, nama_tmp, merek_tmp, harga_tmp, stok_tmp, kat_tmp
            )
            gudang.append(produk_baru)
            print("\nProduk berhasil ditambahkan!")

        elif pilihan == 2:
            # READ: Menampilkan semua produk
            print("\n-->> Menampilkan Semua Data Produk <<--")
            if not gudang:
                print("Data masih kosong.")
            else:
                for produk in gudang:
                    print("--------------------------")
                    print(f"Kode      : {produk.get_kode_produk()}")
                    print(f"Nama      : {produk.get_nama_produk()}")
                    print(f"Merek     : {produk.get_merek_produk()}")
                    print(f"Harga     : Rp{produk.get_harga_produk()}")
                    print(f"Stok      : {produk.get_stok_produk()} unit")
                    print(f"Kategori  : {produk.get_kategori_produk()}")
                print("--------------------------")

        elif pilihan == 3:
            # UPDATE: Mengubah data produk
            print("\n-->> Mengubah Data Produk <<--")
            if not gudang:
                print("Data masih kosong. Tidak ada yang bisa diubah.")
            else:
                kode_cari = input("Masukkan KODE produk yang akan diubah: ")
                ditemukan = False
                for produk in gudang:
                    if produk.get_kode_produk() == kode_cari:
                        print("-->> Masukkan data produk yang baru:")
                        nama_tmp = input("Nama Produk : ")
                        harga_tmp = int(input("Harga       : "))
                        stok_tmp = int(input("Stok        : "))

                        produk.set_nama_produk(nama_tmp)
                        produk.set_harga_produk(harga_tmp)
                        produk.set_stok_produk(stok_tmp)

                        print("\nProduk berhasil diubah.")
                        ditemukan = True
                        break
                if not ditemukan:
                    print(f"Produk dengan KODE '{kode_cari}' tidak ditemukan.")

        elif pilihan == 4:
            # DELETE: Menghapus produk
            print("\n-->> Menghapus Data Produk <<--")
            if not gudang:
                print("Data masih kosong. Tidak ada yang bisa dihapus.")
            else:
                kode_cari = input("Masukkan KODE produk yang akan dihapus: ")
                produk_ditemukan = None
                for produk in gudang:
                    if produk.get_kode_produk() == kode_cari:
                        produk_ditemukan = produk
                        break

                if produk_ditemukan:
                    gudang.remove(produk_ditemukan)
                    print("\nProduk berhasil dihapus.")
                else:
                    print(f"Produk dengan KODE '{kode_cari}' tidak ditemukan.")

        elif pilihan == 5:
            # FIND: Mencari produk
            print("\n-->> Mencari Data Produk <<--")
            if not gudang:
                print("Data masih kosong. Tidak ada yang bisa dicari.")
            else:
                kode_cari = input("Masukkan KODE produk yang akan dicari: ")
                ditemukan = False
                for produk in gudang:
                    if produk.get_kode_produk() == kode_cari:
                        print("\nProduk ditemukan!")
                        print("--------------------------")
                        print(f"Kode      : {produk.get_kode_produk()}")
                        print(f"Nama      : {produk.get_nama_produk()}")
                        print(f"Merek     : {produk.get_merek_produk()}")
                        print(f"Harga     : Rp{produk.get_harga_produk()}")
                        print(f"Stok      : {produk.get_stok_produk()} unit")
                        print(f"Kategori  : {produk.get_kategori_produk()}")
                        print("--------------------------")
                        ditemukan = True
                        break
                if not ditemukan:
                    print(f"Produk dengan KODE '{kode_cari}' tidak ditemukan.")

        elif pilihan == 0:
            print("\nSip gacor program beres.")

        else:
            print("\ninputan tidak valid. Coba lagi.")


if __name__ == "__main__":
    main()
