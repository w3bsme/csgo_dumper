<?

Class CSGO {
    /**
     * @type {!RegExp}
     */
    static $regex_DReleased = '#\<p.+class="post_date"\>((.+?){10})#';

    /**
     * @type {!RegExp}
     */
    static $regex_UPlayers = '#\<div class="monthly"\>(\d{1,9}\,{1}\d{1,9}\,{1}\d{1,9}|\d{1,9}\,{1}\d{1,9}\,{1}\d{1,9}\,{1})\<\/div\>#';

    /**
     * Allows to get last updated date
     *
     * @method dateReleased
     * @return {String|NULL} Date formatted like `2021.01.27`
     */
    public static function dateReleased() :? string
    {
        return preg_match(self::$regex_DReleased, file_get_contents('https://blog.counter-strike.net/'), $preg_matches)
            ? $preg_matches[1]
            : null;
    }

    /**
     * Allows to get unique players per month
     *
     * @method getUniquePlayers
     * @return {Integer|NULL} Count of unique players per month
     * formatted like `23240529`
     */
    public static function getUniquePlayers() :? int
    {
        return preg_match(self::$regex_UPlayers, file_get_contents('https://blog.counter-strike.net/'), $preg_matches)
            ? (int) str_replace(',', '', $preg_matches[1])
            : null;
    }
}

$csgo = new CSGO;

echo $csgo->dateReleased();
echo PHP_EOL;
echo $csgo->getUniquePlayers();
