AppID
===

 AppID is Unique Application ID.
 It is used for Session, Cookie, Crypt, etc.
 An Application running on the same physical server is need to split by AppID.

```php
OP::AppID(){
    return Env::AppID(){
        return Config::Get('app_id')['app_id'];
    }
}
```
