<?php

class Html_library
{
	public function styling($type, $link, $attr = '')
	{
		if($attr != null)
		{
			$attribute 	= ' '.$attr;
		}
		else
		{
			$attribute 	= '';
		}

		if($type == 'css')
		{
			print('<link rel="stylesheet" type="text/css" href="'.$link.'"'.$attribute.'>');
		}
		elseif($type == 'js')
		{
			print('<script type="text/javascript" src="'.$link.'"'.$attribute.'></script>');
		}

	}

	public function htmldata($value, $output)
	{
		switch($value)
		{
			case 'doctype':
				$data 		= '<!DOCTYPE html>';
				break;

			case 'html_open':
				$data 		= '<html lang="en">';
				break;

			case 'html_close':
				$data 		= '</html>';
				break;

			case 'head_open':
				$data 		= '<head>';
				break;

			case 'head_close':
				$data 		= '</head>';
				break;

			case 'body_open':
				$data 		= '<body class="tooltips">';
				break;

			case 'body_close':
				$data 		= '</body>';
				break;

			# Meta
			case 'meta_charset':
				$data 		= '<meta charset="utf-8">';
				break;

			case 'meta_viewport':
				$content 	= 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no';
				$data 		= '<meta name="viewport" content="'.$content.'">';
				break;

				
		}

		if($output == TRUE)
		{
			print($data);
		}
		else
		{
			return $data;
		}
	}

	public function autoload($type)
	{
		if($type == 'style')
		{
			$this->styling('css', 'assets/css/bootstrap.min.css');
			$this->styling('css', 'assets/plugins/weather-icon/css/weather-icons.min.css');
			$this->styling('css', 'assets/plugins/prettify/prettify.min.css');
			$this->styling('css', 'assets/plugins/magnific-popup/magnific-popup.min.css');
			$this->styling('css', 'assets/plugins/owl-carousel/owl.carousel.min.css');
			$this->styling('css', 'assets/plugins/owl-carousel/owl.theme.min.css');
			$this->styling('css', 'assets/plugins/owl-carousel/owl.transitions.min.css');
			$this->styling('css', 'assets/plugins/chosen/chosen.min.css');
			$this->styling('css', 'assets/plugins/icheck/skins/all.css');
			$this->styling('css', 'assets/plugins/datepicker/datepicker.min.css');
			$this->styling('css', 'assets/plugins/timepicker/bootstrap-timepicker.min.css');
			$this->styling('css', 'assets/plugins/validator/bootstrapValidator.min.css');
			$this->styling('css', 'assets/plugins/summernote/summernote.min.css');
			$this->styling('css', 'assets/plugins/markdown/bootstrap-markdown.min.css');
			$this->styling('css', 'assets/plugins/datatable/css/bootstrap.datatable.min.css');
			$this->styling('css', 'assets/plugins/morris-chart/morris.min.css');
			$this->styling('css', 'assets/plugins/c3-chart/c3.min.css');
			$this->styling('css', 'assets/plugins/slider/slider.min.css');
			$this->styling('css', 'assets/plugins/font-awesome/css/font-awesome.min.css');
			$this->styling('css', 'assets/css/style.css');
			$this->styling('css', 'assets/css/style-responsive.css');
		}
		elseif($type == 'script')
		{
			$this->styling('js', 'assets/js/jquery.min.js');
			$this->styling('js', 'assets/js/bootstrap.min.js');
			$this->styling('js', 'assets/plugins/retina/retina.min.js');
			$this->styling('js', 'assets/plugins/nicescroll/jquery.nicescroll.js');
			$this->styling('js', 'assets/plugins/slimscroll/jquery.slimscroll.min.js');
			$this->styling('js', 'assets/plugins/backstretch/jquery.backstretch.min.js');
			
			// PLUGINS
			$this->styling('js', 'assets/plugins/skycons/skycons.js');
			$this->styling('js', 'assets/plugins/prettify/prettify.js');
			$this->styling('js', 'assets/plugins/magnific-popup/jquery.magnific-popup.min.js');
			$this->styling('js', 'assets/plugins/owl-carousel/owl.carousel.min.js');
			$this->styling('js', 'assets/plugins/chosen/chosen.jquery.min.js');
			$this->styling('js', 'assets/plugins/icheck/icheck.min.js');
			$this->styling('js', 'assets/plugins/datepicker/bootstrap-datepicker.js');
			$this->styling('js', 'assets/plugins/timepicker/bootstrap-timepicker.js');
			$this->styling('js', 'assets/plugins/mask/jquery.mask.min.js');
			$this->styling('js', 'assets/plugins/validator/bootstrapValidator.min.js');
			$this->styling('js', 'assets/plugins/datatable/js/jquery.dataTables.min.js');
			$this->styling('js', 'assets/plugins/datatable/js/bootstrap.datatable.js');
			$this->styling('js', 'assets/plugins/summernote/summernote.min.js');
			$this->styling('js', 'assets/plugins/markdown/markdown.js');
			$this->styling('js', 'assets/plugins/markdown/to-markdown.js');
			$this->styling('js', 'assets/plugins/markdown/bootstrap-markdown.js');
			$this->styling('js', 'assets/plugins/slider/bootstrap-slider.js');
			
			// EASY PIE CHART JS
			$this->styling('js', 'assets/plugins/easypie-chart/easypiechart.min.js');
			$this->styling('js', 'assets/plugins/easypie-chart/jquery.easypiechart.min.js');
			
			// KNOB JS
			$this->styling('js', 'assets/plugins/jquery-knob/jquery.knob.js');
			$this->styling('js', 'assets/plugins/jquery-knob/knob.js');

			// $this->styling('js', 'assets/js/moment.js');
			// $this->styling('js', 'assets/js/combodate.js');

			// FLOT CHART JS
			$this->styling('js', 'assets/plugins/flot-chart/jquery.flot.js');
			$this->styling('js', 'assets/plugins/flot-chart/jquery.flot.tooltip.js');
			$this->styling('js', 'assets/plugins/flot-chart/jquery.flot.resize.js');
			$this->styling('js', 'assets/plugins/flot-chart/jquery.flot.selection.js');
			$this->styling('js', 'assets/plugins/flot-chart/jquery.flot.stack.js');
			$this->styling('js', 'assets/plugins/flot-chart/jquery.flot.time.js');

			// MORRIS JS
			$this->styling('js', 'assets/plugins/morris-chart/raphael.min.js');
			$this->styling('js', 'assets/plugins/morris-chart/morris.min.js');
			
			// C3 JS
			$this->styling('js', 'assets/plugins/c3-chart/d3.v3.min.js" charset="utf-8');
			$this->styling('js', 'assets/plugins/c3-chart/c3.min.js');
			
			//MAIN APPS JS
			$this->styling('js', 'assets/js/apps.js');

		}
	}

	public function title($title)
	{
		print('<title>'.$title.'</title>');
	}

	public function display_main($title)
	{
		$this->htmldata('doctype', TRUE);
		$this->htmldata('html_open', TRUE);
		$this->htmldata('head_open', TRUE);
		$this->htmldata('meta_charset', TRUE);
		$this->htmldata('meta_viewport', TRUE);
		$this->title($title);
		$this->autoload('style');
		$this->htmldata('head_close', TRUE);
		$this->htmldata('body_open', TRUE);
		
		
	}

	public function destroy_main()
	{
		$this->autoload('script');
		$this->htmldata('body_close', TRUE);
		$this->htmldata('html_close', TRUE);
	}
}