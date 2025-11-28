<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $googleReviews = $this->fetchGoogleReviews();
        $facebookReviews = $this->fetchFacebookReviews();

        // dd($facebookReviews, $googleReviews);

        return view('about', compact('googleReviews', 'facebookReviews'));
    }

    // fetch google reviews
    public function fetchGoogleReviews()
    {
        $client = new Client();

        $apiKey = 'AIzaSyA4GinaorFYaBcU2co6TMXCmf-Wx7VeWUY';
        $placeId = 'ChIJ6Vw5sjZZ4joRgwsgu9vH8IQ';

        try {
            $response = $client->get("https://maps.googleapis.com/maps/api/place/details/json?place_id=$placeId&fields=reviews&key=$apiKey");
            $reviews = json_decode($response->getBody())->result->reviews;

            return $reviews;
        } catch (Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching facebook reviews.'], 500);
        }
    }

    // fetch facebook reviews
    public function fetchFacebookReviews()
    {
        $client = new Client();

        $pageAccessToken = 'EAACit1P6oIABO9JmMUfLNsdNCLBFJekZAnII0G2Rm9biGWKG9ZBKghgfhmsw7rhRu4RiJGlo8VZAg7JDoCD9bfK7oQUdYo88NoqLMhEtKsZCKdyK0ikZBH97l7mhQHZBbLvpaJUoVIiCEBxNQZCQJZBXWjyQw8OKbHNoH0mnlz63AcN2IS86nMEdGCZCVhVbtcBpqgG4OSi4IAnIdoKUZD';

        $pageId = '112150366945864';
        $endpoint = "https://graph.facebook.com/v17.0/{$pageId}/ratings?access_token={$pageAccessToken}";

        // TODO: Ask Nilushi miss to put the Butlers meta app in LIVE mode so you can get access to user content

        try {
            $response = $client->get($endpoint);
            $reviews = json_decode($response->getBody(), true)['data'];

            // modifying the review time to be relative
            foreach ($reviews as &$review) {
                $review['created_time'] = Carbon::parse($review['created_time'])->diffForHumans();
            }

            return $reviews;
        } catch (Exception $e) {
            dd($e);
            return response()->json(['error' => 'An error occurred while fetching facebook reviews.'], 500);
        }
    }


    //
}
