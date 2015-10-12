<?php

class bbCode
{
	/*
	*
	* @name ( string ), @value ( string ), @access ( protected )
	*
	* this variable value holds the string this class is parsing
	*
	* @access ( public ), no public access!
	*
	*/

	protected $string = '';


	/*
	*
	* @name ( errors ), @value ( array ), @access ( protected )
	*
	* this variable value holds any error(s) that the class parser
	* may have found while trying to parse the $string container
	*
	* @access ( public ), allowed through... get_parser_errors ();
	*
	*/

	protected $errors = array ();


	/*
	*
	* @name ( invalid_tags ), @value ( string ), @access ( protected )
	*
	* should the class parser ( convert ) all bbcode tag(s) that
	* are found to be invalid to text or just ( remove ) those tags!
	*
	* convert = convert all ( invalid ) bbcode tag(s) to text
	*
	* remove = remove all ( invalid ) bbcode tag(s)
	*
	* @access ( public ), allowed through... set_invalid_tags ();
	*
	*/

	protected $invalid_tags = 'remove';


	/*
	*
	* @name ( remove_tags ), @value ( boolean ), @access ( protected )
	*
	* should the class parser remove all empty bbcode tag(s) [url][/url]
	*
	* TRUE = always delete, remove all empty bbcode tag(s) found
	*
	* FALSE = don't remove any empty bbcode tag(s), convert them to text
	*
	* @access ( public ), allowed through... set_remove_tags ();
	*
	*/

	protected $remove_tags = TRUE;


	/*
	*
	* @name ( default_float ), @value ( string ), @access ( protected )
	*
	* this is the default ( float ) option value that the class parser will use
	* if it finds an invalid ( float ) option value in any of the bbcode tag(s)
	* that allow a ( float ) option value to be used as one of it(s) argument(s)
	*
	* @acess ( public ), allowed through... set_default_float ();
	*
	*/

	protected $default_float = 'left';


	/*
	*
	* @name ( allowed_floats ), @value ( array ), @access ( protected )
	*
	* an array containing the allowed ( float ) option value(s) that the class
	* parser uses to validate a ( float ) option value in any of the bbcode tag(s)
	* that allows a ( float ) option value to be used as one of it(s) argument(s)
	*
	* @access ( public ), no public access!
	*
	*/

	protected $allowed_floats = array ( 'center', 'left', 'right' );


	/*
	*
	* @name ( default_font ), @value ( string ), @access ( protected )
	*
	* this is the default ( font ) option value that the class parser uses when
	* it finds a invalid ( font ) option value in the bbcode tag [font][/font]
	*
	* @acess ( public ), allowed through... set_default_font ();
	*
	*/

	protected $default_font = '"times new roman", times, san-serif';


	/*
	*
	* @name ( allowed_fonts ), @value ( array ), @access ( protected )
	*
	* an array containing the allowed ( font ) option value(s) that the class parser
	* will use to validate a ( font ) option value in the bbcode tag [font][/font]
	*
	* @access ( public ), no public access!
	*
	*/

	protected $allowed_fonts = array ( 'arial', 'arial black', 'arial rounded mt bold', 'baskerville', 'book antiqua', 'bookman old style', 'brush script mt', 'comic sans', 'comic sans ms', 'courier', 'courier new', 'cursive', 'gadget', 'garamond', 'geneva', 'georgia', 'gill sans', 'goudy old style', 'helvetica', 'helvetica neue', 'hoefler text', 'impact', 'monaco', 'mono', 'monospace', 'myriad', 'lucida', 'lucida console', 'lucida grande', 'lucida sans', 'lucida sans unicode', 'optima', 'palatino', 'palatino linotype', 'sans-serif', 'serif', 'times', 'times new roman', 'tahoma', 'trebuchet ms', 'verdana' );


