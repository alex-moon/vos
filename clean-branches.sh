#!/bin/bash
branch_to_compare="main"

git fetch -p
git branch --v | grep "\[gone\]" | awk '{print $1}' | xargs git branch -D

git checkout $branch_to_compare
git pull origin $branch_to_compare
for branch in `git branch -r | sed 's~origin/~~g' | grep -v HEAD`; do
    if [[ "$branch_to_compare" == "$branch" ]]; then continue; fi

    git checkout $branch
    git pull origin $branch
    git merge --no-edit $branch_to_compare
    if (( $? != 0 )); then
        git merge --abort
        continue;
    fi
    if [[ -z "`git diff $branch_to_compare`" ]]; then
        git checkout $branch_to_compare
        # echo DELETE $branch
        git branch -D $branch
        git push origin :$branch
    fi
done

git checkout $branch_to_compare

for branch in `git branch --merged | sed 's/\* //g'`; do
    if [[ "$branch_to_compare" == "$branch" ]]; then continue; fi

    git checkout $branch
    git merge --no-edit $branch_to_compare
    if (( $? != 0 )); then
        git merge --abort
        continue;
    fi
    if [[ -z "`git diff $branch_to_compare`" ]]; then
        git checkout $branch_to_compare
        # echo DELETE $branch
        git branch -D $branch
        git push origin :$branch
    fi
done

git checkout $branch_to_compare
