CI/CD
===

# How to use

 The cicd is run ci.php, to be continued run cd.php.

```sh
./cicd
```

 The above is equivalent to:

```sh
php ci.php
php cd.php
```

 An arguments of cicd are carried over to ci.php and cd.php.
 See the "ci" and "cd" references for a list of arguments.

```sh
./cicd display=1 debug=1
```

# Technical information

 The gist of each file is as follows.

 * ci.sh  - Call from "git push". Check saved commit id.
 * ci.php - Do inspect and save commit id.
 * cd.php - Do "git push" if correct commit id.
 * cicd   - First run "ci.php", followed by "cd.php".

## ci.sh

 1. Runs before: `git push`
 2. Read to: `.ci_commit_id_{$branch_name}_PHP{$version}`
 3. If unmatch saved Commit ID and current Commit ID, then reject to push.

```sh
sh ci.sh
```

 For "ci.sh" there is more deep information. See "For maintainer information".

## ci.php

 1. Inspection of Code.
 1. Inspection is committed code only.
 2. Inspection is all classes and all methods.
 3. Inspection config is in the ci directory.
 4. If passes inspection, it will save the commit id with the following file name: `.ci_commit_id_{$branch_name}_PHP{$version}`
 5. And "ci.sh" and "cd.php" check if the saved commit id is correct.
 6. You can also inspect your code before committing it: `ci.php test=1`

```php
php ci.php
```

## cd.php

1. Read to: `.ci_commit_id_{$branch_name}_PHP{$version}`
2. Check if match saved Commit ID and current Commit ID.
3. If the Commit ID match, Do a "git push".

```php
php cd.php
```

# Trouble Shooting

## Can not delete branch

 The following commands are rejected: `git push origin :branch_name`

 1. `git switch branch_name`
 2. `php ci.php`
 3. `git push origin branch_name --delete`

# For maintainers information

 "ci.sh" is check the Commit ID you are about to push.
 If you were using the PHP version as the branch name, for example "php70", you would have to do something like this: `php70 cicd`
