<?php
system('clear');

// set var
$user = "";
// $user = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0";

$cookie = "";
// $cookie = "PHPSESSID=b791ffcd8d171ecdcd0f9d7100c18aaa; __gads=ID=e869d98d68e3aaaa-2265413648cb00d8:T=1630620719:RT=1630620719:S=ALNI_MYs9-0xUfKuNb9ODcYKtonf4-r-PA; _ga=GA1.2.1156904748.1630620719; _gid=GA1.2.325977083.1630620722; address=EC-UserId-464632; currency=%5B%22DOGE%22%5D; _data_cpc=1-2_2-1_15-3_79-1_132-2_190-1_230-1; _data_html=108-1_136-1; bitmedia_fid=eyJmaWQiOiI5MDI2NzQ5M2M5MWZlOTczM2FkNTNjN2ZkMTUwYzBmMCIsImZpZG5vdWEiOiJhYTI0ZTgxZWI5YjI0ZTRhOTMyYzViOThmNDI5NGFiNSJ9";

$walet = "EC-UserId-464632";

$url = "https://faucetworld.in/payout-to-wallet/?address={$walet}";

$data = "";

$request = [
	"user-agent :".$user,
	"cookie:".$cookie
];

// function
function getRun($url, $u){
	
   $ch=curl_init();
  curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
   //  CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_HTTPHEADER => $u,
    CURLOPT_SSL_VERIFYPEER => 0
    )
    );
    $result = curl_exec($ch);
    $http = curl_getinfo($ch);

    if($http['http_code'] == 200){ 

    $c = explode('Your remaining AutoClaim Tokens: ', $result)[1];
    $remain = explode('<a rel="noopener noreferrer"', $c)[0];

    $r = explode('faa-horizontal animated">', $result)[1];
    $reward = explode(' DOGE satoshi added to your Wallet', $r)[0];

    } else {
      $remain = "0";
      $reward = "0";
    }
    // echo "\n{$claim}\n\n\n";
    // print_r($http);

    $respons = [
      'http' => $http['http_code'],
      'ip' => $http['primary_ip'],
      'reward' => (int)$reward,
      'remain' => $remain,
      'wait' => 300
    ];
    curl_close($ch);
    return $respons;
}


// main
$belance = 0;
while (true) {
  system('clear');
  // panggil function
  $res = getRun($url, $request);

  if($res['http'] == 200 && $res['remain'] > 0){
    $belance = $belance + $res['reward'];
    echo "\nBelance : ".$belance." DOGE";
    echo "\nClaim : ".$res['reward']." DOGE";
    echo "\nPower : (Token)".$res['remain']."";
    echo "\nProses ...";
    echo "\n";
    for($i = 0; $i < $res['wait']+1; $i++) {
      $per = ($res['wait'] - $i) * 100 / $res['wait'];
      $p = floor($per);
      $ss = $res['wait'] % 6;
      if($ss == 0) {
        echo " \r";
        echo "[".$p."%]";
      }
      
      sleep(1);
    }
  } else {
    echo "\nGoto link to up Token \n";
    echo "\nhttps://faucetworld.in/shortlinks/\n";
    exit();
  }
}

// finish
?>
