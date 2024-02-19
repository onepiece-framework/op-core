Cookie of onepiece-framework
===

 The onepiece-framework's cookie feature is very secure.

1. Cookie name is encrypted. To end user is uncertain.
2. Cookie value is encrypted too. End users can not change it.
3. Cookie is separated from other app. Can not access from other app.

# Usage

```php
//  Set cookie value.
OP()->Cookie('count', 1);

//  Get cookie value.
$count = OP()->Cookie('count');
```
