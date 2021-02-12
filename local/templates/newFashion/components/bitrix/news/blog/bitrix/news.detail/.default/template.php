<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="col-md-9 blog-sec-img">
	<div class="blog-single">
		<div class="blog-sec-info">
			<h2><?=$arResult["NAME"]?></h2>
			<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="img-responsive" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">	
			<p>
				<?=$arResult["PREVIEW_TEXT"];?>
			</p>
		</div>
	</div>
</div>