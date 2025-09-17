/*
Saya Mochamamd Azka Basria dengan NIM 2405170 mengerjakan Tugas Praktikum 1
dalam mata kuliah DPBO untuk keberkahanNya maka saya
tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin
*/

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

// Deklarasi class utama. Nama file harus sama dengan nama class publik.
public class Main {
    // Metode main: titik di mana eksekusi program dimulai.
    public static void main(String[] args) {

        // Wadah data utama menggunakan ArrayList dari Java Collections Framework.
        // Berfungsi sebagai array dinamis untuk menyimpan objek BarangElektronik.
        List<BarangElektronik> gudang = new ArrayList<>();

        // Membuat instance dari Scanner untuk menangani input dari konsol.
        Scanner scanner = new Scanner(System.in);
        int pilihan = -1; // Variabel untuk menampung pilihan menu user.

        gudang.add(new BarangElektronik("LP-AS01", "Laptop ROG Zephyrus G14", "ASUS", 25999000, 15, "Laptop Gaming"));
        gudang.add(new BarangElektronik("KB-LG01", "Mechanical Keyboard G Pro X", "Logitech", 1850000, 45,
                "Aksesoris Komputer"));
        gudang.add(new BarangElektronik("MN-SM01", "Monitor Odyssey G7 27\"", "Samsung", 8500000, 22, "Monitor"));
        gudang.add(new BarangElektronik("MS-RZ01", "Mouse Gaming Viper Ultimate", "Razer", 1500000, 78,
                "Aksesoris Komputer"));

        // Loop aplikasi utama. Terus berjalan sampai user memilih keluar (0).
        do {
            // Merender tampilan menu ke standard output.
            System.out.println("\n+------------------------------------+");
            System.out.println("|        MENU TOKO ELEKTRONIK        |");
            System.out.println("+------------------------------------+");
            System.out.println("| 1. Tambah Produk                   |");
            System.out.println("| 2. Tampilkan Semua Produk          |");
            System.out.println("| 3. Ubah Produk                     |");
            System.out.println("| 4. Hapus Produk                    |");
            System.out.println("| 5. Cari Produk                     |");
            System.out.println("| 0. Keluar                          |");
            System.out.println("+------------------------------------+");
            System.out.print("Silahkan Pilih: ");

            pilihan = scanner.nextInt(); // Membaca input integer dari user.
            scanner.nextLine(); // Membersihkan buffer input untuk mengonsumsi sisa newline.

            // Struktur kontrol untuk menangani pilihan menu user.
            switch (pilihan) {
                case 1: { // Handle operasi 'tambah'
                    System.out.println("\n-->> Masukkan Data Produk Baru <<--");
                    System.out.print("Kode Produk : ");
                    String kode_tmp = scanner.nextLine();
                    System.out.print("Nama Produk : ");
                    String nama_tmp = scanner.nextLine();
                    System.out.print("Merek       : ");
                    String merek_tmp = scanner.nextLine();
                    System.out.print("Harga       : ");
                    int harga_tmp = scanner.nextInt();
                    System.out.print("Stok        : ");
                    int stok_tmp = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Kategori    : ");
                    String kat_tmp = scanner.nextLine();

                    // Instansiasi objek baru dan menambahkannya ke dalam List.
                    gudang.add(new BarangElektronik(kode_tmp, nama_tmp, merek_tmp, harga_tmp, stok_tmp, kat_tmp));
                    System.out.println("\nProduk berhasil ditambahkan!");
                    break;
                }
                case 2: { // Handle operasi 'baca semua'
                    System.out.println("\n-->> Menampilkan Semua Data Produk <<--");
                    // Mengecek apakah container kosong.
                    if (gudang.isEmpty()) {
                        System.out.println("Data masih kosong.");
                    } else {
                        // Loop for-each untuk iterasi melalui setiap objek dalam List.
                        for (BarangElektronik produk : gudang) {
                            // Memanggil accessor untuk mencetak state (data) dari objek.
                            System.out.println("--------------------------");
                            System.out.println("Kode      : " + produk.getKodeProduk());
                            System.out.println("Nama      : " + produk.getNamaProduk());
                            System.out.println("Merek     : " + produk.getMerekProduk());
                            System.out.println("Harga     : Rp" + produk.getHargaProduk());
                            System.out.println("Stok      : " + produk.getStokProduk() + " unit");
                            System.out.println("Kategori  : " + produk.getKategoriProduk());
                        }
                        System.out.println("--------------------------");
                    }
                    break;
                }
                case 3: { // Handle operasi 'ubah'
                    if (gudang.isEmpty()) {
                        System.out.println("Data masih kosong. Tidak ada yang bisa diubah.");
                    } else {
                        System.out.print("Masukkan KODE produk yang akan diubah: ");
                        String kode_cari = scanner.nextLine();

                        boolean ditemukan = false; // Variabel flag untuk melacak hasil pencarian.
                        for (BarangElektronik produk : gudang) {
                            // Perbandingan string di Java menggunakan method .equals().
                            if (produk.getKodeProduk().equals(kode_cari)) {
                                System.out.println("-->> Masukkan data produk yang baru:");
                                System.out.print("Nama Produk : ");
                                String nama_tmp = scanner.nextLine();
                                System.out.print("Harga       : ");
                                int harga_tmp = scanner.nextInt();
                                System.out.print("Stok        : ");
                                int stok_tmp = scanner.nextInt();
                                scanner.nextLine();

                                // Memanggil mutator untuk mengubah state objek.
                                produk.setNamaProduk(nama_tmp);
                                produk.setHargaProduk(harga_tmp);
                                produk.setStokProduk(stok_tmp);

                                System.out.println("\nProduk berhasil diubah.");
                                ditemukan = true;
                                break; // Keluar dari loop untuk efisiensi.
                            }
                        }
                        if (!ditemukan) {
                            System.out.println("Produk dengan KODE '" + kode_cari + "' tidak ditemukan.");
                        }
                    }
                    break;
                }
                case 4: { // Handle operasi 'hapus'
                    System.out.println("\n-->> Menghapus Data Produk <<--");
                    if (gudang.isEmpty()) {
                        System.out.println("Data masih kosong. Tidak ada yang bisa dihapus.");
                    } else {
                        System.out.print("Masukkan KODE produk yang akan dihapus: ");
                        String kode_cari = scanner.nextLine();
                        BarangElektronik produkUntukDihapus = null;

                        // Cari objek yang akan dihapus terlebih dahulu.
                        for (BarangElektronik produk : gudang) {
                            if (produk.getKodeProduk().equals(kode_cari)) {
                                produkUntukDihapus = produk;
                                break;
                            }
                        }

                        // Hapus objek dari list setelah loop selesai untuk menghindari error.
                        if (produkUntukDihapus != null) {
                            gudang.remove(produkUntukDihapus);
                            System.out.println("\nProduk berhasil dihapus.");
                        } else {
                            System.out.println("Produk dengan KODE '" + kode_cari + "' tidak ditemukan.");
                        }
                    }
                    break;
                }
                case 5: { // Handle operasi 'cari'
                    System.out.println("\n-->> Mencari Data Produk <<--");
                    if (gudang.isEmpty()) {
                        System.out.println("Data masih kosong. Tidak ada yang bisa dicari.");
                    } else {
                        System.out.print("Masukkan KODE produk yang akan dicari: ");
                        String kode_cari = scanner.nextLine();
                        boolean ditemukan = false;
                        for (BarangElektronik produk : gudang) {
                            if (produk.getKodeProduk().equals(kode_cari)) {
                                System.out.println("\nProduk ditemukan!");
                                System.out.println("--------------------------");
                                System.out.println("Kode      : " + produk.getKodeProduk());
                                System.out.println("Nama      : " + produk.getNamaProduk());
                                System.out.println("Merek     : " + produk.getMerekProduk());
                                System.out.println("Harga     : Rp." + produk.getHargaProduk());
                                System.out.println("Stok      : " + produk.getStokProduk());
                                System.out.println("Kategori  : " + produk.getKategoriProduk());
                                System.out.println("--------------------------");
                                ditemukan = true;
                                break;
                            }
                        }
                        if (!ditemukan) {
                            System.out.println("Produk dengan KODE '" + kode_cari + "' tidak ditemukan.");
                        }
                    }
                    break;
                }
                case 0: // Handle 'keluar'
                    System.out.println("\nSip gacor program beres.");
                    break;
                default: // Handle input tidak valid
                    System.out.println("\ninputan tidak valid. Coba lagi.");
                    break;
            }
        } while (pilihan != 0); // Kondisi loop.

        scanner.close(); // Menutup resource Scanner untuk mencegah memory leak.
    }
}