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
		'lib/component/FpdiPdfParser',
		'migration',
	],
	'add' => [
	],
	'remove' => [
		PHP_CodeSniffer\Standards\PSR1\Sniffs\Methods\CamelCapsMethodNameSniff::class,
		PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer::class,
		SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff::class,
		PHP_CodeSniffer\Standards\Generic\Sniffs\WhiteSpace\DisallowTabIndentSniff::class,
		NunoMaduro\PhpInsights\Domain\Insights\ForbiddenGlobals::class,
		SlevomatCodingStandard\Sniffs\Classes\ModernClassNameReferenceSniff::class,
		PHP_CodeSniffer\Standards\Squiz\Sniffs\Classes\ValidClassNameSniff::class,
		NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class,
		PHP_CodeSniffer\Standards\PSR1\Sniffs\Classes\ClassDeclarationSniff::class,
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
		PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff::class => [
			'spacing' => 0,
		],
		PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterCastSniff::class => [
			'spacing' => 0,
		],
		SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class => [
			'linesCountBetweenDifferentAnnotationsTypes' => 0,
			'linesCountBetweenAnnotationsGroups' => 0,
		],
		PhpCsFixer\Fixer\CastNotation\CastSpacesFixer::class => [
			'space' => 'none',
		],
		NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class => [
			'maxComplexity' => 10,
			'exclude'	   => [
			],
		],
		\SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff::class => [
			'maxLinesLength' => 40,
		],
	],
	'requirements' => [
		'min-quality' => 39.2,
		'min-architecture' => 64.3,
		'min-style' => 28.8,
		'min-complexity' => 13.2,
	],
	'diff_context' => 10,
];

