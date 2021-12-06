# Notes

## Sym CLI

To use HTTPS locally, we also need to install a CA to enable TLS support.
Run the following command:
$ symfony server:ca:install

Check that your computer has all needed requirements by running the
following command:
$ symfony book:check-requirements

```
symfony composer
```

symfony new guestbook --version=5.0

---
### Git Branching
The default branch has been renamed!
master is now named mast

If you have a local clone, you can update it by running the following commands.
```
git branch -m master mast
git fetch origin
git branch -u origin/mast mast
git remote set-head origin -a
```
---


```
symfony project:init
```
This command creates a few files needed by SymfonyCloud, namely
.symfony/services.yaml, .symfony/routes.yaml, and .symfony.cloud.yaml.

---

symfony composer req profiler --dev 

symfony console list make

