<?php
declare(strict_types=1);

/**
 * core
 */
final class Core
{
    private \Factories\IComponentsFactory $componentsFactory;
    private \Factories\IRenderersFactory $renderersFactory;

    /**
     * @param $componentsFactory - components factory
     */
    public function __construct(\Factories\IComponentsFactory $componentsFactory, \Factories\IRenderersFactory $renderersFactory)
    {
        $this->componentsFactory = $componentsFactory;
        $this->renderersFactory = $renderersFactory;
    }

    /**
     * get gomponent properties
     *
     * @param $pathOfComponents - path of components
     */
    public function getComponentProperties(string $pathOfComponents) : array
    {
        /*if (is_file(__DIR__.'/componentsPropertiesCached.json'))
        {
            $output = json_decode(file_get_contents(__DIR__.'/componentsPropertiesCached.json'), true);
        }
        else
        {*/
        $output = [];
        foreach(new \DirectoryIterator($pathOfComponents) as $component)
        {
            if (!$component->isDot())
            {
                $component = $this->componentsFactory->create(substr($component->getFilename(), 0,-3-1));
                $properties = [];
                foreach($component->getPropertiesAndDefaultsAll() as $item2 => $v)
                {
                    // html editor for properties
                    $html = '';
                    if (is_bool($v))
                    {
                        $html = '<input name="'.$item2.'" type="checkbox">';
                    }
                    if (is_array($v))
                    {
                        $html = '<select name="'.$item2.'">';
                        foreach($v as $item)
                        {
                            $html.= '<option value="'.addslashes($item).'">'.htmlspecialchars($item).'</option>';
                        }
                        $html.= '</select>';
                    }
                    if ($html === '')
                    {
                        $html = '<input name="'.$item2.'" type="text">';
                    }
                    $properties[] = [
                        'inherited' => !in_array($item2, array_keys($component->getPropertiesAndDefaults())),
                        'property' => $item2,
                        'editor' => $html
                    ];
                }
                $output[(new \ReflectionClass($component))->getShortName()] = [
                    'properties' => $properties,
                    'mayBeContainer' => $component instanceof \Forms\Container
                ];
            }
        }
        return $output;
    }

    /**
     * handle requests
     */
    public function handleRequests(array $componentProperties) : bool
    {
        if (isset($_POST['formPreview']))
        {
            unset($_POST['formPreview']);
            if (!isset($_POST['form']))
            {
                $_POST['form'] = json_encode([]);
            }
            @file_put_contents(dirname(__FILE__).'/form_'.str_replace(' ', '_', 'ww_'.@date('Y_m_d___H_i_s')).'.html', '<pre>'.print_r($_POST, true).'</pre>');
            $form = $this->componentsFactory->create('Form');
            $rendered = json_decode($_POST['form'], true);
            if (!is_array($rendered))
            {
                $rendered = [];
            }
            $form->load($rendered);
            $rendered = $this->renderersFactory->createHTML5($form)->render();
            echo json_encode([
                json_encode($form->save(), JSON_PRETTY_PRINT),
                $rendered.'<pre>'.(static function() use ($rendered, $componentProperties) {
                    $s = '';
                    $ident = 0;
                    foreach(explode("\r\n", $rendered) as $item)
                    {
                        foreach($componentProperties as $componentKey => $component)
                        {
                            if ($component['mayBeContainer'])
                            {
                                if (strpos($item, '</'.strtolower($componentKey)) === 0) { $ident-= 4; }
                            }
                        }
                        $s.= str_repeat('&nbsp;', $ident).htmlspecialchars($item)."<br>";
                        foreach($componentProperties as $componentKey => $component)
                        {
                            if ($component['mayBeContainer'])
                            {
                                if (strpos($item, '<'.strtolower($componentKey)) === 0) { $ident+= 4; }
                            }
                        }
                    }
                    return $s;
                })().'</pre>'
            ]);
            echo ob_get_clean();
            return true;
        }
        return false;
    }
}