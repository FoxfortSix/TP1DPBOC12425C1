/*
Saya Mochamamd Azka Basria dengan NIM 2405170 mengerjakan Tugas Praktikum 1
dalam mata kuliah DPBO untuk keberkahanNya maka saya
tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin
*/

#include <iostream>
#include <string>
#include <list>

using namespace std;

/*
 * File: BarangElektronik.cpp
 * Deskripsi: Definisi class untuk model data BarangElektronik.
 * Merepresentasikan satu entitas produk.
 */
#include <iostream>
#include <string>
#include <list>
using namespace std;

// Deklarasi Class
class BarangElektronik
{
    // Atribut/member variabel privat untuk menerapkan enkapsulasi.
private:
    string kodeProduk;
    string namaProduk;
    string merekProduk;
    int hargaProduk;
    int stokProduk;
    string kategoriProduk;

    // Antarmuka (interface) publik dari class.
public:
    // Konstruktor Default: Menginisialisasi state awal objek.
    BarangElektronik()
    {
        this->kodeProduk = "";
        this->namaProduk = "";
        this->merekProduk = "";
        this->hargaProduk = 0;
        this->stokProduk = 0;
        this->kategoriProduk = "";
    }

    // Konstruktor Berparameter: Untuk instansiasi objek dengan nilai awal.
    // Pointer 'this->' dipakai untuk membedakan atribut class dgn parameter.
    BarangElektronik(string kodeProduk, string namaProduk, string merekProduk, int hargaProduk, int stokProduk, string kategoriProduk)
    {
        this->kodeProduk = kodeProduk;
        this->namaProduk = namaProduk;
        this->merekProduk = merekProduk;
        this->hargaProduk = hargaProduk;
        this->stokProduk = stokProduk;
        this->kategoriProduk = kategoriProduk;
    }

    // --- Method Mutator (Setter) ---
    // Fungsinya untuk mengubah state/nilai dari atribut privat.
    void setKodeProduk(string kodeProduk)
    {
        this->kodeProduk = kodeProduk;
    }
    void setNamaProduk(string namaProduk)
    {
        this->namaProduk = namaProduk;
    }
    void setMerekProduk(string merekProduk)
    {
        this->merekProduk = merekProduk;
    }
    void setHargaProduk(int hargaProduk)
    {
        this->hargaProduk = hargaProduk;
    }
    void setStokProduk(int stokProduk)
    {
        this->stokProduk = stokProduk;
    }
    void setKategoriProduk(string kategoriProduk)
    {
        this->kategoriProduk = kategoriProduk;
    }

    // --- Method Accessor (Getter) ---
    // Fungsinya untuk membaca/mengakses nilai atribut privat.
    string getKodeProduk()
    {
        return this->kodeProduk;
    }
    string getNamaProduk()
    {
        return this->namaProduk;
    }
    string getMerekProduk()
    {
        return this->merekProduk;
    }
    int getHargaProduk()
    {
        return this->hargaProduk;
    }
    int getStokProduk()
    {
        return this->stokProduk;
    }
    string getKategoriProduk()
    {
        return this->kategoriProduk;
    }

    // Destruktor
    // Dibiarkan kosong karena tidak ada alokasi memori dinamis.
    ~BarangElektronik() {}
};