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
		'migration/',
		'lib/component/FpdiPdfParser',
	],
	'add' => [
	],
	'remove' => [
		PHP_CodeSniffer\Standards\PSR1\Sniffs\Methods\CamelCapsMethodNameSniff::class,
		PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer::class,
		SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff::class,
		PHP_CodeSniffer\Standards\Generic\Sniffs\WhiteSpace\DisallowTabIndentSniff::class,
		// Public properties are allowed
		SlevomatCodingStandard\Sniffs\Classes\ForbiddenPublicPropertySniff::class,
		/**
		 * get_class($object)
		 * Enable after support of PHP8
		 * https://github.com/slevomat/coding-standard/issues/1483
		 */
		SlevomatCodingStandard\Sniffs\Classes\ModernClassNameReferenceSniff::class,
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
