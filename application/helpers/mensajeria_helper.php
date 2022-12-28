<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
	 * It makes a request to a URL, and returns the response
	 * 
	 * @param url The URL to send the request to.
	 * @param post true if you want to send a POST request, false if you want to send a GET request
	 * @param data The data to be sent to the API.
	 * @param headers An array of headers to send with the request.
	 * 
	 * @return The result of the curl request.
	 */
	function requestHelper($url, $post = false, $data = null, $headers = []) {
		/* It initializes a new cURL session. */
		$ch = curl_init();
	
		/* An array of options to be used in the curl request. */
		$opts = array(
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_TIMEOUT_MS => 0,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_URL => $url,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST => $post
		);
	
		/* Checking if the data parameter is not null, and if it is not, it adds the CURLOPT_POSTFIELDS
		option to the  array. */
		if ($data != null) {
			$opts += [CURLOPT_POSTFIELDS => $data];
		}
	
		/* Checking if the  array is empty or not. If it is not empty, it adds the CURLOPT_HTTPHEADER
		option to the  array. */
		if (count($headers)) {
			$opts += [CURLOPT_HTTPHEADER => $headers];
		}
	
		/* It sets the options for the curl request. */
		curl_setopt_array($ch, $opts);
	
		/* It executes the curl request. */
		$result = curl_exec($ch);
		/* It closes the curl session. */
		curl_close($ch);
	
		return $result;
	}

?>