# PHP: code validation

As our internal code is hosted on GitLab, we generally use the GitLab CI
features.

This document, however, can document other code validation method should these
become useful at some point.

## GitLab CI

We use a simple lint check to validate the syntax of all `.php` files. In
addition, we use [PHP Insights](https://phpinsights.com/) to do an in-depth
analysis of the code.

### Configuration

Drop the example file below as `.gitlab-ci.yml` into the root of your project,
and the `insights.php` file into the `util/bin` directory.

Note that the `insights.php` file can live anywhere, but do not forget to adjust
the configuration in the `.gitlab-ci.yml` file accordingly.

The `.gitlab-ci.yml` defines what should be the minimum score for each category
separately. By default, it is set to the following values:

* Minimum quality: 37
* Minimum complexity: 15
* Minimum architecture: 52
* Minimum style: 31

These numbers are quite low by default, and can be tailored according to the
result of the test.

If you start with a fresh project, you can start with the options
--min-quality=80 --min-complexity=90 --min-architecture=75 --min-style=95.

When you want to improve the code quality of an existing (and large) project for
which the code needs to be optimized quite extensively, it might be better to
start with lower values, and increase the values step by step.

#### `.gitlab-ci.yml`

```yml
include:
  - template: Code-Quality.gitlab-ci.yml

stages:
  - quality

lint:
  stage: quality
  image:
    name: php:7.4-cli
  script:
    - shopt -s globstar
    - set -e
    - for x in **/*.php; do php -l "$x"; done

code_quality:
  stage: quality
  image:
    name: nunomaduro/phpinsights
    entrypoint: [""]
  script: /usr/bin/phpinsights --min-quality=37 --min-complexity=15 --min-architecture=52 --min-style=31 --no-interaction --config-path=util/bin/insights.php --format=codeclimate > codeclimate-report.json
  artifacts:
    paths:
      - "./codeclimate-report.json"
    reports:
      codequality: codeclimate-report.json
```

#### `insights.php`

Find the file here: [phpinsights.php](phpinsights.php).


