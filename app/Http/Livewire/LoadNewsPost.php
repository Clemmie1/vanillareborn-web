<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use GuzzleHttp\Client;

class LoadNewsPost extends Component
{

    public $loadNewsPost = false;
    public $getDateCreatePost = "";

    public function getNewsPost(){
        $url = 'https://api.vk.com/method/wall.get';
        $accessToken = 'be998a31be998a31be998a31b9bee41a36bbe99be998a31dc7944f5c7c1ce9019c950a6';
        $ownerId = -213954364;
        $version = '5.131';
        $count = 5;

        $client = new Client();

        sleep(1);

        try {
            $response = $client->request('GET', $url, [
                'query' => [
                    'access_token' => $accessToken,
                    'owner_id' => $ownerId,
                    'v' => $version,
                    'count' => $count,
                ],
            ]);
    
            $data = $response->getBody()->getContents();
            // Декодируем JSON-ответ в массив данных
            $jsonData = json_decode($data, true);
    
            // Возвращаем данные
            return $this->loadNewsPost = $jsonData;
        } catch (Exception $e) {
            // Обработка ошибок, если необходимо
            return null;
        }
    }

    public function render()
    {
        return view('livewire.load-news-post');
    }
}
