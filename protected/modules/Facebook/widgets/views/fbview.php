<script type='text/javascript'>
window.fbAsyncInit = function() {FB.init({appId : '<?php echo $session; ?>',session : <?php echo json_encode($session);?>,status : true,cookie : true,xfbml : true});FB.Event.subscribe('auth.login', function() {window.location.reload();});};(function() {var e = document.createElement('script');e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';e.async = true;document.getElementById('fb-root').appendChild(e);}());
</script>

<?php

echo '<a href="'.$login.'">';
echo Chtml::image("http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif",'Login');
echo '</a>';

echo '<pre>';
	print_r($user);
	echo '</pre>';
	echo '<pre>';
	print_r($session);
	echo '</pre>';
?>