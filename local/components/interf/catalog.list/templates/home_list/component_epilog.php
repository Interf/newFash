<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

switch ($_GET["sort"]) {
	case 'price_asc':
	?>
	<script>document.querySelector('li[data-sort="price_asc"]').classList.add("active")</script>
	<?php
	break;
	case 'price_desc':
	?>
	<script>document.querySelector('li[data-sort="price_desc"]').classList.add("active")</script>
	<?php
	break;

	default:
	?>
	<script>document.querySelector('li[data-sort="new"]').classList.add("active")</script>
	<?php
	break;
}
