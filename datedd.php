<!DOCTYPE HTML>
<html>
<?php
//echo date_dropdown();
function date_dropdown($year_limit = 0){
        $html_output = '    <div id="date_select" >'."
";
        $html_output .= '        <label for="date_day">'."
";

        /*days*/
        $html_output .= '           <select name="date_day" id="day_select"'."
";
            for ($day = 1; $day <= 31; $day++) {
                $html_output .= '               <option>' . $day . '</option>'."
";
            }
        $html_output .= '           </select>'."
";

        /*months*/
        $html_output .= '           <select name="date_month" id="month_select" >'."
";
        $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            for ($month = 1; $month <= 12; $month++) {
                $html_output .= '               <option value="' . $month . '">' . $months[$month] . '</option>'."
";
            }
        $html_output .= '           </select>'."
";

        /*years*/
        $html_output .= '           <select name="date_year" id="year_select" >'."
";
            for ($year = 2018; $year <= 2025; $year++) {
                $html_output .= '               <option>' . $year . '</option>'."
";
            }
        $html_output .= '           </select>'."
";

        $html_output .= '   </div>'."
";
 return $html_output;
}
$text=date_dropdown();

echo $text;

?>
</html>

