1. CREATE DATABASE: Membuat basis data baru untuk perpustakaan kita.
``` sql
CREATE DATABASE PerpustakaanKu;
```

Setelah database dibuat, kita akan menggunakannya.

``` sql
USE PerpustakaanKu;
```
2. CREATE TABLE: Membuat tabel 'Buku' untuk menyimpan informasi buku.
ID_Buku (nomor unik buku), Judul (nama buku), Penulis, Tahun_Terbit, Stok (jumlah buku yang tersedia)

```sql
CREATE TABLE Buku (
    ID_Buku INT PRIMARY KEY, -- ID_Buku adalah kunci utama dan harus unik
    Judul VARCHAR(255) NOT NULL, -- Judul buku, tidak boleh kosong
    Penulis VARCHAR(100),
    Tahun_Terbit INT,
    Stok INT DEFAULT 0 Stok defaultnya 0 jika tidak ditentukan
);
```
3. CREATE TABLE: Membuat tabel 'Peminjaman' untuk mencatat siapa pinjam buku apa.
ID_Peminjaman (nomor unik peminjaman), ID_Buku (merujuk ke tabel Buku), Nama_Peminjam, Tanggal_Pinjam, Tanggal_Kembali (bisa kosong jika belum dikembalikan)

```sql
CREATE TABLE Peminjaman (
    ID_Peminjaman INT PRIMARY KEY,
    ID_Buku INT,
    Nama_Peminjam VARCHAR(100) NOT NULL,
    Tanggal_Pinjam DATE NOT NULL,
    Tanggal_Kembali DATE,
    FOREIGN KEY (ID_Buku) REFERENCES Buku(ID_Buku) -- ID_Buku di sini harus ada di tabel Buku
);
```
4. ALTER TABLE: Menambahkan kolom baru ke tabel 'Buku', misalnya ISBN.

```sql
ALTER TABLE Buku
ADD COLUMN ISBN VARCHAR(20) UNIQUE; ISBN harus unik
```


5. TRUNCATE TABLE: Mengosongkan semua data di tabel 'Peminjaman', tapi strukturnya tetap ada.
HATI-HATI! Ini menghapus semua data permanen.

```sql
TRUNCATE TABLE Peminjaman;
```
6. DROP TABLE: Menghapus seluruh tabel 'Peminjaman' beserta semua datanya.
HATI-HATI! Ini menghapus tabel dan datanya secara permanen.

```sql
DROP TABLE Peminjaman;
```

INSERT INTO: Menambahkan beberapa data buku baru. 
``` sql
INSERT INTO Buku (ID_Buku, Judul, Penulis, Tahun_Terbit, Stok, ISBN) VALUES 
(101, 'Laskar Pelangi', 'Andrea Hirata', 2005, 5, '978-9793062791’), 
(102, 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980, 3, '978-9799731220’), 
(103, 'Filosofi Kopi', 'Dee Lestari', 2006, 7, '978-9799632832');

SELECT * FROM Buku;
SELECT Judul, Penulis, Stok FROM Buku WHERE Stok < 5;

UPDATE Buku SET Stok = Stok - 1 WHERE ID_Buku = 101;  Stok Laskar Pelangi jadi 4 
UPDATE Peminjaman SET Tanggal_Kembali = '2025-06-24' WHERE ID_Peminjaman = 1; 

```