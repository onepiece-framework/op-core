Option
===

# dry-run

  Test mode of code inspection.

```
./cicd dry-run=1
```

## CI

 * Do git save doesn't
 * Does not store commit ID

## CD

  Do nothing.

# force

```
./cicd force=1
```

## CI

  Force code inspection.

## CD

  Force git push.

# remote 

## CI

  Do nothing.

## CD

  Can specify git push remote.

```
./cicd remote=upstream
```

  Can specify all remote.

```
./cicd remote=*
```

# branch

## CI

  Do nothing.

## CD

  Can specify git push branch.

```
./cicd branch=2024
```

  Can specify all branch.

```
./cicd branch=*
```

# unit

  Only specified unit can be inspected.
  And dry-run will be 1.

```
./cicd unit=app
```

  Can specify op-core.

```
./cicd unit=core
```

# class

  Can specify class in unit.

```
./cicd unit=app class=App
```

# method

  Can specify method in class.

```
./cicd unit=app class=App method=Title
```
