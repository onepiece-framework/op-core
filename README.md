The onepiece-framework's Core for PHP7
===

# A lot has changed in 2022

 * CI
 * OP

## CI

 If the code does not pass the inspection, Can not be PUSH!

## OP

 1. The OP is dynamically load the function!
 2. All functions can be called cross the Namespace!

### Example

 Functions are dynamically loaded.

```php
//	...
namespace OP;

//	...
OP::Template('index.phtml');
```

 Can use cross the Namespace.

```php
//	...
namespace OP\UNIT;

//	...
OP()->Template('index.phtml');
```

 Can call the Unit directly.

```php
//	...
namespace OP\UNIT;

//	...
OP()->Template()->Get('index.phtml');
```

# README 2016

## The generations as changed.

 We should throw away old codes.

### We will not support these.

 * PHP version 4 and 5 code.
 * Mobile Phone.
 * Windows

## The NewWorld is a new world.

 * Intuitive file structure
 * Html path through

### Intuitive file structure

 You will not hesitate.

### Html path through

 HTML file does not need a controller (endpoint).
 Of course it will be layout.

## Developers friendly

 Very easy to develop.

## Codeing Rule

 1. We not use version numbering.<br/>
    We have adopted rolling update for more than 10 years.
 1. We do not follow the strict English grammar.<br/>
    For example, articles and plurals.
 1. Private method names begin with an underscore.<br/>
    It is because does not get in the way with input completion.
 1. We use tabs at the beginning of the line.<br/>
    It will not collapse at the beginning of the line.