	/*
	*
	* @name ( default_color ), @value ( string ), @access ( protected )
	*
	* this variable value is used by the class parser to replace any invalid
	* font color option value it finds in the bbcode tag... [color][/color]
	*
	* @acess ( public ), allowed through... set_default_color ();
	*
	*/

	protected $default_color = '#000000';


	/*
	*
	* @name ( allowed_colors ), @value ( array ), @access ( protected )
	*
	* an array containing all the allowed keyword color option value(s) that the class parser
	* will use to validate a keyword color option value in the bbcode tag... [color][/color]
	*
	* @access ( public ), no public access!
	*
	*/

	protected $allowed_colors = array ( 'black' => '#000000', 'blue' => '#0000ff', 'green' => '#00ff00', 'orange' => '#ffa500', 'purple' => '#663399', 'red' => '#ff0000', 'yellow' => '#ffff00' );


	/*
	*
	* @name ( allow_hex_colors ), @value ( boolean ), @access ( protected )
	*
	* should the class parser allow the usage of # hex ( 3 | 6 ) type color
	* code(s) as a valid option value in the bbcode tag... [color][/color]
	*
	* TRUE = always allow the usage of # hex ( 3 | 6 ) type color code(s) as an option
	*
	* FALSE = don't allow the usage of # hex ( 3 | 6 ) type color code(s) as an option
	*
	* @access ( public ), allowed through... set_allow_hex_colors ();
	*
	*/

	protected $allow_hex_colors = TRUE;


	/*
	*
	* @name ( allow_rgb_colors ), @value ( boolean ), @access ( protected )
	*
	* should the class parser allow the usage of rgb ( 0, 0, 0 ) type color
	* code(s) as a valid option value in the bbcode tag... [color][/color]
	*
	* TRUE = always allow the usage of rgb ( 0, 0, 0 ) type color code(s) as an option
	*
	* FALSE = don't allow the usage of rgb ( 0, 0, 0 ) type color code(s) as an option
	*
	* @access ( public ), allowed through... set_allow_rgb_colors ();
	*
	*/

	protected $allow_rgb_colors = TRUE;


	/*
	*
	* @name ( allowed_sizes ), @value ( array ), @access ( protected )
	*
	* an array containing all the allowed keyword font size(s) that the class parser
	* will use to validate a keyword font size in the bbcode tag... [size][/size]
	*
	* @access ( public ), no public access!
	*
	*/

	protected $allowed_sizes = array ( 'small', 'smaller', 'x-small', 'xx-small', 'medium', 'large', 'larger', 'x-large', 'xx-large' );


	/*
	*
	* @name ( allow_px_sizes ), @value ( boolean ), @access ( protected )
	*
	* should the class parser allow the usage of ( pixel ) type size(s)
	* as another valid option value in the bbcode tag... [size][/size]
	*
	* TRUE = always allow the usage of ( pixel ) type size(s) as a size option
	*
	* FALSE = don't allow the usage of ( pixel ) type size(s) as a size option
	*
	* @access ( public ), allowed through... set_allow_px_sizes ();
	*
	*/

	protected $allow_px_sizes = TRUE;


	/*
	*
	* @name ( min_px_size ), @value ( integer ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* pixel(s), this is the minimum ( integer ) value that a font size
	* value set in pixel(s) can be in the bbcode tag... [size][/size]
	*
	* $min_px_size = 8px = 0.5em = 6pt = 50%;
	*
	* @access ( public ), allowed through... set_min_px_size ();
	*
	*/

	protected $min_px_size = 8;


	/*
	*
	* @name ( max_px_size ), @value ( integer ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* pixel(s), this is the maximum ( integer ) value that a font size
	* value set in pixel(s) can be in the bbcode tag... [size][/size]
	*
	* $max_px_size = 48px = 3.0em = 36pt = 300%;
	*
	* @access ( public ), allowed through... set_max_px_size ();
	*
	*/

	protected $max_px_size = 48;


