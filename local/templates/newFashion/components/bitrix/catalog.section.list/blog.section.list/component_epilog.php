<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<script>
	let curPage = <?=json_encode($APPLICATION->GetCurPage())?>;
	console.log(curPage);
	document.querySelectorAll("a[data-url]").forEach(function(item, i, arr) {
		if (curPage == item.dataset.url) {
			let span = document.createElement('span');
			item.prepend(span);
		}
	});
</script>
