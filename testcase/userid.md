The "UserID" is stored to cookie.
===

 A unique user ID is saved to the Cookie.

# Usage

```
echo Cookie::UserID();
```

# Logic

```
$user_id = md5($_SERVER['REMOTE_ADDR'].', '.microtime());
```