	/*
	*
	* @name ( default_px_size ), @value ( string ), @access ( protected )
	*
	* this variable value is used to replace a invalid font size
	* value set in pixel(s) in the bbcode tag... [size][/size]
	*
	* @access ( public ), allowed through... set_default_px_size ();
	*
	*/

	protected $default_px_size = '16px';

	/*
	*
	* @name ( allow_em_sizes ), @value ( boolean ), @access ( protected )
	*
	* should the class parser allow the usage of em(s) type size(s)
	* as another valid option value in the bbcode tag... [size][/size]
	*
	* TRUE = always allow the usage of (  em  ) type size(s) as a size option
	*
	* FALSE = don't allow the usage of (  em  ) type size(s) as a size option
	*
	* @access ( public ), allowed through... set_allow_em_sizes ();
	*
	*/

	protected $allow_em_sizes = TRUE;


	/*
	*
	* @name ( min_em_size ), @value ( float ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* em(s), this is the minimum ( float ) value that a font size
	* value set in em(s) can be in the bbcode tag... [size][/size]
	*
	* $min_em_size = 0.5em = 6pt = 50% = 8px;
	*
	* @access ( public ), allowed through... set_min_em_size ();
	*
	*/

	protected $min_em_size = 0.5;


	/*
	*
	* @name ( max_em_size ), @value ( float ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* em(s), this is the maximum ( float ) value that a font size
	* value set in em(s) can be in the bbcode tag... [size][/size]
	*
	* $max_em_size = 3.0em = 36pt = 300% = 48px;
	*
	* @access ( public ), allowed through... set_max_em_size ();
	*
	*/

	protected $max_em_size = 3.0;


	/*
	*
	* @name ( default_em_size ), @value ( string ), @access ( protected )
	*
	* this variable value is used to replace a invalid font size
	* value set in em(s) in the bbcode tag... [size][/size]
	*
	* @access ( public ), allowed through... set_default_em_size ();
	*
	*/

	protected $default_em_size = '1.0em';

	/*
	*
	* @name ( allow_pt_sizes ), @value ( boolean ), @access ( protected )
	*
	* should the class parser allow the usage of ( point ) type size(s)
	* as another valid option value in the bbcode tag... [size][/size]
	*
	* TRUE = always allow the usage of ( point ) type size(s) as a size option
	*
	* FALSE = don't allow the usage of ( point ) type size(s) as a size option
	*
	* @access ( public ), allowed through... set_allow_pt_sizes ();
	*
	*/

	protected $allow_pt_sizes = TRUE;


	/*
	*
	* @name ( min_pt_size ), @value ( integer ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* point(s), this is the minimum ( integer ) value that a font size
	* value set in point(s) can be in the bbcode tag... [size][/size]
	*
	* $min_pt_size = 6pt = 50% = 8px = 0.5em;
	*
	* @access ( public ), allowed through... set_min_pt_size ();
	*
	*/

	protected $min_pt_size = 6;


	/*
	*
	* @name ( max_pt_size ), @value ( integer ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* point(s), this is the maximum ( integer ) value that a font size
	* value set in point(s) can be in the bbcode tag... [size][/size]
	*
	* $max_pt_size = 36pt = 300% = 48px = 3.0em;
	*
	* @access ( public ), allowed through... set_max_pt_size ();
	*
	*/

	protected $max_pt_size = 36;


	/*
	*
	* @name ( default_pt_size ), @value ( string ), @access ( protected )
	*
	* this variable value is used to replace a invalid font size
	* value set in point(s) in the bbcode tag... [size][/size]
	*
	* @access ( public ), allowed through... set_default_pt_size ();
	*
	*/

	protected $default_pt_size = '12pt';


	/*
	*
	* @name ( allow_percent_sizes ), @value ( boolean ), @access ( protected )
	*
	* should the class parser allow the usage of (  %  ) type size(s)
	* as another valid option value in the bbcode tag... [size][/size]
	*
	* TRUE = always allow the usage of (  %  ) type size(s) as a size option
	*
	* FALSE = don't allow the usage of (  %  ) type size(s) as a size option
	*
	* @access ( public ), allowed through... set_allow_percent_sizes ();
	*
	*/

