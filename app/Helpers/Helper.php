<?php
namespace App\Helpers;

class Helper
{
    public static function bulantahun($tgl)
    {
        $qq = '';
        $k = explode("-", $tgl);
        $bln = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $qq = $bln[(int)$k[1]];
        return $qq;
    }
}
?>
