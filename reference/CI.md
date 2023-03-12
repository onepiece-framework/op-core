CI technical information
===

# Options

| Option name | type    | Gist |
| ---         | ---     | ---  |
| branch      | string  | Specifies the branch to git push. Can specify "*".              |
| force       | integer | Delete the inspected Commit ID files and re-inspect it.         |
| display     | integer | Display progress information.                                   |
| debug       | integer | Display debug information.                                      |

<!-- Does not work yet
# Config

| Option name     | type    | Gist |
| ---             | ---     | ---  |
| testcase        | string  | Access from the web to each testcase directory. |
| testcase > port | string  | Can specify port number.                        |
-->

# Routine

 1. In each submodule directory, ci.php is executed.
 1. Every time ci.php is executed, CI::Auto() executed.
