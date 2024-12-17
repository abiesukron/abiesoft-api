<?php 

namespace App\Schema;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Mysql\Schema;
class users extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        /*
            contoh membuat kolom nama VARCHAR
            dengan panjang karakter 50
            $schema->teks(nama: 'nama', panjang: 50);
        */
        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('users', [
                'nama' => '',
            ]);
        */
    }
}
$create = new users();
$create->buattabel();
