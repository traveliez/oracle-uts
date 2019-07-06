# CRUD-Restful-Oracle

## =========== Tutorial Crud di Laravel ===========

### Versi PHP = 7.3.2

### Laravel = 5.8

### Oracle = 11.g

#### Database  

- Buat Tabel dengan judul Q_PRODUCT. Berikut adalah format tabelnya :  

![gambar oo](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/db.png)
  
1) ProductID (Number 7, 0) (PK)  
2) ProductName (Varchar 25)  
3) Category (Varchar 15)  
4) Buyprice (Number 10, 2)  
5) SellPrice (Number 10, 2)  
6) Description (Varchar 250)

#### 2. Kamu perlu merubah IP TNS dan HOST sesuai dengan IP oracle kamu *config/oracle*

EX:

```php
'tns'            => env('DB_TNS', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.43.75)(PORT=1521)) .  

'port'           => env('DB_PORT', '1521'),  

* Full Setting untuk Koneksi ke DB config/oracle  
  
<?php  
  
return [  https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/tambah2.png
'oracle' => [  
    'driver'         => 'oracle',
    'tns'            => env('DB_TNS', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.43.75)(PORT=1521)) (CONNECT_DATA=(SERVICE_NAME=orcl)))'),  
    'host'           => env('DB_HOST', '192.168.43.75'),  
    'port'           => env('DB_PORT', '1521'),  
    'database'       => env('DB_DATABASE', ''),  
    'username'       => env('DB_USERNAME', 'system'),  
    'password'       => env('DB_PASSWORD', 'oracle'),  
    'charset'        => env('DB_CHARSET', 'AL32UTF8'),  
    'prefix'         => env('DB_PREFIX', ''),  
    'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),  
    'edition'        => env('DB_EDITION', 'ora$base'),  
    'server_version' => env('DB_SERVER_VERSION', '11g'),  
    ],  
];
```
  
#### 3. Berikut ini adalah untuk melihat Service Name dan Port Number  

```code
[oracle@localhost ~]$ echo %TNS_ADMIN%  
%TNE_ADMIN%  
[oracle@localhost ~]$ netmgr
```
  
#### 4. Kita perlu mensetting pada Providers/product

```php
<?php  
  
namespace App;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;
  
class Product extends Eloquent {  
  
public $table = 'obe.q_product';  
  
   protected $primaryKey = 'productid';  
  
   public $guarded = [];  

   public $timestamps = false;  
  
   // define binary/blob fields  
    public $binaries = ['productimage'];  
  
    // define the sequence name used for incrementing
    // default value would be {table}_{primaryKey}_seq if not set
    public $sequence = 'OBE.Q_PRODUCT_SEQ';

}
```

Pada bagian “$table” kamu memasukkan Sequence dari table kamu, perlu menambahkan “obe” sebelum table.

Pada bagian “$PrimaryKey” kamu memasukkan primary key  table kamu.

#### 5. Seting RestFull pada Oracle

![gambar RestFull](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/Screenshot%20at%202019-07-06%2016-30-34.png)

#### 6.DELETE

Contoh pembuatan RESTFUL DELETE
Isi yang penting yang di tandai dengan * (bintang merah)
Contohnya :

- Nama : del_product
- Pagination Size :25
- URI Template : del_product/{id}

dan jangan lupa untuk memilih method DELETE beserta Query nya

kemudian kalian tekan tombol Create

Pada tampilan Resource Handler :
Requires secure access diubah menjadi (NO)
kemudian kalian tekan tombol Apply Change

![gambar DELETE](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/Screenshot%20at%202019-07-06%2016-31-39.png)
Query:

begin
delete from q_product where productid=:id
end;

#### 7. Setting Get Product

Contoh pembuatan RESTFUL GET
Isi yang penting yang di tandai dengan * (bintang merah)
Contohnya :

- Nama : get_product
- Pagination Size :25
- URI Template : get_product

dan jangan lupa untuk memilih method GET serta Query nya

kemudian kalian tekan tombol Create

Pada tampilan Resource Handler :
Requires secure access diubah menjadi (NO)
kemudian kalian tekan tombol Apply Change

![gambar Get Product](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/get.png)

### Query

```sql
select * from q_product;
```

#### 8. Setting Post Product

Contoh pembuatan RESTFUL POST
Isi yang penting yang di tandai dengan * (bintang merah)
Contohnya :

- Nama : post_product
- Pagination Size :25
- URI Template : post_product

dan jangan lupa untuk memilih method POST serta Query nya

kemudian kalian tekan tombol Create

Pada tampilan Resource Handler :
Requires secure access diubah menjadi (NO)
kemudian kalian tekan tombol Apply Change

![gambar POST Product](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/POST.png)

### Query POST

```sql
begin
insert into q_product (productid, buyprice, sellprice, description)
values
(:productid, :productname, :category, :buyprice, :sellprice, :description)
end;
```

#### 9. put product

Contoh pembuatan RESTFUL PUT
Isi yang penting yang di tandai dengan * (bintang merah)
Contohnya :

- Nama : put_product
- Pagination Size :25
- URI Template : put_product

dan jangan lupa untuk memilih method put serta Query nya

kemudian kalian tekan tombol Create

Pada tampilan Resource Handler :
Requires secure access diubah menjadi (NO)
kemudian kalian tekan tombol Apply Change

![gambar Put product](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/Screenshot%20at%202019-07-06%2016-44-14.png)

### Query PUT

```sql
begin
update q_product set :productname, :category, :buyprice, :sellprice,  :description where productid= :id
end;
```

#### 10. Source Code Produk CRUD

### #Note

1. Semua Query udah ada di Controllers/Auth/AjaxController

```php
//Insert Into
    public function store(Request $request)
    {
        $product = new Product;
        $product->productname = $request->productname;
        $product->category = $request->category;
        $product->buyprice = $request->buyprice;
        $product->sellprice = $request->sellprice;
        $product->description = $request->description;
        $product->save();
        return response()->json($product);
    }

//Update
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->productname = $request->productname;
        $product->category = $request->category;
        $product->buyprice = $request->buyprice;
        $product->sellprice = $request->sellprice;
        $product->description = $request->description;
        $product->save();

        return response()->json($product);
    }

//Tampil
    public function index()
    {
        $products = Product::orderBy('productid','asc')->paginate(8);

        return view('ajax-crud', compact('products'));
    }

   //Delete
    public function destroy($id)
    {
        $product = Product::where('productid',$id)->delete();
        return response()->json($product);
    }
}
```

#### 11. Tampilan Web

- ini adalah contoh tampilan dari get product :
![gambar GET](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/home.png)

- ini adalah tampilan dari post product :
Tambah produk
![gambar POST](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/tambah1.png)

Hasil penambahan produk
![gambar POST](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/tambah2.png)

- ini adalah tampilan put product :
Update produk
![gambar PUT](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/edit1.png)

Hasil update produk
![gambar PUT](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/edit2.png)

- ini adalah tampilan delete produk
![gambar DELETE](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/hapus.png)
