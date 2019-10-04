<?php
    namespace app\models;
    
    use yii\db\ActiveRecord;


    class Pasien extends ActiveRecord{
        private $nama;
        private $alamat;
        private $nohp;
        private $keterangan;
        private $tgl;
       

        public function rules(){
            return[
                [['nama','alamat','nohp','keterangan','tgl'],'required']
            ];
        }
    }

?>