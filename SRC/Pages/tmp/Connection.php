<?php


class Connection
{
    private $url;
    private $datArray;

    /**
     * Connection constructor.
     * @param $url
     * @param $datArray
     */
    public function __construct($url)
    {
        $this->url = $url;
    }


    public function getJsonUsingPOST($url)
    {

        $data = array('key1' => 'value1', 'key2' => 'value2');

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */
        }

        // print_r($result);
        echo "\n\n";
        return json_encode($result);
        // mysqli_free_result($result);


    }


    public function getJsonUsingPOSTWithDataArray($url, $dataArray)
    {

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($dataArray)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */
        }

        print_r($result);
        echo gettype($result);

    }

}