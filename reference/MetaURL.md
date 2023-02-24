"MetaURL" abstracts URL
===

 This is convenient when the installation destination of the OP application differs depending on the environment.

# Usage

```php
//  Application root URL.
$url = OP()->MetaURL('app:/login/');

//  Document root URL.
$url = OP()->MetaURL('doc:/login/');
```

# Technical information

 You can check the registered "meta-path" as follows.
 See the "MetaRoot" reference for information on each "meta-label".

```php
D( OP()->MetaRoot() );
```
