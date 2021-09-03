<?php
// include('captcha.php');
system('clear');sleep(3);
$url = [
  'process' => "https://coinfree.site/user/faucet", 
  'faucet' => "https://coinfree.site/user/faucet",
  'ptc' => "https://coinfree.site/user/ptc/index",
  'verify' => "https://coinfree.site/user/ptc/index?id=",
  'visit' => "https://coinfree.site/user/ptc/visit/",
  'short' => 'https://coinfree.site/user/shortlinks/index'
];

// $cookie = "MIDFAUCET=052c3157ce017ea2f5b91f785be35ba1;dom3ic8zudi28v8lr6fgphwffqoz0j6c=be6b3c8f-e7dc-4cd0-b3f9-ab75a056616c%3A3%3A1;HstCfa4531111=1630095793126;HstCmu4531111=1630095793126;HstCnv4531111=1;__dtsu=104016291489424206A966DAF6AA38D9;_cc_id=24c052958d627ed0f8b37ec776bb66c9;panoramaId_expiry=1630700719419;panoramaId=b82c43fb812dee341e21d32542e716d5393899ce860fa86b5dc9813cda5e0b03;_data_html=3-1_15-1_23-1_75-1_158-2;HstCla4531111=1630097563440;HstPn4531111=5;HstPt4531111=5;HstCns4531111=2;_data_cpc=7-2_161-1;_data_cpm=3-1_15-1_75-1_158-4";

$cookie = "r=Oppipo10; MIDFAUCET=ad385e532c856f58f5323909864ff054; _ga=GA1.2.1793513037.1630615657; _gid=GA1.2.409082267.1630615657; _data_cpm=3-1_7-1_38-1_41-1_44-1_45-1_46-1_49-1; dom3ic8zudi28v8lr6fgphwffqoz0j6c=b31b59a0-db97-4013-9aa1-c74b70e241e5%3A3%3A1; _data_html=3-1_23-1_38-1_41-1_46-1; HstCfa4531111=1630615673635; HstCla4531111=1630615746520; HstCmu4531111=1630615673635; HstPn4531111=4; HstPt4531111=4; HstCnv4531111=1; HstCns4531111=1; __dtsu=6D001630578288F1866AEAF57A9A7B86; pop_delay_586=1; _data_cpc=12-1_161-1_378-1; _gat_gtag_UA_205414062_1=1; _gat_gtag_UA_205860360_1=1";
// $user = array()
// user-agent PC



$user_agent = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0";

// user-agent phone
// $u[] = "user-agent: Mozilla/5.0 (Linux; Android 9; vivo 1902) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.114 Mobile Safari/537.36";
// $user[1] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
//$user[2] = "cookie: ".$cookie;


$user = [
  "user-agent: ".$user_agent, 
  'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 
  "cookie: ".$cookie
];

$csrf = "b524f4d17bcc20465b3a8329bc4475b9";
$recaptcha = "03AGdBq25twc7BDY4vVyLXqmhBLIWG4fRyMgyJbdH6ztGp54zw8UYOY4fL8cyZ0PHKYloo_qTOTvgHUiJlU1-G9GV4l-s38m8T8gasPIyypWgcmK6CLqCQ5IS8mJ9mMWtWrQ8VxT9uvcfDvkhvBYACI2pjPPderTGMMnumHJh31BoYRinFdbODibYum9q5kxXiQZOq3sQ6BTYgkRBz8EHsbmzZPawj5shteSMSK3MsQ-4gDLyTTk9PtaEFGgdf8PvmB_DKN2G8YiS1opYKL3cCvhsdwU4qPDAdLP-zsjYqgLymZ8-7afMet67JbR75CQYpWaKbNf_z279sHPqxNISbg8jwcFXQtrywTmcxxTdIUyCIaJiom4W46C7RNYBNeFWFHGh5I_57Tu1CYy10riZ3YlewmHAUauxTAOSKx7DQ9FhdN37bu4Nob5ueclBAv5gaSo32mTUBs8lThRdhZhhjJrnBBlxzTrKevQ";


// echo 'Hello';

