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

# Structure

## Wrap order

1. OP::Config()
1. Env::Config()
1. Config.class.php

## Load priority

1. Unit default config.
2. App default config.
3. ~~Layout default config.~~
4. Private config.

## Code of conception

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
                    self::$_config[$name] = array_merge(
                        //  Base is unit default config.
                        include("asset:/unit/{$name}/config.php"),
                        //  Overwrite app default config.
                        include("asset:/config/{$name}.php"),
                        //  Overwrite layout config.
                        include("asset:/layout/{$layout_name}/config/{$name}.php"),
                        //  Overwrite private config.
                        include("asset:/config/_{$name}.php")
                    );
                }
                return self::$_config[$name];
            }
        }
    }
}
```
