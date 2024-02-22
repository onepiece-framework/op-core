"MetaPath" abstracts file path
===

 This is convenient when the installation destination of the OP application differs depending on the environment.

# Usage

  Register Meta-Path by Meta-Label.

```php
OP()->MetaPath()->Set('test', __DIR__);
```

  Get registerd Meta-Path by Meta-Label.

```php
$real_path = OP()->MetaPath()->Get('test');
```

  Convert from Meta-Path to real path.

```php
$path = OP()->MetaPath('test:/foo/bar');
```

  In case of use to URL.

```php
$ = OP()->MetaPath('test:/foo/bar', true);
```

  Convert to Meta-Path from real path.

```php
$meta_path = OP()->MetaPath(__DIR__);
```

 To "Template" function can pass meta path.

 ```php
OP()->Template('app:/index.phtml');
```

# Technical information

 You can check the registered "meta-path" as follows.
 See the "MetaRoot" reference for information on each "meta-label".

```php
D( OP()->MetaRoot() );
```
