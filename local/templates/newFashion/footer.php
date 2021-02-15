<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;
?>
<?php if (! $isHome) : ?>
	</div>
</div>
<?php endif; ?>
<!--fotter//-->
<div class="fotter-logo">
	 <div class="container">
	 <div class="ftr-logo"><h3><a href="/"><?=Loc::getMessage("COPYRIGHT_TITLE");?></a></h3></div>
	 <div class="ftr-info">
	 <p><?=Loc::getMessage("COPYRIGHT_NAME");?> <a href="http://w3layouts.com/"><?=Loc::getMessage("COPYRIGHT_AUTHOR");?></a> </p>
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->

</body>
</html>