	protected $allow_percent_sizes = TRUE;


	/*
	*
	* @name ( min_percent_size ), @value ( integer ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* (  %  ), this is the minimum ( integer ) value that a font size
	* value set in (  %  ) can be in the bbcode tag... [size][/size]
	*
	* $min_percent_size = 50% = 8px = 0.5em = 6pt;
	*
	* @access ( public ), allowed through... set_min_percent_size ();
	*
	*/

	protected $min_percent_size = 50;


	/*
	*
	* @name ( max_percent_size ), @value ( integer ), @access ( protected )
	*
	* this variable value is used to validate a font size value set in
	* (  %  ), this is the maximum ( integer ) value that a font size
	* value set in (  %  ) can be in the bbcode tag... [size][/size]
	*
	* $max_percent_size = 300% = 48px = 3.0em = 36pt;
	*
	* @access ( public ), allowed through... set_max_percent_size ();
	*
	*/

	protected $max_percent_size = 36;


	/*
	*
	* @name ( default_percent_size ), @value ( string ), @access ( protected )
	*
	* this variable value is used to replace a invalid font size
	* value set in (  %  ) in the bbcode tag... [size][/size]
	*
	* @access ( public ), allowed through... set_default_percent_size ();
	*
	*/

	protected $default_percent_size = '100%';


	/*
	* if ( ! ( px || em || pt || % || keyword ) ), use this...
	*/

	protected $default_size = '1.0em';


	/*
	*
	* constructor
	*
	*/

	public function __construct ()
	{

	}


	public function get_parser_errors ()
	{
		return $this->errors;
	}


	public function set_invalid_tags ( $string = 'remove' )
	{
		if ( in_array ( $string, array ( 'convert', 'remove' ) ) )
		{
			$this->invalid_tags = $string;
		}
	}


	public function set_remove_tags ( $bool = TRUE )
	{
		if ( is_bool ( $bool ) )
		{
			$this->remove_tags = $bool;
		}
	}


	public function set_default_float ( $float = 'left' )
	{
		if ( $this->float_parser ( $float ) )
		{
			$this->default_float = $float;
		}
	}


	public function set_default_font ( $font = '"times new roman", times, san-serif' )
	{
		if ( $this->font_parser ( $font ) )
		{
			$this->default_font = $font;
		}
	}


	public function set_default_color ( $color = '#000000' )
	{
		if ( $this->color_parser ( $color ) )
		{
			$this->default_color = $color;
		}
	}


	public function set_default_size ( $size = '1.0em' )
	{
		if ( $this->size_parser ( $size ) )
		{
			$this->default_size = $size;
		}
	}


	public function set_allow_hex_colors ( $bool = TRUE )
	{
		if ( is_bool ( $bool ) )
		{
			$this->allow_hex_colors = $bool;
		}
	}


	public function set_allow_rgb_colors ( $bool = TRUE )
	{
		if ( is_bool ( $bool ) )
		{
			$this->allow_rgb_colors = $bool;
		}
	}


	public function set_allow_px_sizes ( $bool = TRUE )
	{
		if ( is_bool ( $bool ) )
		{
			$this->allow_px_sizes = $bool;
		}
	}


	public function set_min_px_size ( $minimum = 8 )
	{
		if ( is_integer ( $minimum ) )
		{
			$this->min_px_size = $minimum;
		}
	}


	public function set_min_px_size ( $maximum = 48 )
	{
		if ( is_integer ( $maximum ) )
		{
			$this->max_px_size = $maximum;
		}
	}


	public function set_default_px_size ( $default = '16px' )
	{
		if ( is_string ( $default ) )
		{
			$this->default_px_size = $default;
		}
	}


	public function set_allow_em_sizes ( $bool = TRUE )
	{
		if ( is_bool ( $bool ) )
		{
			$this->allow_em_sizes = $bool;
		}
	}


