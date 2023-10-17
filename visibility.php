<?php

class Produk {
    public $judul,
            $penulis,
            $penerbit;


protected $diskon = 0;
        
    private $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit",
        $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }

}

class Novel extends Produk {
    public $jmHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit",
    $harga = 0, $jmHalaman = 0){

        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->jmHalaman = $jmHalaman;
    }
    public function getInfoProduk(){
        $str = "Novel : ". parent::getInfoProduk() ." - {$this->jmHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit",
    $harga = 0, $waktuMain = 0) {
    parent::__construct($judul , $penulis, $penerbit, $harga);

    $this->waktuMain = $waktuMain;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }

    public function getInfoProduk(){
        $str = "Game : ". parent::getInfoProduk() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk {
    public function cetak( Produk $produk ){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 =new Novel("Ada apa dibalik atap rumah ", "boing", "Bukune", 45000, 60,);
$produk2 =new Game("tragedi 35 mei", "katak bhizer", "Scottgames", 350000, 30,);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();