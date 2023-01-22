Template
===

```php
//	Load the files in the asset:/template directory.
OP::Template('in_template_directory_file_name.phtml');

//	You can specify files in the current directory.
OP::Template('file_name.phtml');

//	You can specify files below the current directory.
OP::Template('./dir/file_name.phtml');

//	You can not specify files above the current directory.
OP::Template('../file_name.phtml');

//	You can specify a meta root file path.
OP::Template('app:/dir/file_name.phtml');
```
