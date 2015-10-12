<?php

class stringParser extends bbCode
{
	/*
	*
	* constructor
	*
	*/

	public function __construct ()
	{
		parent::__construct ();
	}


	/*
	* ( // temporary descriptions.... just for me, more info will follow )
	*/

	public function loadString ( $string, $tags )
	{
		$i = 0; // next key, for $returnString[$i]

		$returnString = array (); // our ouput container

		$nextPosition = 0; // our next possibile bbcode position

		$handleChange = 1; // our switch control variable

		$stringLength = strlen ( $string ); // the length of our string

		$openNo_Close = array (); // bbcode(s) that have a opening tag, but no closing tag

		$closeNo_Open = array (); // bbcode(s) that have a closinging tag, but no opening tag

		do
		{
			switch ( $handleChange )
			{
				case 1: // start looking for the next possibile tag

				break;

				case 2: // closing tag || opening tag without option ( possibile )

				break;

				case 3: // text within tag

				break;

				case 4: // opening tag with option ( possibile )

				break;
			}

		} while ( $nextPosition < $stringLength );

		// more to come...
	}
}

?>

