<?php


    namespace App\Traits;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\GuzzleException;
    use GuzzleHttp\Psr7\UploadedFile;
    use Illuminate\Support\Facades\File;

    trait ConsumesExternalService
    {
        public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
        {
            $client = new Client([
                'base_uri' => $this->baseUri,
            ]);

            $response = $client->request($method, $requestUrl, [
                'form_params' => $formParams,
                'headers' => $headers
            ]);

            return $response->getBody()->getContents();
        }

        public function performFileRequest($method, $requestUrl, $formParams = [], $headers = [])
        {
            $client = new Client([
                'base_uri' => $this->baseUri,
            ]);
            $multipart = [];

            foreach($formParams as $field => $value) {
                $temp = [
                    'name' => $field,
                    'contents' => $value
                ];

                if($formParams[$field] instanceof \Illuminate\Http\UploadedFile) {
                    $temp['name'] = $field;
                    $temp['contents'] = fopen($value->path(), 'r');
                }

                $multipart[] = $temp;
            };

            $response = $client->request($method, $requestUrl, [
                'multipart' => $multipart,
                'headers'   => $headers
            ]);

            return $response->getBody()->getContents();
        }
    }
