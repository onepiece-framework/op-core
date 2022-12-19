Sandbox is an isolated environment.
===

# Specification

 1. Behavior differs depending on the extension.
 1. Only one set of php tags is allowed.
    If you want to output the variables in the template file, use the Smoke notation --> `{{ $var }}`.

## the Smoke notation

  The Smoke notation is automatically encode entities.

```phtml
<p>{{ $message }}</p>
```

## Behavior differs depending on the extension

### php

 1. Not output to external. 
    All execution results are returned values. 
    It also return output.

### phtml

 1. Run as a template.
    html is output as is.

# Usage

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
