AppID
===

 AppID is Unique App ID.
 It is used for Session, Cookie, Crypt, etc.
 AppID is split at each App running on the same physical server.
 AppID is set by `asset:/config/app_id.php`.

# Usage

```php
$app_id = OP()->Env()->AppID();
```

# Conceptual code

```php
OP::AppID(){
    return Env::AppID(){
        return Config::Get('app_id')['app_id'];
    }
}
```
