D
===

 "D" is debug function for developer.
 "D" is display the variable in a very easy to readable form.
 In very common cases, developer will forget to turn off the debugging output.
 For example `var_dump`.
 But The "D" is only visible to developers.
 In other words, It is useful for live cording on the production server.
 Because the debug information is not visible to anyone but you.

# Usage

 This code can also be used on a production server.
 Debug information is only visible to developer.

```php
D($_SESSION);
```

# Internal information

## How do you do that?

 "D" is check the visitor's IP address.
 Display debug information if it matches an IP address registered in the config file.
 The config file is located at `asset:/config/admin.php`.

# Technical information

 1. Pass the variable you want to display on the screen to the D function.
 2. The D function checks if you are the admin.
 3. If you are not admin, does not display anything.
 4. If you are an admin, takes over to "OP\UNIT\Dump".
