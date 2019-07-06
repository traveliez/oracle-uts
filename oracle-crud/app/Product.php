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