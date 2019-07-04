# CRUD-Restful-Oracle

Database dengan oracle
------Membuat Database Dengan Struktur------

Nama Table: q_product
Field: 
- Productid (PK) Number(7,0)
- ProductName Varchar(25)
- Category Varchar (25)
- Buyprice Number (10,2)
- Sellprice Number (10,2)
- Description Varchar (250)

----Membuat Get q_product----
hanya yang berbintang yang diisi
Name diisi dengan "get_product"
required privilege tidak usah diubah
status tidak diubah

- Cara Menambahkan Query Pada get_product
select * from q_product
jadi source code di atas adalah cara menampilkan semua data

---Penjelasan tentang POST---

name diisi dengan name dan post_product dan hanya yang berbintang diisi
required privilege dan status tidak diubah

======Cara Menambahkan Query pada post_product======
DECLARE
  id Q_PRODUCT.PRODUCTID%type;
BEGIN
  INSERT INTO Q_PRODUCT(PRODUCTID, PRODUCTNAME, CATEGORY, BUYPRICE, SELLPRICE, DESCRIPTION)
  VALUES (id, :PRODUCTNAME, :CATEGORY, :BUYPRICE, :SELLPRICE, :DESCRIPTION);
end;

----Membuwat put q_product---- 
hanya yang berbintang yang diisi 
Name diisi dengan "put_product" 
required privilege tidak usah diubah 
status tidak diubah

======Cara Menambahkan Query pada put_product======
begin
update q_product set :productname, :category, :buyprice, :sellprice, :description where productid = :id
commit;
end;

Membuat DELETE
Hanya yang berbintang yang diisi
contohnya :
*Name : delete_product
*Pagination Size :25
*URL Template : del_product/{id}
Method : DELETE

Setelah itu tekan CREATE

Pada tampilan Resource Handler 

Requires Secure Access diganti menjadi (NO)

<---Cara Membuat Query Delete--->

begin
delete from q_product where PRODUCTID = :ID;
end;

