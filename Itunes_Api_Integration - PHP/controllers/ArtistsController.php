<?php
include_once("../controllers/BaseController.php");
class ArtistsController extends BaseController
{
    public function getArtists($i_data)
    {
        $data = $this->makeRequest($i_data);
        $return_data = array(
            "data" => $data["results"][0]
        );

        return (json_encode($return_data));
        die();
    }

    protected function makeRequest($i_data)
    {
        $data_to_send = [
            "amgArtistId" => $i_data["amgArtistId"]
        ];

        $base_url = "https://itunes.apple.com/lookup?" . http_build_query($data_to_send);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'get');
        curl_setopt($curl, CURLOPT_URL, $base_url);
        $result = curl_exec($curl);
        curl_close($curl);
        return (json_decode($result, true));
        die();

    }
}
