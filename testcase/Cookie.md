The "Cookie" class
===

 The "Cookie" class is easy to save and get values from the "Cookie".
 The values saved by the "Cookie" class are encrypted. So can not be view and update on the user side.

```php
namespace OP;
Cookie::Set('foo', 'bar');
echo Cookie::Get('foo');
```

 The "Cookie" class can generate a unique ID.

```php
echo Cookie::UserID();
```
