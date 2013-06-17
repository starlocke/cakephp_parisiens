<script type="text/javascript" src="/js/Markdown.Converter.js"></script>

<div id="readme"><?php passthru('cat '.APP.'/README.md'); ?></div>

<script type="text/javascript">
	var converter = new Markdown.Converter();
	var markdown = converter.makeHtml(document.getElementById("readme").innerHTML);
	document.getElementById("readme").innerHTML = markdown;
</script>
