<?php

namespace app\models;

class Control
{

    public static function getTvHistory($array, $now)
    {
        $i = 0;
        $html = "";
        if (!empty($array)) {
            foreach ($array as $af) {
                if ($now) {
                    $i == 0 ? $active = "active" : $active = "";
                    $i == 0 ? $icon = '<i class="mdi mdi-play tn"></i>' : '';
                }
                $start = date('H:i', strtotime($af['starttime']));
                $end = date('H:i', strtotime($af['endtime']));
                $html .= "<div class='d-inline-block transmission $active mb-2 w-100'>";
                $html .= '<div class="w-100">';
                $html .= '<div class="name">';
                $html .= '<b>' . $start . ' - ' . $end . ' </b>' . $af['title'];
                $html .= '</div>';
                if ($i == 0 && $now)
                    $html .= $icon;
                $html .= '</div>';
                $html .= '<div></div>';
                $html .= '</div>';
                $i++;
            }
            return $html;
        }
    }

    public static function getPercentTime($s_time, $e_time)
    {
        $start = strtotime($s_time);
        $end = strtotime($e_time);
       $current = strtotime(date('Y-m-d H:i:s'));

        $completed = (($current - $start) / ($end - $start)) * 100;


        return round($completed);
    }

}