	public function set_min_em_size ( $minimum = 0.5 )
	{
		if ( is_float ( $minimum ) )
		{
			$this->min_em_size = $minimum;
		}
	}


	public function set_min_px_size ( $maximum = 3.0 )
	{
		if ( is_float ( $maximum ) )
		{
			$this->max_em_size = $maximum;
		}
	}


	public function set_default_em_size ( $default = '1.0em' )
	{
		if ( is_string ( $default ) )
		{
			$this->default_em_size = $default;
		}
	}


	public function set_allow_percent_sizes ( $bool = TRUE )
	{
		if ( is_bool ( $bool ) )
		{
			$this->allow_percent_sizes = $bool;
		}
	}


	public function set_min_percent_size ( $minimum = 50 )
	{
		if ( is_integer ( $minimum ) )
		{
			$this->min_percent_size = $minimum;
		}
	}


	public function set_min_percent_size ( $maximum = 300 )
	{
		if ( is_integer ( $maximum ) )
		{
			$this->max_percent_size = $maximum;
		}
	}


	public function set_default_percent_size ( $default = '100%' )
	{
		if ( is_string ( $default ) )
		{
			$this->default_percent_size = $default;
		}
	}


	public function set_allow_pt_sizes ( $bool = TRUE )
	{
		if ( is_bool ( $bool ) )
		{
			$this->allow_pt_sizes = $bool;
		}
	}


	public function set_min_pt_size ( $minimum = 6 )
	{
		if ( is_integer ( $minimum ) )
		{
			$this->min_pt_size = $minimum;
		}
	}


	public function set_min_pt_size ( $maximum = 36 )
	{
		if ( is_integer ( $maximum ) )
		{
			$this->max_pt_size = $maximum;
		}
	}


	public function set_default_pt_size ( $default = '12pt' )
	{
		if ( is_string ( $default ) )
		{
			$this->default_pt_size = $default;
		}
	}

	/* private functions below this */

	private function size_parser ( &$size )
	{
		$size = strtolower ( trim ( $size ) );

		if ( in_array ( $size, $this->allowed_sizes ) )
		{
			return TRUE;
		}
		elseif ( $this->allow_px_sizes && substr ( $size, -2 ) == 'px' )
		{
			$test = rtrim ( $size, 'px' );

			if ( ( integer ) $test < $this->min_px_size || ( integer ) $test > $this->max_px_size )
			{
				$size = $this->default_px_size;

				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		elseif ( $this->allow_percent_sizes && substr ( $size, -1 ) == '%' )
		{
			$test = rtrim ( $size, '%' );

			if ( ( integer ) $test < $this->min_percent_size || ( integer ) $test > $this->max_percent_size )
			{
				$size = $this->default_percent_size;

				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		elseif ( $this->allow_em_sizes && substr ( $size, -2 ) == 'em' )
		{
			$test = rtrim ( $size, 'em' );

			if ( ( float ) $test < $this->min_em_size || ( float ) $test > $this->max_em_size )
			{
				$size = $this->default_em_size;

				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		elseif ( $this->allow_pt_sizes && substr ( $size, -2 ) == 'pt' )
		{
			$test = rtrim ( $size, 'pt' );

			if ( ( integer ) $test < $this->min_pt_size || ( integer ) $test > $this->max_pt_size )
			{
				$size = $this->default_pt_size;

				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		else
		{
			$size = $this->default_size;

			return FALSE;
		}
	}


	private function float_parser ( &$float )
	{
		$float = strtolower ( trim ( $float ) );

		if ( in_array ( $float, $this->allowed_floats ) )
		{
			return TRUE;
		}
		else
		{
			$float = $this->default_float;

			return FALSE;
		}
	}


	private function trim_plus ( $fonts )
	{
		return trim ( $fonts, "' \"\t\n\r\0\x0B" );
	}
}

?>