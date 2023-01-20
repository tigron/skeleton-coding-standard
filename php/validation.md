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

```php
<?php

declare(strict_types=1);

use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenDefineGlobalConstants;
use NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits;
use NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\EmptyStatementSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\PHP\NoSilencedErrorsSniff;
use SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DisallowArrayTypeHintSyntaxSniff;
use SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff;

return [
	'preset' => 'default',
	'exclude' => [
		'lib/external/',
		'tmp/',
		'util/',
		'store/',
		'migration/'
	],
	'remove' => [
		PHP_CodeSniffer\Standards\PSR1\Sniffs\Methods\CamelCapsMethodNameSniff::class,
		PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer::class,
		SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff::class,
		PHP_CodeSniffer\Standards\Generic\Sniffs\WhiteSpace\DisallowTabIndentSniff::class,
	],
	'config' => [
		ForbiddenDefineGlobalConstants::class => [
			'ignore' => [
				'PHP_CODESNIFFER_VERBOSITY',
				'PHP_CODESNIFFER_CBF',
			],
		],
		LineLengthSniff::class => [
			'lineLimit' => 120,
			'absoluteLineLimit' => 120,
			'ignoreComments' => true,
		],
		PhpCsFixer\Fixer\Basic\BracesFixer::class => [
			'allow_single_line_closure' => true,
			'position_after_anonymous_constructs' => 'same', // possible values ['same', 'next']
			'position_after_control_structures' => 'same', // possible values ['same', 'next']
			'position_after_functions_and_oop_constructs' => 'same',
			'indent' => '	',
		],
		PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer::class => [
			'closure_function_spacing' => 'none',
		],
	],
	'requirements' => [
		'min-quality' => 90.0,
		'min-architecture' => 85.0,
		'min-style' => 98.0,
	],
	'diff_context' => 10,
];
```
