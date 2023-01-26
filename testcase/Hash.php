<span id="sha256-1">(empty)</span><br/>
<span id="sha256-2">(empty)</span><br/>
<span>fdb481ea956fdb654afcc327cff9b626966b2abdabc3f3e6dbcb1667a888ed9a</span><br/>
<span><?= hash('sha256', 'あいうえお'); ?></span><br/>
<script>
//	...
async function sha256(text){
	const uint8  = new TextEncoder().encode(text)
	const digest = await crypto.subtle.digest('SHA-256', uint8)
	return Array.from(new Uint8Array(digest)).map(v => v.toString(16).padStart(2,'0')).join('')
}
sha256('あいうえお').then(hash => document.querySelector('#sha256-1').innerText = hash);

//	...
window.addEventListener('DOMContentLoaded', () => {
	$OP['Hash']('あいうえお').then(hash => document.querySelector('#sha256-2').innerText = hash);
});
</script>
