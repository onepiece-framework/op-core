"MetaPath" abstracts file path
===

 This is convenient when the installation destination of the OP application differs depending on the environment.

# Usage

```php
$path = OP()->MetaPath('app:/index.phtml');
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
