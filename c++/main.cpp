/*
Saya Mochamamd Azka Basria dengan NIM 2405170 mengerjakan Tugas Praktikum 1
dalam mata kuliah DPBO untuk keberkahanNya maka saya
tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin
*/

/*
 * File: main.cpp
 * Deskripsi: Titik masuk utama (entry point) aplikasi konsol.
 * Menangani logika aplikasi dan interaksi user (UI).
 */
#include <iostream>
#include <string>
#include <list>
using namespace std;

// Source class BarangElektronik.cpp
#include "BarangElektronik.cpp"

int main()
{
    // Wadah data utama menggunakan kontainer `std::list` dari STL.
    list<BarangElektronik> gudang;
    int pilihan; // Variabel untuk menampung input menu dari user.

    gudang.push_back(BarangElektronik("LP-AS01", "Laptop ROG Zephyrus G14", "ASUS", 25999000, 15, "Laptop Gaming"));
    gudang.push_back(BarangElektronik("KB-LG01", "Mechanical Keyboard G Pro X", "Logitech", 1850000, 45, "Aksesoris Komputer"));
    gudang.push_back(BarangElektronik("MN-SM01", "Monitor Odyssey G7 27\"", "Samsung", 8500000, 22, "Monitor"));
    gudang.push_back(BarangElektronik("MS-RZ01", "Mouse Gaming Viper Ultimate", "Razer", 1500000, 78, "Aksesoris Komputer"));

    // Loop aplikasi utama. Terus berjalan sampai user memilih keluar.
    do
    {
        // Merender tampilan menu ke standard output.
        cout << "\n+------------------------------------+" << endl;
        cout << "|        MENU TOKO ELEKTRONIK        |" << endl;
        cout << "+------------------------------------+" << endl;
        cout << "| 1. Tambah Produk                   |" << endl;
        cout << "| 2. Tampilkan Semua Produk          |" << endl;
        cout << "| 3. Ubah Produk                     |" << endl;
        cout << "| 4. Hapus Produk                    |" << endl;
        cout << "| 5. Cari Produk                     |" << endl;
        cout << "| 0. Keluar                          |" << endl;
        cout << "+------------------------------------+" << endl;
        cout << "Silahkan Pilih: ";
        cin >> pilihan;

        // Struktur kontrol untuk menangani pilihan menu user.
        switch (pilihan)
        {
        case 1: // Handle operasi 'tambah'
        {
            // Blok ini menciptakan scope lokal untuk variabel temporary.
            string kode_tmp, nama_tmp, merek_tmp, kat_tmp;
            int harga_tmp, stok_tmp;

            cout << "\n-->> Masukkan Data Produk Baru <<--" << endl;
            cout << "Kode Produk : ";
            cin >> kode_tmp;
            cout << "Nama Produk : ";
            // Membersihkan buffer input untuk menangani pemanggilan cin dan getline
            // yang tercampur. Mengonsumsi karakter newline (\n) sisa.
            cin.ignore();
            getline(cin, nama_tmp);
            cout << "Merek       : ";
            getline(cin, merek_tmp);
            cout << "Harga       : ";
            cin >> harga_tmp;
            cout << "Stok        : ";
            cin >> stok_tmp;
            cout << "Kategori    : ";
            cin >> kat_tmp;

            // Membuat instance objek baru dan menambahkannya ke akhir list.
            gudang.push_back(BarangElektronik(kode_tmp, nama_tmp, merek_tmp, harga_tmp, stok_tmp, kat_tmp));
            cout << "\nProduk berhasil ditambahkan!" << endl;
            break;
        }
        case 2: // Handle operasi 'baca semua'
        {
            cout << "\n-->> Menampilkan Semua Data Produk <<--" << endl;
            // Mengecek apakah kontainer kosong.
            if (gudang.empty())
            {
                cout << "Data masih kosong." << endl;
            }
            else
            {
                // Loop for-each untuk iterasi.
                // '&' berarti 'produk' adalah referensi, menghindari penyalinan objek.
                for (auto &produk : gudang)
                {
                    // Memanggil accessor untuk mencetak state objek.
                    cout << "--------------------------" << endl;
                    cout << "Kode      : " << produk.getKodeProduk() << endl;
                    cout << "Nama      : " << produk.getNamaProduk() << endl;
                    cout << "Merek     : " << produk.getMerekProduk() << endl;
                    cout << "Harga     : Rp" << produk.getHargaProduk() << endl;
                    cout << "Stok      : " << produk.getStokProduk() << " unit" << endl;
                    cout << "Kategori  : " << produk.getKategoriProduk() << endl;
                }
                cout << "--------------------------" << endl;
            }
            break;
        }
        case 3: // Handle operasi 'ubah'
        {
            cout << "\n-->> Mengubah Data Produk <<--" << endl;
            if (gudang.empty())
            {
                cout << "Data masih kosong. Tidak ada yang bisa diubah." << endl;
            }
            else
            {
                string kode_cari;
                cout << "Masukkan KODE produk yang akan diubah: ";
                cin >> kode_cari;

                bool ditemukan = false; // Variabel flag untuk melacak hasil pencarian.
                // Loop berbasis iterator untuk pencarian dan modifikasi.
                for (auto it = gudang.begin(); it != gudang.end(); ++it)
                {
                    // Operator panah (->) untuk akses member via iterator.
                    if (it->getKodeProduk() == kode_cari)
                    {
                        string nama_tmp;
                        int harga_tmp, stok_tmp;

                        cout << "-->> Masukkan data produk yang baru:" << endl;
                        cout << "Nama Produk : ";
                        cin.ignore();
                        getline(cin, nama_tmp);
                        cout << "Harga       : ";
                        cin >> harga_tmp;
                        cout << "Stok        : ";
                        cin >> stok_tmp;

                        // Memanggil mutator untuk mengubah state objek.
                        it->setNamaProduk(nama_tmp);
                        it->setHargaProduk(harga_tmp);
                        it->setStokProduk(stok_tmp);
                        cout << "\nProduk berhasil diubah." << endl;
                        ditemukan = true;
                        break; // Keluar dari loop untuk efisiensi.
                    }
                }
                if (!ditemukan)
                {
                    cout << "Produk dengan KODE '" << kode_cari << "' tidak ditemukan." << endl;
                }
            }
            break;
        }
        case 4: // Handle operasi 'hapus'
        {
            cout << "\n-->> Menghapus Data Produk <<--" << endl;
            if (gudang.empty())
            {
                cout << "Data masih kosong. Tidak ada yang bisa dihapus." << endl;
            }
            else
            {
                string kode_cari;
                cout << "Masukkan KODE produk yang akan dihapus: ";
                cin >> kode_cari;

                bool ditemukan = false;
                for (auto it = gudang.begin(); it != gudang.end(); ++it)
                {
                    if (it->getKodeProduk() == kode_cari)
                    {
                        // Menghapus elemen pada posisi iterator saat ini.
                        // Peringatan: Operasi ini membuat iterator 'it' tidak valid.
                        gudang.erase(it);
                        cout << "\nProduk berhasil dihapus." << endl;
                        ditemukan = true;
                        // Break di sini penting untuk mencegah penggunaan iterator yang tidak valid.
                        break;
                    }
                }
                if (!ditemukan)
                {
                    cout << "Produk dengan KODE '" << kode_cari << "' tidak ditemukan." << endl;
                }
            }
            break;
        }
        case 5: // Handle operasi 'cari'
        {
            cout << "\n-->> Mencari Data Produk <<--" << endl;
            if (gudang.empty())
            {
                cout << "Data masih kosong. Tidak ada yang bisa dicari." << endl;
            }
            else
            {
                string kode_cari;
                cout << "Masukkan KODE produk yang akan dicari: ";
                cin >> kode_cari;

                bool ditemukan = false;
                for (auto &produk : gudang)
                {
                    if (produk.getKodeProduk() == kode_cari)
                    {
                        cout << "\nProduk ditemukan!" << endl;
                        cout << "--------------------------" << endl;
                        cout << "Kode      : " << produk.getKodeProduk() << endl;
                        cout << "Nama      : " << produk.getNamaProduk() << endl;
                        cout << "Merek     : " << produk.getMerekProduk() << endl;
                        cout << "Harga     : Rp" << produk.getHargaProduk() << endl;
                        cout << "Stok      : " << produk.getStokProduk() << " unit" << endl;
                        cout << "Kategori  : " << produk.getKategoriProduk() << endl;
                        cout << "--------------------------" << endl;
                        ditemukan = true;
                        break;
                    }
                }
                if (!ditemukan)
                {
                    cout << "Produk dengan KODE '" << kode_cari << "' tidak ditemukan." << endl;
                }
            }
            break;
        }
        case 0: // Handle 'keluar'
            cout << "\nSip gacor program beres." << endl;
            break;
        default: // Handle input tidak valid
            cout << "\ninputan tidak valid. Coba lagi." << endl;
            break;
        }
    } while (pilihan != 0); // Kondisi loop.

    return 0; // Keluar dengan exit code 0 (sukses).
}