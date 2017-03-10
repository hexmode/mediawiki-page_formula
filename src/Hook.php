<?php

/*
 * Copyright (C) 2017  Mark A. Hershberger
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace PageNameFormula;

use DatabaseUpdater;

class Hook {

	/**
	 * Hook to update extension
	 * @param DatabaseUpdater $updater db handle
	 */
	public static function onLoadExtensionSchemaUpdates(
		DatabaseUpdater $updater
	) {
		$updater->addExtensionTable( 'mapping',
									 __DIR__ . '/../sql/mapping.sql' );
	}

	/**
	 * Set up functions
	 *
	 * @param Parser $parser parser
	 */
	public static function onParserFirstCallInit( $parser ) {
		// These functions accept DOM-style arguments
		$parser->setFunctionHook( 'page_name_formula', 'PageNameFormula\Hook::Formula' );
	}

	/**
	 * Prove it works
	 * @param Parser $parser the parser
	 * @param string $formula for the page
	 * @return string
	 */
	public static function Formula( $parser, $formula = '' ) {
		return "hey";
	}
}
