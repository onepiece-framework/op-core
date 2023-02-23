The onepiece-framework's core libraries
===

# A lot has changed in 2022

## OP

 Borned `OP()` function.

 1. `OP()` function works everywhere, Beyond Namespaces.
 2. Load "OP functions" dynamically. And, Can be used cross the Namespace.

### Example

 Functions are dynamically loaded.

```php
//	...
namespace OP;

//	...
OP()->Template('index.phtml');
```

 Can use cross the Namespace.

```php
//	...
namespace OP\UNIT;

//	...
OP()->Template('index.phtml');
```

 More information can be found in the Reference.

## CI/CD

 If the code does not pass the inspection, Can not be PUSH.

 More information can be found in the Reference.
