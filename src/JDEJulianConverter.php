<?php

namespace starshums\jdejulianconverter;

/**
 * A Laravel oracle jd edwards julian date converter.
 *
 * @author SHUMS
 */
class JDEJulianConverter
{
    /**
     * Returns a list of numbers representing the days of the julian date system
     * based on a start parameter which represents the start of the month.
     *
     * @param int $start
     * @param int $end
     *
     * @return array
     */
    public function getMonth($start, $end)
    {
        $month = [];
        for ($i = 0; $i < $end; ++$i) {
            array_push($month, ++$start);
        }

        return $month;
    }

    /**
     *  Returns the formatted date.
     *
     * @param int $days
     * @param int $month_array
     * @param int $month
     * @param int $year
     *
     * @return string
     */
    public function getDate($days, $month_array, $month, $year)
    {
        $day = array_search($days, $month_array) + 1;
        $day = str_pad($day, 2, '0', STR_PAD_LEFT);

        return ($month >= 10) ? $year.'-'.$month.'-'.$day : $year.'-0'.$month.'-'.$day;
    }

    /**
     *  Returns the converted date.
     *
     * @param int $julian_date
     *
     * @return string
     */
    public function Convert($julian_date)
    {
        $array = str_split($julian_date);
        $century = $array[0];
        $century = 19 + $century;
        $year = $century.$array[1].$array[2];
        $year = (int) $year;
        $days = $array[3].$array[4].$array[5];
        $days = (int) $days;

        // is leap year ?
        $plus_one = ($year % 4) || (($year % 100 === 0) && ($year % 400)) ? 0 : 1;

        $jan_month = $this->getMonth(0, 31);
        $feb_month = $this->getMonth(31 + $plus_one, 28);
        $mars_month = $this->getMonth(59 + $plus_one, 31);
        $april_month = $this->getMonth(90 + $plus_one, 30);
        $may_month = $this->getMonth(120 + $plus_one, 31);
        $june_month = $this->getMonth(151 + $plus_one, 30);
        $july_month = $this->getMonth(181 + $plus_one, 31);
        $august_month = $this->getMonth(212 + $plus_one, 31);
        $sept_month = $this->getMonth(243 + $plus_one, 30);
        $oct_month = $this->getMonth(273 + $plus_one, 31);
        $nov_month = $this->getMonth(304 + $plus_one, 30);
        $dec_month = $this->getMonth(334 + $plus_one, 31);

        switch ($days) {
            // Jan
            case in_array($days, $jan_month):
            return $this->getDate($days, $jan_month, 1, $year);
            break;

            // Feb
            case in_array($days, $feb_month):
            return $this->getDate($days, $feb_month, 2, $year);
            break;

            // Mars
            case in_array($days, $mars_month):
            return $this->getDate($days, $mars_month, 3, $year);
            break;

            // April
            case in_array($days, $april_month):
            return $this->getDate($days, $april_month, 4, $year);
            break;

            // May
            case in_array($days, $may_month):
            return $this->getDate($days, $may_month, 5, $year);
            break;

            // June
            case in_array($days, $june_month):
            return $this->getDate($days, $june_month, 6, $year);
            break;

            // July
            case in_array($days, $july_month):
            return $this->getDate($days, $may_month, 7, $year);
            break;

            // August
            case in_array($days, $august_month):
            return $this->getDate($days, $may_month, 8, $year);
            break;

            // September
            case in_array($days, $sept_month):
            return $this->getDate($days, $sept_month, 9, $year);
            break;

            // October
            case in_array($days, $oct_month):
            return $this->getDate($days, $oct_month, 10, $year);
            break;

            // November
            case in_array($days, $nov_month):
            return $this->getDate($days, $nov_month, 11, $year);
            break;

            // December
            case in_array($days, $dec_month):
            return $this->getDate($days, $dec_month, 12, $year);
            break;

            default:
            return '1995-09-26 00:00:00'; // this is the default date, I added this because I needed it for my project, (MySql Date)
            break;
        }
    }
}
