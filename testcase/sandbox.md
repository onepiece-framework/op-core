
Sandbox is an isolated environment.

```php
$foo = 1;
$bar = 'test';
$obj = new StdObject();
$result = OP::Sandbox('test.php', $foo, $bar, $obj);
```

```test.php
$args = get_defined_vars();
D($args);

//	...
$foo = $args['foo'];
$foo = $args['foo'];
$foo = $args['foo'];
```
