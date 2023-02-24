About the MetaRoot
===

 The MetaRoot is abstracts paths by metaifying.
 `OP()->MetaRoot()` methods can register and get a meta root path.

# Usage

## Register

```php
$meta_lable = 'api';
$real_path  = '/var/www/public_html/api';
OP()->MetaRoot( $meta_lable, $real_path );
```

## Get real path from meta label

```php
$api_root_path = OP()->MetaRoot( 'api' );
```

# Technical information

| Label | Path example | Description |
| --- | --- | --- |
| app   | /var/www/htdocs/apps/2022/  ||
| doc   | /var/www/htdocs/            ||
| asset | /var/www/htdocs/apps/asset/ ||
| git   | /var/www/htdocs/            ||
