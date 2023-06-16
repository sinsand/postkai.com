<html>
  <head>
    <title>กำลังนำคุณไปสู่ : <?php echo $_GET['outlink'];?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="https://cdn.lazywasabi.net/fonts/Anuphan/Anuphan.css?woff2" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?php echo $LinkWeb;?>css/style.css">
    
	 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.plugins.min.js"></script>
    <script>
      $(function($) {
          $("img.lazy").Lazy();
      });
    </script>
	
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  	<script>
  		$(document).ready(function() {
  			$('.grid').masonry({
  			  // options
  			  itemSelector: '.grid-item'
  			});
  		});
  	 </script>
  	<style>
  		.grid-item { width: 100%; }
  		@media screen and (min-width: 768px) {
  		  /* 5 columns for larger screens */
  		  .grid-item { width: 33.333%; }
  		}
  	</style>

	<?php 
		if ($post_domain=="postkai.com" || $post_domain=="www.postkai.com") {
			?>
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163704899-7"></script>
				<script>
					window.dataLayer = window.dataLayer || [];
					function gtag(){dataLayer.push(arguments);}
					gtag('js', new Date());

					gtag('config', 'UA-163704899-7');
				</script>
			<?php 
      	}elseif ($post_domain=="meekai.com" || $post_domain=="www.meekai.com") {
        	?>
				<script async src="https://www.googletagmanager.com/gtag/js?id=G-HD8LNTE4GV"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'G-HD8LNTE4GV');
				</script>
			<?php 
		}
	?>
    <!-- Ads Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6703509271619714" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<?php if (!empty($_GET['outlink'])){ ?>
	<script language="javascript">
		function funcRedirect(){
			setTimeout("window.location='<?php echo $_GET['outlink'];?>';",5000)
			//1 Second = 1000
		}
		function funcWrite(){
			setTimeout("fncWriteDot();",100)
		}
		function fncWriteDot(){
			document.frmMain.hdnText.value = document.frmMain.hdnText.value+".";
			spDot.innerHTML = document.frmMain.hdnText.value;
			funcWrite();
		}
	</script>
	<?php } ?>
  </head>
  <body OnLoad="JavaScript:funcRedirect();funcWrite();">
		<div class="container text-center">
			<div clas="row">
				<div class="col-xs-12">
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6703509271619714" crossorigin="anonymous"></script>
					<!-- ads_taladpattaya_250x300 -->
					<ins class="adsbygoogle"
						 style="display:inline-block;width:250px;height:300px"
						 data-ad-client="ca-pub-6703509271619714"
						 data-ad-slot="4432257652"></ins>
					<script>
						 (adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<p class="text-center" style="margin:30px 0;">กรุณารอสักครู่ กำลังพาคุณไปยัง<span id="spDot"></span>
					<form name="frmMain">
						<input type="hidden" name="hdnText" value=""/>
					</form>
				</p>
				<div class="col-xs-12">
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6703509271619714" crossorigin="anonymous"></script>
					<!-- ads_taladpattaya_250x300 -->
					<ins class="adsbygoogle"
						 style="display:inline-block;width:250px;height:300px"
						 data-ad-client="ca-pub-6703509271619714"
						 data-ad-slot="4432257652"></ins>
					<script>
						 (adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
	  		</div>
	  	</div>

		<div class="row" style="margin:0px;">
			<div class="container" style="padding:0px;">
				<div class="col-xs-12">
					<h2 class="head-main-cate-new text-center  f-k">จากผู้สนับสนุน</h2>
				</div>
				<div class="col-xs-12">
					<div class="grid">
						<!-- show new 4 --->
						<?php
							$SqlSelect = "SELECT *
										FROM n_banner
										WHERE (
											DATE_FORMAT(bstr,'%Y-%m-%d') <= '".date('Y-m-d')."' AND
											DATE_FORMAT(bend,'%Y-%m-%d') >= '".date('Y-m-d')."'
										)
										ORDER BY RAND();";
							if (select_num($SqlSelect)>0) {
							foreach (select_tb($SqlSelect) as $row) {
								?>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 p-10">
									<div class="thumbnail p-0">
										<?php
										if (!empty($row['bscript'])) {
											echo htmlspecialchars_decode($row['bscript']);
										}else {
											?>
											<a href="<?php echo $row['blink'];?>" target="_blank">
												<img class="lazy" data-src="<?php echo $LinkWeb;?>query/view-image.php?bview=<?php echo $row['bid'];?>" src="" border="0" />
											</a>
											<?php
										}
										?>
									</div>
								</div>
								<?php
							}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	

  </body>
  
</html>
