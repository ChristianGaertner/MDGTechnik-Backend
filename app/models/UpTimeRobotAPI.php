<?php

/**
 * A simple and incomplete wrapper for the UpTimeRobot.com API
* @author Christian Gärtner <christiangaertner.film@googlemail.com>
*/
class UpTimeRobotAPI
{
    
    protected static $mainUrl = 'http://api.uptimerobot.com';
    protected static $jsonP = 'jsonUptimeRobotApi()';

    protected $apiKey;
    protected $format = 'json';

    /**
     * Constrcutor
     * @param string $apiKey The API Key
     *
     * @throws InvalidArgumentException If $apiKey is empty
     */
    public function __construct($apiKey)
    {
        if (empty($apiKey)) {
            throw new InvalidArgumentException('API Key must not be empty!');  
        }
        $this->apiKey = $apiKey;
    }

    /**
     * Get one monitor. 1 based index
     *
     * Info:
     * Status Codes:
     * 0: paused
     * 1: not checked yet
     * 2: up
     * 8: seems down
     * 9: down
     * 
     * @param  integer $index The index
     * @param  boolean $raw   Whether you want to get the raw response string
     * @return stdClass       The object holding the info
     */
    public function getMonitor($index = 1, $raw = false)
    {

        $url = sprintf('%s/getMonitors?apiKey=%s&format=%s&noJsonCallback=%s',
            self::$mainUrl,
            $this->apiKey,
            $this->format,
            1
            );

        $result = $this->get($url);
        
        if ($raw) {
            return $result;
        } else {
            $t = json_decode($result);
            return $t->monitors->monitor[0];
        }
    }

    protected static function get($url)
    {
        if (empty($url)) {
            throw new InvalidArgumentException('URL must not be empty!');  
        }

        $c = curl_init();

        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 5);

        $return = curl_exec($c);

        curl_close($c);

        return $return;
    }
}