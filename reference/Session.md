Session of onepiece-framework
===

## Feature

  Separated for each app and unit.
  Separation by namespace prevents conflicts between different app on the same domain. 

## Usage

  Direct using Session class.

```php
//  Get
$count = Session::Get('count');

//  Count up
$count++;

//  Set
Session::Set('count', $count);
```

  Wrap it in the OP class.

```php
//  Get
$count = OP()->Session('count');

//  Set
$count = OP()->Session('count', $count + 1);
```

  Each Unit

```php
//  Get
$count = OP()->Unit('App')->Session('count');

//  Set
$count = OP()->Unit('App')->Session('count', $count + 1);
```
