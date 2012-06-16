<?php
namespace Otp;

/**
 * Interface for HOTP and TOTP
 *
 * HMAC-Based One-time Password(HOTP) algorithm specified in RFC 4226
 * @link https://tools.ietf.org/html/rfc4226
 *
 * Time-based One-time Password (TOTP) algorithm specified in RFC 6238
 * @link https://tools.ietf.org/html/rfc6238
 *
 * @version 2011.06.11.19.26
 * @author Christian Riesen <chris.riesen@gmail.com>
 * @link http://christianriesen.com
 */

interface OtpInterface
{
	/**
	 * Returns OTP using the HOTP algorithm
	 *
	 * @param string $secret
	 * @param integer $counter
	 * @return string One Time Password
	 */
	function hotp($secret, $counter);
	
	/**
	 * Returns OTP using the TOTP algorithm
	 *
	 * @param string $secret
	 * @param integer $timecounter Optional: Uses current time if null
	 * @return string One Time Password
	 */
	function totp($secret, $timecounter = null);
	
	/**
	 * Checks Hotp against a key
	 *
	 * This is a helper function, but is here to ensure the Totp can be checked
	 * in the same manner.
	 *
	 * @param string $secret
	 * @param integer $counter
	 * @param string $key
	 *
	 * @return boolean If key is correct
	 */
	function checkHotp($secret, $counter, $key);
	
	/**
	 * Checks Totp agains a key
	 *
	 * Should implement a time drift check (before and after the actual current
	 * key)
	 *
	 * @param string $secret
	 * @param integer $key
	 *
	 * @return boolean If key is correct
	 */
	function checkTotp($secret, $key);
}