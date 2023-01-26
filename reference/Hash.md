You can get Hash in JavaScript 
===

```JS
(async function(){
    let hash = await $OP['Hash']('あいうえお','SHA-1');
    console.log(hash);
})();
```

```JS
$OP['Hash']('あいうえお').then(hash => document.querySelector('#sha256-2').innerText = hash);
```
