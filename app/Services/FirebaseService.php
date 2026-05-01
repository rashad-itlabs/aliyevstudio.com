<?php
namespace App\Services;

use Google\Client;

class FirebaseService
{
    public function getAccessToken()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/firebase.json'));
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $client->fetchAccessTokenWithAssertion();
        $token = $client->getAccessToken();

        return $token['access_token'];
    }

    public function sendFCM($deviceToken)
    {
        $accessToken = $this->getAccessToken();

        $response = \Http::withToken($accessToken)
            ->post('https://fcm.googleapis.com/v1/projects/medapp-62f91/messages:send', [
                "message" => [
                    "token" => $deviceToken,
                    "notification" => [
                        "title" => "Yeni Randevu 🩺",
                        "body"  => "Yeni pasiyent randevu yaratdı"
                    ],
                    "data" => [
                        "type" => "appointment"
                    ]
                ]
            ]);

        return $response->json();
    }

    public function sendCustomNotification($deviceToken, $title, $body)
    {
        $accessToken = $this->getAccessToken();

        $response = \Illuminate\Support\Facades\Http::withToken($accessToken)
            ->post('https://fcm.googleapis.com/v1/projects/medapp-62f91/messages:send', [
                "message" => [
                    "token" => $deviceToken,
                    "notification" => [
                        "title" => $title,
                        "body"  => $body
                    ],
                    "data" => [
                        "type" => "general_announcement"
                    ],
                    "android" => [
                        "priority" => "high"
                    ],
                    "apns" => [
                        "headers" => [
                            "apns-priority" => "10"
                        ]
                    ]
                ]
            ]);

        return $response->json();
    }
}