<?php

if ( ! function_exists( 'orbis_price' ) ) {
	/**
	 * Format price
	 *
	 * @param float $price
	 * @return string
	 */
	function orbis_price( $price ) {
		$return = '';

		if ( is_numeric( $price ) ) {
			$currency_code   = get_option( 'orbis_currency' );
			$currency_symbol = '';

			switch ( $currency_code ) {
				case 'EUR' :
					$currency_symbol = '€';

					break;
				case 'USD':
					$currency_symbol = '$';

					break;
			}

			$return .= $currency_symbol;
			$return .= '&nbsp;';

			$return .= number_format_i18n( $price, 2 );
		}

		return $return;
	}
}

if ( ! function_exists( 'orbis_time' ) ) {
	/**
	 * Format time
	 *
	 * @param int $seconds
	 * @param string $format
	 * @return mixed
	 */
	function orbis_time( $seconds, $format = 'HH:MM' ) {
		// @see http://stackoverflow.com/a/3856312
		$hours   = floor( $seconds / 3600 );
		$minutes = floor( ( $seconds - ( $hours * 3600 ) ) / 60 );
		$seconds = floor( $seconds % 60 );

		$search  = array(
			'HH',
			'H',
			'MM',
			'M',
			'SS',
			'S',
		);

		$replace = array(
			sprintf( '%02d', $hours ),
			$hours,
			sprintf( '%02d', $minutes ),
			$minutes,
			sprintf( '%02d', $seconds ),
			$seconds,
		);

		return str_replace( $search, $replace, $format );
	}
}
