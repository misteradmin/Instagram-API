<!--this code are remain open source, but please add credits on the idea maker: sky.henry@live.com -->
<!--there is hardwork on putting the ideas work-->
<head>
<link href="http://www.skyconnectiva.com/worldwide/partial/images/logo.png" rel="shortcut icon" type="image/jpg"  />
<title>Kitapasarin - v.3.6.0</title>
<meta name="description" content="The first automated selling E-Commerce in the world." />

<?php 
	function processURL($url)
    {
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 2
        ));
 
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
 
	if(!isset($_GET['tag'])){
		$tag = "cake";
	}else{
		$tag = $_GET['tag'];
	}
    $access_token = "2898049867.1677ed0.49a2fe8e84d74e1fa02dac37a5313f09";
    
	$url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?access_token='.$access_token;
	echo $url;
	//$url = 'https://api.instagram.com/v1/users/19151462/media/recent?access_token='.$access_token;
	
    $all_result  = processURL($url);
    $decoded_results = json_decode($all_result, true);
 
	/*
	echo '<pre>';
    print_r($decoded_results);
    exit;
		*/
	
    //Now parse through the $results array to display your results... 
	foreach($decoded_results['data'] as $item){
        $image_link = $item['caption']['text'];
        echo $image_link;
    }
	
    foreach($decoded_results['data'] as $item){
        $image_link = $item['images']['thumbnail']['url'];
        echo '<img src="'.$image_link.'" />';
    }
?>

