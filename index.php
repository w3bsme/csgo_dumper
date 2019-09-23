<?
Class CSGO {
    public static function getVesion() : string
    {
        return preg_match('#\<p.+class="post_date"\>((.+?){10})#', file_get_contents('https://blog.counter-strike.net/'), $preg_matches) ? $preg_matches[1] : false;
    }
    public static function getUniquePlayers() : int
    {
        return preg_match('#\<div class="monthly"\>(\d{1,9}\,{1}\d{1,9}\,{1}\d{1,9}|\d{1,9}\,{1}\d{1,9}\,{1}\d{1,9}\,{1})\<\/div\>#', file_get_contents('https://blog.counter-strike.net/'), $preg_matches) ? (int) str_replace(',', '', $preg_matches[1]) : null;
    }
}
