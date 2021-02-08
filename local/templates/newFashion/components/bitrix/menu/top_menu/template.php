<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="megamenu skyblue">
	<?php foreach($arResult as $arItem) : ?>
		<?php if(! $arItem["submenu"]) : ?>

			<li <?=$arItem["SELECTED"] ? 'class="active grid"' : '';?>>
				<a class="color1" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"];?></a>
			</li>

		<?php else : ?>

			<li class="grid <?=$arItem["SELECTED"] ? 'active' : '';?>">
				<a href="#"><?=$arItem["TEXT"];?></a>
				<div class="megapanel">
					<div class="row">
						<?php foreach($arItem["submenu"] as $key => $sub) : ?>
							<div class="col1">
								<div class="h_nav">
									<h4><a href="<?=$sub['LINK'];?>" class="active"><?=$sub["TEXT"];?></a></h4>
								</div>							
							</div>
						<?php endforeach; ?>
					</div>

					<div class="row">
						<?php for($i = 0; $i < $key; $i++) : ?>
							<div class="col1"></div>
						<?php endfor; ?>
					</div>
				</div>
			</li>

		<?php endif; ?>
	<?php endforeach; ?>

</ul>
