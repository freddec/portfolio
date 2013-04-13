<?php
/*
 * @author Frederik Declerck
 * @date Sept 2012
 *
 * @version 0.1
 */

//Instagram logic
//found on http://www.barattalo.it/2011/08/18/how-to-use-instagr-am-photos/
//modified for single picture

ini_set('default_charset', 'UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', '1');
 
// ----------------------------------------------------------------------
// CONFIG
$instagram_user = "fred_dec"; // your instagram username
$cachetime = 2; // 2 hours
$file = $instagram_user."_instagram.txt"; // file used to cache content
// ----------------------------------------------------------------------
 
function getFollowgram($u) {
    // function read instagram feed through followgram.me service, thanks Fabio Lalli
    // twitter @fabiolalli
    $url = "http://followgram.me/".$u."/rss";
    $s = file_get_contents($url);
    preg_match_all('#<item>(.*)</item>#Us', $s, $items);
    $ar = array();
    $item = $items[1][0];
    preg_match_all('#<link>(.*)</link>#Us', $item, $temp);
    $link = $temp[1][0];
    preg_match_all('#<pubDate>(.*)</pubDate>#Us', $item, $temp);
    $date = date("d-m-Y H:i:s",strtotime($temp[1][0]));
    preg_match_all('#<title>(.*)</title>#Us', $item, $temp);
    $title = $temp[1][0];
    preg_match_all('#<img src="([^>]*)">#Us', $item, $temp);
    $thumb = $temp[1][0];
    
    $image['date'] 		= $date;
    $image['image']		= str_replace("_5.jpg","_6.jpg",$thumb);
    $image['bigimage'] 	= str_replace("_5.jpg","_7.jpg",$thumb);
    $image['link'] 		= $link;
    $image['title'] 	= $title;

    return $image;
}
 
// -----------------------------------------------
// get image
    $imageObject = getFollowgram($instagram_user);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen, projection" />
<title>Fred's playground</title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17514369-5']);
  _gaq.push(['_setDomainName', 'freddec.be']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="navigation">
	<ul>
		<li class="selected"><a href="#home">Home</a></li>
		<!--<li><a href="#portfolio">Portfolio</a></li>-->
		<li><a href="#me">About Me</a></li>
		<li><li><a href="#me">Notes</a></li>
		<li><a href="#contact">Contact</a></li>
	</ul>
</div>
<div id="headSection" class="clearfix">
	<div id="digitalPlayground">
		Hi,
		<br />
		My Name is Frederik
		<br />
		- this is my digital <u>PLAY</u>GROUND
		<br />
		Welcome!
	</div>
	
	<div id="profilePic">
		<!-- <img src="css/img/profilepic.png" alt="headshot" /> -->
		<div class="ch-item ch-img-1">
            <div class="ch-info">
                <h3>Frederik Declerck</h3>
                <p>21 yrs old</p>
                <p>Location: Belgium</p>
                <p>Current status: Student</p>
            </div>
        </div>
	</div>
</div>

<div id="socialSection" class="clearfix">
	<div class="sectionHead clearfix">
		<div class="sectionHeader">		
			<h2>
				<a href="http://www.twitter.com/fred_dec" target="_blank" title="twitter" id="tweetIcn">Twitter</a>
				<a href="http://www.last.fm/user/Fr3dj3" target="_blank" title="last.fm" id="lastIcn">Last.fm</a>
				<a href="http://www.instagram.com/fred_dec" target="_blank" title="instagram" id="instaIcn">Instagram</a>
				<a href="http://www.flickr.com/photos/fred_dec/" target="_blank" title="flickr" id="flickrIcn">Flickr</a>
				This is me
			</h2>
			<!-- <h3>click on the icons to connect with me or view some updates below</h3> -->
		</div>
		
		<img src="css/img/IMG_0209.png" id="meImage"></div>
<!--
		<div class="sectionSubtitle">
			<h3>Click on the icons to connect with me or view some updates here</h3>
		</div>
-->
	</div>
	
	<!--
<div id="socialContent" class="clearfix">	
		<div id="tweets">
			<ul id="twitter_update_list">
				<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
				<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/fred_dec.json?callback=twitterCallback2&count=1"></script>
			</ul>
		</div>
		
		<div id="instapics" class="slider">
			<img src='<?php print  $imageObject['image']; ?>' width="340px" height="340px" alt="<?php print $imageObject['title'] ?>" />
			
			<!--
<div id="instaCaption">
				<?php if($imageObject['title'] == null || $imageObject['title'] == '') { ?>
					<h3>
						<a href="<?php print $imageObject['link']; ?>" target="_blank"><?php print 'image taken on ' . $imageObject['date']; ?></a>
					</h3>
				<?php } else { ?>
					<h3><a href="<?php print $imageObject['link']; ?>" target="_blank"><?php print $imageObject['date'] . ': ' . $imageObject['title']; ?></a></h3>
				<?php } ?>
			</div>
-->
	
			<!-- <?php print $archive; ?> -->
<!--
			<?php if($imageObject['title'] == null || $imageObject['title'] == '') { ?>
				<h3>
					<a href="<?php print $imageObject['link']; ?>" target="_blank"><?php print 'image taken on ' . $imageObject['date']; ?></a>
				</h3>
			<?php } else { ?>
				<h3><a href="<?php print $imageObject['link']; ?>" target="_blank"><?php print $imageObject['date'] . ': ' . $imageObject['title']; ?></a></h3>
			<?php } ?>
		</div>
	</div>
-->
</div>

<div id="portfolioSection" class="clearfix">
	<div class="sectionHead clearfix">
		<div class="sectionHeader">
			<h2>I like creating websites</h2>
			<h3>take a look at some of them</h3>
		</div>
	</div>
			
	<div id="portfolioContent">
		<div id="runningSites">
			<h3>Up and running, take a look!</h3>
			<ul>
				<li><a href="" target="_blank">kljoeselgem.be</a> (youth movement)</li>
				<li><a href="" target="_blank">fcdenast.be</a> (football club)</li>
				<li><span>more to come...</span></li>
			</ul>
		</div>
		
		<div id="projectSites">
			<h3>School projects</h3>
		</div>
	</div>
	
</div>

<div id="meSection" class="clearfix">
	<div class="sectionHeader">
		<h2>but that's not the only thing I do</h2>
		<h3>I enjoy life too</h3>
	</div>
	
</div>

<div id="contactSection" class="clearfix">
	<div class="sectionHeader">
		<h2>like what you see?</h2>
		<h3>contact me!</h3>
	</div>
	
</div>

</body>
</html>