<?php
/**
 * Created by PhpStorm.
 * User: torapture
 * Date: 17-12-1
 * Time: 下午7:28
 */

namespace app\common;


class Util {
    static public function getDirs($target) {
        $ret = [];
        $total = scandir($target);
        foreach ($total as $dir) {
            if ($dir != "." && $dir != "..") {
                $temp = $target.'/'.$dir;
                if (is_dir($temp))
                    array_push($ret, $dir);
            }
        }
        return $ret;
    }
    static public function getPaginationArray($now, $need, $total) {
        if ($total == 0) return [];
        if ($now < 1) $now = 1;
        if ($now > $total) $now = $total;

        if ($need >= $total)
            return range(1, $total);

        $L = (int)(($need + 1) / 2);
        $from = max(1, $now - $L + 1);
        $end = $from + $need - 1;
        if ($end > $total) {
            $end = $total;
            $from = $end - $need + 1;
        }
        return range($from, $from + $need - 1);
    }
}