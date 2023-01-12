Config
===

# Usage

```php
$config = OP->Config(string $key, ?array $config=null) : array {
    return Env::Config($key, $config) : array {
        if( $config ){
            return Config::Set($key, $config);
        }else{
            return Config::Get($key);
        }
    }
}
```