function cekView($cd){
  $n = explode('<title>', $cd)[1];
  $meta = explode('</title>', $n)[0];
  
  return $meta;
}
function cekBrowser($cd){
  $n = explode('<span data-translate="checking_browser">', $cd)[1];
  $meta = explode('</span>', $n)[0];
  
  return $meta;
  
}

function show_curl_info($data){
  echo "\nINFO WEB TARGET"; sleep(5);
  echo "\n🔸HTTP CODE : ".$data['http_code'];
  sleep(2);
  echo "\n🔸HEADER SIZE : ".$data['header_size'];
  sleep(2);
  echo "\n🔸IP : ".$data['primary_ip'];
  sleep(2);
  echo "\n🔸Local IP : ".$data['local_ip'];
  //sleep(2);
  //echo "\n🔸URL : ".$data['url'];
  sleep(5);
  system('clear');
}

function visit($u, $url){
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
    show_curl_info($http);
    //print_r($http);
    curl_close($ch);
    return $result;
} // end func

function shortList($u, $url){
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
    if($http['http_code'] == 200) {
      // <a href="https://coinfree.site/user/shortlinks/visit/3/" target="_blank">
      $link = explode('" target="_blank">', $result);
      for($y = 0; $y < count($link)-1; $y++){
        $lk[$y] = explode('/user/shortlinks/visit/', $link[$y])[1];
        $res[$y] = ['url' => "https://coinfree.site/user/shortlinks/visit/".$lk[$y]
        ];
      }
      //print_r(count($lk));
    }
    //show_curl_info($http);
    // print_r($http);
    curl_close($ch);
    return $res;
}
$data = "action=claim_hourly_faucet&g-recaptcha-response={$recaptcha}&captcha=&csrf_test_name={$csrf}";

function shortVisit($u, $url) {
   $ch=curl_init();
  curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_CUSTOMREQUEST => 'GET',
   //  CURLOPT_POST => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    
    CURLOPT_HTTPHEADER => $u,
    // CURLOPT_POSTFIELDS => $data,
    CURLOPT_SSL_VERIFYPEER => 0
    // CURLOPT_SSL_VERIFYHOST => 2,
    // CURLOPT_ENCODING => "gzip, deflate, br",
    ));
    $result = curl_exec($ch);
    $http = curl_getinfo($ch);
      if($http['http_code'] == 200) {
        sleep(7);
        $red = $http['url'];
      } else {
        $red = NULL;
      }
    // show_curl_info($http);
    //print_r($http);
    //printf("#########№#######");
    //print_r($result);
    curl_close($ch);
    return $red;
}

function shortEXE($u, $url) {
   $ch=curl_init();
  curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_CUSTOMREQUEST => 'GET',
   //  CURLOPT_POST => 1,
   CURLOPT_HEADER         => true,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_AUTOREFERER    => true,
    CURLOPT_HTTPHEADER => $u,
    // CURLOPT_POSTFIELDS => $data,
    CURLOPT_SSL_VERIFYPEER => 0
    // CURLOPT_SSL_VERIFYHOST => 2,
    // CURLOPT_ENCODING => "gzip, deflate, br",
    ));
    $result = curl_exec($ch);
    $http = curl_getinfo($ch);
      if($http['http_code'] == 200) {
        //$red = $http['url'];
        // print_r($http);
        $ri = explode('URL=', $result)[1];
        $uri = explode('vary', $ri)[0];
       print_r($uri);
        printf("\n");
      } else {
        //$red = NULL;
      }
    // show_curl_info($http);
    //print_r($http);
    //printf("#########№#######");
    // print_r(count($uri))
    //print_r($result);
    curl_close($ch);
    //return $red;
}

function setURL($u, $url) {
  
  $ch=curl_init();
  curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_CUSTOMREQUEST => 'GET',
   //  CURLOPT_POST => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    
    CURLOPT_HTTPHEADER => $u,
    // CURLOPT_POSTFIELDS => $data,
    CURLOPT_SSL_VERIFYPEER => 0
    // CURLOPT_SSL_VERIFYHOST => 2,
    // CURLOPT_ENCODING => "gzip, deflate, br",
    ));
    $result = curl_exec($ch);
    curl_close($ch);
    $setID = explode('href="https://coinfree.site/user/ptc/index?id=', $result)[1];
    $ID = explode('" class="btn btn-primary btn-xs">Verify</a>', $setID)[0];
    return $ID;
}

