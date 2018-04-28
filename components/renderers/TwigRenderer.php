<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 07.03.2018
 * Time: 19:34
 */

namespace components\renderers;

use components\App;
use twig\twig;

class TwigRenderer implements IRenderer
{
	private $templateDir = 'templates/';
	private $templateExt = '.tmpl';/* '.php'; */

	public function render ($template, $data_for_render, $params = [])
	{
		extract($params);

      $templateFile = App::getAppRootDir() . $this->templateDir . $template . $this->templateExt;

      $loader = new \Twig_Loader_Filesystem('../templates');
		$twig = new \Twig_Environment($loader);

		if (file_exists($templateFile)) 
		{
			$template_for_render = $twig->loadTemplate("$template.tmpl");
			echo $template_for_render->render($data_for_render);
		} 
		else 
		{
			/** var_dump($templateFile);
      	echo "<p><script type=\"text/javascript\">alert('Страницы не существует');</script><p>";
      	echo "Страницы не существует, но вот вам котики 🐈🐈🐈🐈🐈";
      	echo "<br><a href=IndexMagazin>вернуться на главную страницу</a>"; **/

			$template_for_render = $twig->loadTemplate("404.tmpl");
			echo $template_for_render->render([]);

      	exit();
		}
	}
}