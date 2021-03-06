<?php

namespace WebChemistry\Images\Parsers;


use WebChemistry\Images\Parsers\Tokenizers\Token;

class ParserException extends \Exception {

	public static function convertType($type) {
		if ($type === NULL) {
			return 'NULL';
		}
		switch ($type) {
			case Token::VALUE:
				return 'value';
			case Token::COLON:
				return 'colon';
			case Token::BRACKET_LEFT:
				return 'bracket left';
			case Token::BRACKET_RIGHT:
				return 'bracket right';
			case Token::COMMA:
				return 'comma';
			case Token::PIPE:
				return 'pipe';
		}

		throw new ParserException();
	}

	public static function typeError($expected, $given) {
		$expected = self::convertType($expected);
		$given = self::convertType($given);
		throw new ParserException("Expected $expected, given $given.");
	}

}
