<?php

namespace App\Services;

use Google\Client;
use Google\Service\Classroom;
use Google\Service\Classroom\Invitation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GoogleClassroomService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Client();
        // Point to your NEW OAuth JSON file
        $this->client->setAuthConfig(storage_path('app/client_secret.json'));
        
        // Permission to manage students (Invites)
        $this->client->addScope(Classroom::CLASSROOM_ROSTERS);
        
        // Permission to see the Class ID (Fixes your error)
        $this->client->addScope(Classroom::CLASSROOM_COURSES_READONLY);

        $this->client->setAccessType('offline'); // Important: allows working when you are offline
        $this->client->setPrompt('select_account consent');

        // Load the saved token if it exists
        if (Storage::exists('google-token.json')) {
            $accessToken = json_decode(Storage::get('google-token.json'), true);
            $this->client->setAccessToken($accessToken);
        }

        // If token is expired, refresh it
        if ($this->client->isAccessTokenExpired()) {
            // If we have a refresh token, use it
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
                // Save the new token
                Storage::put('google-token.json', json_encode($this->client->getAccessToken()));
            }
        }

        $this->service = new Classroom($this->client);
    }

    // This function generates the Login Link for YOU (The Admin)
    public function getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }

    // This function saves the token after you login
    public function authenticate($code)
    {
        $accessToken = $this->client->fetchAccessTokenWithAuthCode($code);
        Storage::put('google-token.json', json_encode($accessToken));
        return $accessToken;
    }

    public function inviteStudent($userEmail, $courseId)
    {
        if ($this->client->isAccessTokenExpired()) {
            return false; // Token issue, Admin needs to re-login
        }

        try {
            $invitation = new Invitation([
                'userId' => $userEmail,
                'courseId' => $courseId,
                'role' => 'STUDENT'
            ]);

            $this->service->invitations->create($invitation);
            return true;
        } catch (\Exception $e) {
            Log::error('Google Classroom Invite Error: ' . $e->getMessage());
            return false;
        }
    }
}