function cekReward($res) {
  $re = explode('<div class="alert alert-success"> ', $res)[1];
  $word = explode(' points have been added to your account!', $re)[0];
  $reword = explode('credits and ', $word);

  echo "\n💰 {$reword[0]} credits";
  sleep(1);
  echo "\n💰 {$reword[1]} points";
  sleep(2);
  //0.02739840
  $ba = explode('<i class="fa fa-bank"></i> ', $res)[1];
  $balance = explode(' DOGE</span>', $ba)[0];

  echo "\n\n🎁 Balance ".$balance." 🐶";
  sleep(3);
}

function exeURL($u, $url) {
  $ch=curl_init();
  curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_HTTPHEADER => $u,
    CURLOPT_SSL_VERIFYPEER => 0
    ));
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    if($info['http_code'] == 200) {
      echo "\n✔️ successfully executed";
      sleep(3);
      echo "\n🔻HASIL :"; sleep(2);
      cekReward($result);
      $msg = true;
    }
    // print_r($info);
    // print_r($result);
    else {
      echo "\n🚨🔹🚨 ADA YANG SALAH 🚨🔹🚨";
      sleep(3);
      $msg = false;
    }
    curl_close($ch);
    return $msg;
}

function showList($res){
  $d = explode('" target"><span', $res);
  for($i = 0; $i < count($d)-1; $i++){
    
    $visit[$i] = explode('<a href="https://coinfree.site/user/ptc/visit/', $d[$i])[1];
    $dt1 = explode(' sec)</small></p>', $d[$i])[0];
    $dt2 = explode('data-original-title="', $dt1)[1];
    $dt3[$i] = explode('<small>(', $dt2);
    $ds[$i] = explode('">', $dt3[$i][0]);
    $out[$i] = [
      'visit' => $visit[$i],
      'title' => $ds[$i][1],
      'desk' => $ds[$i][0],
      'time' => $dt3[$i][1],
      ];
    //print_r($d[$i]);
  }
  // print_r(count($d));
  return $out;
}
function opening(){
  echo "System has walked"; 
  sleep(2); 
  echo "\nProgram created by 🧔@abuduchoy";
  sleep(5); 
  echo "\nReady to execute";
  sleep(3);
  system('clear');
  echo "System running";
}
function openPTC($ptc){
  system('clear');sleep(3);
  echo "🔹🔸🔹PTC running🔹🔸🔹";
  sleep(2);
  echo "\n👉 Lakukan perhitungan";
  sleep(2);
  echo "\n👉 Jumlah PTC ".$ptc;
  sleep(2);
}

// opening();
system('clear');

// do not delete
// $site = shortList($u, $url['short']);
// $redirect = shortVisit($u, $site[2]['url']);
// shortEXE($u, $redirect);


//print_r($redirect);
// do not delete

$res = visit($user, $url['ptc']);
$s = showList($res);
openPTC(count($s));
 echo "\n🚧🔸🚧Lakukan Pengalihan System🚧🔸🚧"; sleep(3);
 echo "\n🚀 Jalankan System"; sleep(3);
for($i = 0; $i < count($s); $i++){
  system('clear');
echo "\n\n🔸🔹🔸🔹🔸🔹🔸🔹🔸🔹";
$no =$i+1;
echo "\n🔻 [{$no}]".$s[$i]['title'];
 $setVisit = $url['visit'].$s[$i]['visit'];
 $exe = setURL($user, $setVisit);
 $setID = $url['verify'].$exe;
 echo "\n";
 for($j = $s[$i]['time']+1; $j > -1; $j--){
   echo "\r";
   if($j > 0){
     echo "{$j} Wait";
   } else {
     echo "🔻 Done";
   }
   sleep(1);
 }
 $x = exeURL($user, $setID);
 if($x == true){
   echo "\n✔️ EXE Sukses\n\n";
 } else {
   echo "\n❌ EXE  Gagal\n\n";
 }
}


// print_r($s);
echo "\n SELESAI";



?>