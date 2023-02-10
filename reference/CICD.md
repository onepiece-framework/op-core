CD/CD
===

 * ci.sh  - Call from `git push`. Check saved commit id.
 * ci.php - Do inspect and save commit id.
 * cd.php - Do `git push` if correct commit id.
 * cicd   - First run `ci.php`, followed by `cd.php`.

# ci.sh

 Runs before `git push`.
 Read to .ci_commit_id_{$branch_name} file.
 If unmatch commit id then reject to push.

```sh
sh ci.sh
```

# ci.php

 Generate .ci_commit_id_{$branch_name} file.
 Write in commit id of target branch after passing the inspection.

```php
php ci.php
```

# cd.php

 Read .ci_commit_id_{$branch_name} file.
 Do `git push origin {$branch_name}` if match commit id

```php
php cd.php
```

# cc

 Run ci.php and cd.php in succession.

```sh
./cicd
```
