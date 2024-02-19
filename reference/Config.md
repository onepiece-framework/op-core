Config
===

# Directory

 Files placed in `asset:/config/*.php` will be loaded automatically.
 Dot files is not load.
 Underbar files is private file.

# Usage

## Get

Get Layout configuration.

```php
$layout_config = OP()->Config('Layout');
```

## Set

Set the layout name to use.

```php
OP()->Config('Layout', ['name'=>'develop']);
```

# Technical information

## Load order

 1. Local default config: Each unit config.php
 1. App default config: asset:/config/*.php
 1. Customize config: asset:/config/_*.php

## Structure

```php
$config = OP()->Config(string $name, ?array $config=null) : array {
    //  Wrap Env::Config()
    return Env::Config($name, $config) : array {
        //  If has config.
        if( $config ){
            //  Setter
            return Config::Set(string $name, array $config) : void {
                //  Overwrite to static variable.
                foreach( $config as $index => $value ){
                    self::$_config[$name][$index] = $value;
                }
            }
        }else{
            //  Getter
            return Config::Get(string $name) : void {
                // Check initialized.
                if( empty($_config[$name]) ){
                    //  Load standard config.
                    self::$_config[$name] = include("asset:/config/{$name}.php");
                    //  Load private config.
                    foreach( include("asset:/config/_{$name}.php") as $index => $value ){
                        self::$_config[$name][$index] = $value;
                    }
                }
                return self::$_config[$name];
            }
        }
    }
}
```
