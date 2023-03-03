CD technical information
===

# Options

| Option name | type    | Gist |
| ---         | ---     | ---  |
| remote      | string  | Specifies the remote destination for git push. Can specify "*". |
| branch      | string  | Specifies the branch to git push. Can specify "*".              |
| force       | integer | Add --force option to git push.                                 |
| display     | integer | Display progress information.                                   |
| debug       | integer | Display debug information.                                      |

# Config

| Option name     | type    | Gist |
| ---             | ---     | ---  |
| github          | string  | GitHub webhook settings.   |
| github > secret | string  | GitHub webhook secret key. |
