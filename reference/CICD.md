CI/CD
===

 The gist of each file is as follows.

 * ci.sh  - Call from "git push". Check saved commit id.
 * ci.php - Do inspect and save commit id.
 * cd.php - Do "git push" if correct commit id.
 * cicd   - First run "ci.php", followed by "cd.php".

# cicd

 Run ci.php and cd.php in succession.

```sh
./cicd
```

# ci.sh

 1. Runs before: `git push`
 2. Read to: `.ci_commit_id_{$branch_name}_PHP{$version}`
 3. If unmatch saved Commit ID and current Commit ID, then reject to push.

```sh
sh ci.sh
```

# ci.php

 1. Inspection of Code.
 2. Inspection is all classes and all methods.
 3. Inspection config is in the ci directory.
 4. If passes inspection, it will save the commit id with the following file name: `.ci_commit_id_{$branch_name}_PHP{$version}`
 5. And "ci.sh" and "cd.php" check if the saved commit id is correct.

```php
php ci.php
```

# cd.php

1. Read to: `.ci_commit_id_{$branch_name}_PHP{$version}`
2. Check if match saved Commit ID and current Commit ID.
3. If the Commit ID match, Do a "git push".

```php
php cd.php
```
