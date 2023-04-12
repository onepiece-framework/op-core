Trait of OP
===

## OP_CORE

## OP_UNIT

### Debug

 The "Debug" method first call the "_PreDebug" method.

## OP_SESSION

## OP_COOKIE

## OP_CI

 Automatically runs CI. 
 All you have to do is "use" of OP_CI.

### Usage

```
<?php
//  ...
namespace OP;

//  ...
class Config
{
    //  use
    use OP_CORE, OP_CI;
}
```
