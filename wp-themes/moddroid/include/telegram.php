
			<?php 
			global $opt_themes; 
			$telegram_on	= $opt_themes['telegram_activate'];
			$username		= $opt_themes['telegram_usernames'];
			$url			= $opt_themes['telegram_url'];
			$join			= $opt_themes['telegram_users_join'];
			$tele_channel	= $opt_themes['telegram_users_on_telegram_channel'];
			if($telegram_on) { ?> 
			<div class="text-center pb-3">
			<a class="btn btn-info rounded-pill" href="<?php echo $url; ?>" target="" rel="nofollow" style="color: white!important; ">
			<svg class="svg-4 mr-2" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"></path></svg>
			<?php echo $join; ?> @<?php echo $username; ?> <?php echo $tele_channel; ?></a>
			</div>
			<?php } ?>