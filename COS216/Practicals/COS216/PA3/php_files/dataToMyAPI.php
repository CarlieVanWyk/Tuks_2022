<?php

session_start();

//connect to database
$database = mysqli_connect("wheatley.cs.up.ac.za", "u21672823", "2H7M6WOSZETA7GJ67GZ5BCCBMGLLJFGK", "u21672823_cos216P3") or die("could not connect to database");

//rapid API code for php bing news
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://bing-news-search1.p.rapidapi.com/news?safeSearch=Off&textFormat=Raw",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-BingApis-SDK: true",
		"X-RapidAPI-Host: bing-news-search1.p.rapidapi.com",
		"X-RapidAPI-Key: 099b04efa9msh9ac16ade8f20a42p18145fjsna6ad3c87986f"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

//decode the data gotten from api
$newsData = json_decode($response, true);
$newsData = $newsData['value'];

//get data from bing news api and store in database
for($i = 0; $i < 5; $i++ ) {
    $title = $newsData[$i]['name'];
    $description = $newsData[$i]['description'];
    $date = $newsData[$i]['datePublished'];
    $author = $newsData[$i]['provider'][0]['name'];
    $imageURL = $newsData[$i]['image']['thumbnail']['contentUrl'];

    $query  = "INSERT INTO newsAPI(title, description, date, author, imgURL) VALUES ('$title', '$description', '$date', '$author', '$imageURL')";
    mysqli_query($database, $query);
}

?>