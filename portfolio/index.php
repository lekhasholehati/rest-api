<?php 

function get_CURL($url) 
{
  $curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

return json_decode($result, true);

}

// untuk menampilkan profile di youtube
$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyCVBsibTzQxoUDyBSIb7qDREXvpbdcfIs0');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$chanelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

// untuk melihat latest ideo youtube

$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCVBsibTzQxoUDyBSIb7qDREXvpbdcfIs0&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResults=1&order=date&part=snippet';

$result = get_CURL($urlLatestVideo);
$latestVideo = $result['items'][0]['id']['videoId'];

// Instagram API
$clientId = 'efd1387c8599462bafe072fa7f6743d9';
$accessToken = '1811619764.efd1387.ae07fcdb54264b95a8d6f64e2064717f';

$result = get_CURL('https://api.instagram.com/v1/users/self?access_token=1811619764.efd1387.ae07fcdb54264b95a8d6f64e2064717f');
$usernameIG = $result['data']['username'];
$profileIG = $result['data']['profile_picture'];
$followersIG = $result['data']['counts']['followed_by'];

// latest photo in instagram
$result = get_CURL('https://api.instagram.com/v1/users/self/media/recent/?access_token=1811619764.efd1387.ae07fcdb54264b95a8d6f64e2064717f&count=6');

$photos = [];
foreach ($result['data'] as $photo){
  $photos[] = $photo['images']['thumbnail']['url'];
}
 ?>

<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Portfolio</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!-- navbar -->

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

      <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#home" class="navbar-brand page-scroll ">Lekha</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#about" class="page-scroll">About</a></li>
          <li><a href="#portfolio" class="page-scroll">Portfolio</a></li>
          <li><a href="#contact" class="page-scroll">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <!-- jumbotron -->
     <div class="jumbotron text-center">
       <img src="img/cactus.jpg" class="img-circle" >
       <h1>Lekha Sholehati</h1>
       <p>Web Developer</p>
     </div>
    

    <!-- about -->
      <section class="about" id="about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center">About</h2><hr>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-5 col-sm-offset-1">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            
          </div>
          <div class="col-sm-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            
          </div>
          
        </div>
      </div>
      </section>


      <!-- Social Media -->
      <section class="social" id="social">
        <div class="container">
          <div class="row pt-4 mb-4">
            <div class="col text-center">
            <h2>Social Media</h2>
            <hr>
              
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-5">
              <div class="row mb-4">
                <div class="col-md-4">
                  <img src="<?= $youtubeProfilePic; ?>" width="200" class="img-circle img-thumbnail">
                </div>
                <div class="col-md-8">
                <h4><?= $chanelName; ?></h4>
                <p><?= $subscriber; ?> Subcribers.</p>
                <div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="default" data-count="default"></div>
                </div>               
              </div>
              <div class="row mt-4 pb-3">
                <div class="col">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideo; ?>?rel=0" allowfullscreen></iframe>
                  </div>
                </div>
              </div> 
            </div>
            <div class="col-md-5">
              <div class="row mb-3">
                <div class="col-md-4">
                  <img src="<?= $profileIG ?>" width="200" class="img-circle img-thumbnail">
                </div>
                  <div class="col-md-8">
                    <h4><?= $usernameIG ?></h4>
                    <p><?= $followersIG ?></p> 
                </div>
              </div>
                <div class="row">
                <div class="col-md-6">
                <?php foreach($photos as $photo) : ?>
                  <div class="ig-thumbnail">
                    <img src="<?= $photo ?>" width="100" style="float: left;">
                  </div>
                <?php endforeach; ?>
                  
                </div>
                  
                </div>

            </div>
          </div>
        </div>
        
      </section>

      <!-- portfolio -->
      <section class="portfolio" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Portfolio</h2>
                <hr>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <a href="" class="thumbnail">
                <img src="img/2.jpg" >
              </a>
            </div>
            <div class="col-sm-4">
              <a href="" class="thumbnail">
                <img src="img/2.jpg" >
              </a>
            </div>
            <div class="col-sm-4">
              <a href="" class="thumbnail">
                <img src="img/2.jpg" >
              </a>
            </div>
            <div class="col-sm-4">
              <a href="" class="thumbnail">
                <img src="img/2.jpg" >
              </a>
            </div>
            <div class="col-sm-4">
              <a href="" class="thumbnail">
                <img src="img/2.jpg" >
              </a>
            </div>
            <div class="col-sm-4">
              <a href="" class="thumbnail">
                <img src="img/2.jpg" >
              </a>
            </div>
            
          </div>
        </div>
      </section>

      <!-- contact -->
      <section class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Contact</h2>
              <hr>
            </div>
          </div>
           
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
            <form>
              <div class="form-group">
              <label for="nama">Nama</label>
                <input type="text" id="nama" class="form-control" placeholder="masukkan nama">
              </div>
              <div class="form-group">
              <label for="email">Email</label>
                <input type="email" id="email" class="form-control" placeholder="masukkan email">
              </div>
              <div class="form-group">
              <label for="telp">No.Telephone</label>
                <input type="tel" id="telp" class="form-control" placeholder="masukkan No telp">
              </div>
              <select class="form-control">
                <option>-- Pilih kategori --</option>
                <option>Web Design</option>
                <option>Web Development</option>
              </select>
              <div class="form-group">
                <label for="pesan">Pesan</label>
                  <textarea class="form-control" rows="10" placeholder="masukka nama"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>        
            </div>      
          </div>
        </div>
      </section>

      <!-- footer -->
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <p>&copy; Copyright 2019 | Built with <i class="glyphicon glyphicon-heart"></i> by. <a href="http://instagram.com/lekha_sholehati">Lekha Sholehati</a></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-center">
              <a href="http://youtube.com/lekhasholehati" class="btn btn-danger"><i class="glyphicon glyphicon-play"></i>Subscribe To Youtube  </a>
              
            </div>
            
          </div>
          
        </div>
      </footer>















    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>