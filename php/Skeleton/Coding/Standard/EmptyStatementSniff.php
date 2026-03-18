<?php
/**
 * This sniff class detected empty statement.
 *
 * This sniff implements the common algorithm for empty statement body detection.
 * A body is considered as empty if it is completely empty or it only contains
 * whitespace characters and/or comments.
 *
 * <code>
 * stmt {
 *   // foo
 * }
 * stmt (conditions) {
 *   // foo
 * }
 * </code>
 *
 * @author    Manuel Pichler <mapi@manuel-pichler.de>
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2007-2014 Manuel Pichler. All rights reserved.
 * @license   https://github.com/PHPCSStandards/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */

namespace Skeleton\Coding\Standard;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Util\Tokens;

class EmptyStatementSniff extends PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\EmptyStatementSniff
{


    /**
     * Registers the tokens that this sniff wants to listen for.
     *
     * @return array<int|string>
     */
    public function register()
    {
        return [
            T_TRY,
            
            // We don't need T_CATCH
            // T_CATCH,
            T_FINALLY,
            T_DO,
            T_ELSE,
            T_ELSEIF,
            T_FOR,
            T_FOREACH,
            T_IF,
            T_SWITCH,
            T_WHILE,
            T_MATCH,
        ];

    }//end register()

}//end class
