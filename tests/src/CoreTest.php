<?php
declare(strict_types=1);

namespace tests\src\Factories;

/**
 * @see \Core
 */
final class CoreTest extends \PHPUnit\Framework\TestCase
{
    use \tests\src\TestUtils;

    /**
     * test constructor
     */
    public function testConstructor() : void
    {
        // build
        $componentsFactory = $this->createMock(\Factories\IComponentsFactory::class);
        $renderersFactory = $this->createMock(\Factories\IRenderersFactory::class);
        $sut = new \Core($componentsFactory, $renderersFactory);

        // operation
        // check
        $this->assertSame($componentsFactory, $this->getNonAccessibleProperty($sut, 'componentsFactory'));
        $this->assertSame($renderersFactory, $this->getNonAccessibleProperty($sut, 'renderersFactory'));
    }

    /**
     * test getComponentProperties
     */
    public function testGetComponentProperties() : void
    {
        // build
        $componentsFactory = new \Factories\ComponentsFactory();
        $renderersFactory = $this->createMock(\Factories\IRenderersFactory::class);
        $sut = new \Core($componentsFactory, $renderersFactory);

        // operation
        $result = $sut->getComponentProperties(__DIR__.'/../../Forms/Components');

        // check
        $this->assertSame(array (
          'Br' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              1 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Button' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              1 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Checkbox' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'checked',
                'editor' => '<input name="checked" type="checkbox">',
              ),
              1 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Fieldset' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              1 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => true,
          ),
          'Form' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'action',
                'editor' => '<input name="action" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'method',
                'editor' => '<select name="method"><option value=""></option><option value="get">get</option><option value="post">post</option></select>',
              ),
              2 =>
              array (
                'inherited' => false,
                'property' => 'enctype',
                'editor' => '<input name="enctype" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              8 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => true,
          ),
          'Input' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'maxlength',
                'editor' => '<input name="maxlength" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Label' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'caption',
                'editor' => '<input name="caption" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'for',
                'editor' => '<input name="for" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => true,
          ),
          'Legend' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'caption',
                'editor' => '<input name="caption" type="text">',
              ),
              1 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Numeric' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'min',
                'editor' => '<input name="min" type="text">',
              ),
              2 =>
              array (
                'inherited' => false,
                'property' => 'max',
                'editor' => '<input name="max" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              8 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Option' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'caption',
                'editor' => '<input name="caption" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              2 =>
              array (
                'inherited' => false,
                'property' => 'selected',
                'editor' => '<input name="selected" type="checkbox">',
              ),
              3 =>
              array (
                'inherited' => false,
                'property' => 'label',
                'editor' => '<input name="label" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              8 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              9 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Password' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'maxlength',
                'editor' => '<input name="maxlength" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Radio' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'checked',
                'editor' => '<input name="checked" type="checkbox">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => true,
          ),
          'Select' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'multiple',
                'editor' => '<input name="multiple" type="checkbox">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'size',
                'editor' => '<input name="size" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => true,
          ),
          'Submit' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              1 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              2 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              3 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              4 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
          'Textarea' =>
          array (
            'properties' =>
            array (
              0 =>
              array (
                'inherited' => false,
                'property' => 'value',
                'editor' => '<input name="value" type="text">',
              ),
              1 =>
              array (
                'inherited' => false,
                'property' => 'maxlength',
                'editor' => '<input name="maxlength" type="text">',
              ),
              2 =>
              array (
                'inherited' => false,
                'property' => 'rows',
                'editor' => '<input name="rows" type="text">',
              ),
              3 =>
              array (
                'inherited' => false,
                'property' => 'readonly',
                'editor' => '<input name="readonly" type="checkbox">',
              ),
              4 =>
              array (
                'inherited' => false,
                'property' => 'cols',
                'editor' => '<input name="cols" type="text">',
              ),
              5 =>
              array (
                'inherited' => true,
                'property' => 'id',
                'editor' => '<input name="id" type="text">',
              ),
              6 =>
              array (
                'inherited' => true,
                'property' => 'name',
                'editor' => '<input name="name" type="text">',
              ),
              7 =>
              array (
                'inherited' => true,
                'property' => 'class',
                'editor' => '<input name="class" type="text">',
              ),
              8 =>
              array (
                'inherited' => true,
                'property' => 'title',
                'editor' => '<input name="title" type="text">',
              ),
              9 =>
              array (
                'inherited' => true,
                'property' => 'lang',
                'editor' => '<input name="lang" type="text">',
              ),
              10 =>
              array (
                'inherited' => true,
                'property' => 'disabled',
                'editor' => '<input name="disabled" type="checkbox">',
              ),
            ),
            'mayBeContainer' => false,
          ),
        ), $result);
    }

    /**
     * test handle request not valid
     */
    public function testHandleRequests_notValid() : void
    {
        // build
        $_POST = [];
        $componentsFactory = $this->createMock(\Factories\IComponentsFactory::class);
        $renderersFactory = $this->createMock(\Factories\IRenderersFactory::class);
        $sut = new \Core($componentsFactory, $renderersFactory);

        // operation
        $result = $sut->handleRequests([]);

        // check
        $this->assertFalse($result);
    }

    /**
     * test handle request1
     */
    public function testHandleRequests1() : void
    {
        // build
        $_POST = [
            'formPreview' => 1
        ];
        $componentsFactory = new \Factories\ComponentsFactory();
        $renderersFactory = new \Factories\RenderersFactory();
        $sut = new \Core($componentsFactory, $renderersFactory);

        // operation
        ob_start();
        $result = $sut->handleRequests($sut->getComponentProperties(__DIR__.'/../../Forms/Components'));
        $content = ob_get_clean();

        // check
        $this->assertTrue($result);
        $this->assertSame('["{\n    \"_type\": \"Form\"\n}","<form>\r\n<\/form>\r\n<pre>&lt;form&gt;<br>&lt;\/form&gt;<br><br><\/pre>"]', $content);
        $_POST = [];
    }

    /**
     * test handle request2
     */
    public function testHandleRequests2() : void
    {
        // build
        $_POST = [
            'formPreview' => 1,
            'form' => 'sdfsdf'
        ];
        $componentsFactory = new \Factories\ComponentsFactory();
        $renderersFactory = new \Factories\RenderersFactory();
        $sut = new \Core($componentsFactory, $renderersFactory);

        // operation
        ob_start();
        $result = $sut->handleRequests($sut->getComponentProperties(__DIR__.'/../../Forms/Components'));
        $content = ob_get_clean();

        // check
        $this->assertTrue($result);
        $this->assertSame('["{\n    \"_type\": \"Form\"\n}","<form>\r\n<\/form>\r\n<pre>&lt;form&gt;<br>&lt;\/form&gt;<br><br><\/pre>"]', $content);
        $_POST = [];
    }

    /**
     * test handle request3
     * /
    public function testHandleRequests3() : void
    {
        // build
        $_POST = [
            'formPreview' => 1,
            'form' => '[f]'
        ];
        $componentsFactory = new \Factories\ComponentsFactory();
        $renderersFactory = new \Factories\RenderersFactory();
        $sut = new \Core($componentsFactory, $renderersFactory);

        // operation
        ob_start();
        $result = $sut->handleRequests($sut->getComponentProperties(__DIR__.'/../../Forms/Components'));
        $content = ob_get_clean();

        // check
        $this->assertTrue($result);
        $this->assertSame('["{\n    \"_type\": \"Form\"\n}","<form>\r\n<\/form>\r\n<pre>&lt;form&gt;<br>&lt;\/form&gt;<br><br><\/pre>"]', $content);
        $_POST = [];
    }*/

    /**
     * test handle request4
     */
    public function testHandleRequests4() : void
    {
        // build
        $_POST = [
            'formPreview' => 1,
            'form' => '{
    "_type": "Form",
    "fields": [
        {
            "name": "tl",
            "_type": "Label",
            "fields": [
                {
                    "_type": "Br"
                }
            ]
        }
    ]
}'
        ];
        $componentsFactory = new \Factories\ComponentsFactory();
        $renderersFactory = new \Factories\RenderersFactory();
        $sut = new \Core($componentsFactory, $renderersFactory);
// https://stackoverflow.com/questions/73510300/phpunit-test-code-or-tested-code-did-not-only-close-its-own-output-buffers
        // operation
        ob_start();
        $result = $sut->handleRequests($sut->getComponentProperties(__DIR__.'/../../Forms/Components'));
        $content = ob_get_clean();

        // check
        $this->assertTrue($result);
        $this->assertSame('["{\n    \"_type\": \"Form\",\n    \"fields\": [\n        {\n            \"name\": \"tl\",\n            \"_type\": \"Label\",\n            \"fields\": [\n                {\n                    \"_type\": \"Br\"\n                }\n            ]\n        }\n    ]\n}","<form>\r\n<label name=\"tl\">\r\n<br>\r\n<\/label>\r\n<\/form>\r\n<pre>&lt;form&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;label name=&quot;tl&quot;&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;br&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;\/label&gt;<br>&lt;\/form&gt;<br><br><\/pre>"]', $content);
        $_POST = [];
    }
}