<?php 

namespace App\Schema;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Mysql\Schema;
class test extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('nama');
        $schema->teks('email');
        $schema->paragrap('photo');
        $sql = $schema->create('test');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('test', [
                'nama' => '',
            ]);
        */
    }
}
$create = new test();
$create->buattabel();