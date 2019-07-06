# CRUD-Restful-Oracle


## =========== Tutorial Crud di Laravel ===========

### Versi PHP = 7.3.2
### Laravel = 5.8
### Oracle = 11.g

####Database

- Buat Tabel dengan judul Q_PRODUCT. Berikut adalah format tabelnya :  

![gambar db](https://github.com/residwi/CRUD-Restful-Oracle/blob/master/oracle-crud/storage/db.png)
  
1) ProductID (Number 7, 0) (PK)  
		2) ProductName (Varchar 25)  
		3) Category (Varchar 15)  
		4) Buyprice (Number 10, 2)  
		5) SellPrice (Number 10, 2)  
		6) Description (Varchar 250)   
   
   2. Kamu perlu merubah IP TNS dan HOST sesuai dengan IP oracle kamu *config/oracle*.  
    
  > EX:  
>tns'            => env('DB_TNS', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.43.75)(PORT=1521)) .  

>'port'           => env('DB_PORT', '1521'),  

>Full Setting untuk Koneksi ke DB config/oracle  
  
><?php  
  
>return [  
 >   'oracle' => [  
  >      'driver'         => 'oracle',   
   >     'tns'            => env('DB_TNS', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.43.75)(PORT=1521)) (CONNECT_DATA=(SERVICE_NAME=orcl)))'),  
   >     'host'           => env('DB_HOST', '192.168.43.75'),  
    >    'port'           => env('DB_PORT', '1521'),  
     >   'database'       => env('DB_DATABASE', ''),  
      >  'username'       => env('DB_USERNAME', 'system'),  
       > 'password'       => env('DB_PASSWORD', 'oracle'),  
       > 'charset'        => env('DB_CHARSET', 'AL32UTF8'),  
       > 'prefix'         => env('DB_PREFIX', ''),  
       > 'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),  
        >'edition'        => env('DB_EDITION', 'ora$base'),  
        >'server_version' => env('DB_SERVER_VERSION', '11g'),  
   > ],  
> ];  
     
   
   
