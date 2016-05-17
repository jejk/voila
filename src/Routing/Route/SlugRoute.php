<?php
namespace App\Routing\Route;

use Cake\ORM\TableRegistry;
use Cake\Routing\Route\Route;

use Cake\Core\Configure;
use Cake\Routing\Route\DashedRoute;
use Cake\Utility\Hash;

use Cake\I18n\I18n;

class SlugRoute extends Route
{
	
	 /**
     * Regular expression for `lang` route element.
     *
     * @var string
     */
    protected static $_langRegEx = null;

    /**
     * Constructor for a Route.
     *
     * @param string $template Template string with parameter placeholders
     * @param array $defaults Array of defaults for the route.
     * @param string $options Array of parameters and additional options for the Route
     *
     * @return void
     */
    public function __construct($template, $defaults = [], array $options = [])
    {
        if (strpos($template, ':lang') === false) {
            $template = '/:lang' . $template;
        }
        if ($template === '/:lang/') {
            $template = '/:lang';
        }

        $options['inflect'] = 'dasherize';
        $options['persist'][] = 'lang';

        if (!array_key_exists('lang', $options)) {
            if (self::$_langRegEx === null &&
                $langs = Configure::read('I18n.languages')
            ) {
                self::$_langRegEx = implode('|', array_keys(Hash::normalize($langs)));
            }
            $options['lang'] = self::$_langRegEx;
        }

	    
	      
	   
		//I18n::locale($options['lang']);
        parent::__construct($template, $defaults, $options);
		
    }
	
	
    public function parse($url)
    {   
        $params = parent::parse($url);
		
		//exit(var_dump($params['slug']));
        if (!$params || !$this->options['model']) {
        	 
            return false;
        }

      $count = TableRegistry::get($this->options['model'])
            ->find()
            ->where([
                'slug' => $params['slug']
            ])
            ->count();
//exit(var_dump($count));
        if ($count !== 1) {
            return false;
        }
		
		
		
		$query= TableRegistry::get($this->options['model'])
            ->find()
            ->where([
                'slug' => $params['slug']
            ]);
		$results = $query->first();
		$data = $results->toArray();
//exit(var_dump($data["id"]));
        if ($count !== 1) {
            return false;
        }
		
		
		$params['pass'][0] = $data["id"];
		
//exit(var_dump($params));
        return $params;
    }
	
	
}
?>