# Essential Git Commands

## Basic Commands
- **Initialize a Git Repository**
  - `git init`

- **Clone a Repository**
  - `git clone <repository-url>`

- **Check the Status of the Working Directory**
  - `git status`

- **Add Files to Staging Area**
  - `git add <file>` (Add a specific file)
  - `git add .` (Add all files)

- **Commit Changes**
  - `git commit -m "commit message"`

- **Show Commit History**
  - `git log`

## Branching and Merging
- **Create a New Branch**
  - `git branch <branch-name>`

- **Switch to a Branch**
  - `git checkout <branch-name>`

- **Create and Switch to a New Branch**
  - `git checkout -b <branch-name>`

- **Merge a Branch**
  - `git merge <branch-name>`

- **Delete a Branch**
  - `git branch -d <branch-name>`

## Remote Repositories
- **Add a Remote Repository**
  - `git remote add origin <repository-url>`

- **View Remote Repositories**
  - `git remote -v`

- **Push Changes to Remote Repository**
  - `git push origin <branch-name>`

- **Pull Changes from Remote Repository**
  - `git pull origin <branch-name>`

- **Fetch Changes from Remote Repository**
  - `git fetch origin`

## Undoing Changes
- **Unstage a File**
  - `git reset <file>`

- **Discard Changes in a File**
  - `git checkout -- <file>`

- **Amend the Last Commit**
  - `git commit --amend`

## Tagging
- **Create a Tag**
  - `git tag <tag-name>`

- **Push Tags to Remote Repository**
  - `git push origin <tag-name>`

## Miscellaneous
- **Show Changes**
  - `git diff`

- **Show Remote URLs**
  - `git remote show origin`

- **Delete Remote Branch**
  - `git push origin --delete <branch-name>`

- **Rebase Branch**
  - `git rebase <branch-name>`
