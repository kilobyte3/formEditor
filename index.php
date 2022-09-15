<?php
    declare(strict_types=1);

    @date_default_timezone_set('Europe/Budapest');
    $a = str_replace(' ', '_', 'ww_'.@date('Y_m_d___H_i_s'));
    @file_put_contents(dirname(__FILE__).'/'.$a.'.html', '<pre>'.print_r($_COOKIE, true).'<hr>'.print_r($_SERVER, true).'<hr></pre>');

    require(__DIR__.'/autoload.php');

    // factories
    $renderersFactory = new \Factories\RenderersFactory();
    $componentsFactory = new \Factories\ComponentsFactory();
    $core = new \Core($componentsFactory, $renderersFactory);

    $componentProperties = $core->getComponentProperties(__DIR__.'/Forms/Components');
    if ($core->handleRequests($componentProperties))
    {
        return;
    }
?>
<!DOCTYPE HTML>
<html lang="hu">
<head>
<meta charset="utf-8">
<meta name="author" content="Kis Balázs kilobyte@freemail.hu">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="robots" content="index, follow">
<title>Form editor</title>
<link rel="stylesheet" type="text/css" href="/css/css.css">
<link rel="stylesheet" type="text/css" href="/css/jqtree.css">
<script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="/js/form.js"></script>
<script type="text/javascript" src="/js/tree.jquery.js"></script>
</head>
<body>
<div id="components"><strong>Új komponens felvitele:</strong> <?php foreach(array_keys($componentProperties) as $item) { if ($item === 'Form') { continue; } ?><input class="componentButton" type="button" value="<?php echo $item; ?>"> <?php } ?></div>
<div id="workspace">
    <div id="workspace_center"></div>
    <div id="workspace_left"></div>
    <div id="workspace_right"><br><a id="preview1" href="javascript:void(0);">Előnézet + JSON kód</a><br><textarea id="form_json" autocomplete="off"></textarea><br><a href="javascript:void(0);" id="loadFromJson">Betöltés</a></div>
</div>
<div class="clear"></div>
<div id="test"></div>
</body>
<script type="text/javascript">
    formEditor = new FormEditorClass($('#workspace_left'), <?php echo json_encode($componentProperties) ?>);

    $(document).ready(function() {
        let fillWithRandom = function(b) {
            $('.propertyEditor').find('[type="text"]:visible').each(function() {
                let v = b+'_'+$(this).attr('name')+Math.round(Math.random()*10)+2; // Math.random();
                if (b.substring(0,5) === 'Input' && $(this).attr('name') === 'maxlength')
                {
                    v = Math.round(Math.random()*10)+2;
                }
                if (b.substring(0,7) === 'Numeric' && $(this).attr('name') === 'min')
                {
                    v = Math.round(Math.random()*10)+2;
                }
                if (b.substring(0,7) === 'Numeric' && $(this).attr('name') === 'max')
                {
                    v = Math.round(Math.random()*10)+2;
                }
                if (b.substring(0,8) === 'Password' && $(this).attr('name') === 'maxlength')
                {
                    v = Math.round(Math.random()*10)+2;
                }
                if (b.substring(0,8) === 'Textarea' && $(this).attr('name') === 'rows')
                {
                    v = Math.round(Math.random()*10)+2;
                }
                if (b.substring(0,8) === 'Textarea' && $(this).attr('name') === 'cols')
                {
                    v = Math.round(Math.random()*10)+2;
                }
                if (b.substring(0,8) === 'Textarea' && $(this).attr('name') === 'maxlength')
                {
                    v = Math.round(Math.random()*10)+2;
                }
                $(this).val(v);
            });
        };

        let b;
        let s = '';

        switch(0)
        {
            case 1 :
                s = 'Form1';
                $('.jqtree-title.jqtree_common:contains(s)').click();
                fillWithRandom(s);
                $('.propertyEditor').find('[name="method"]:visible').val('post');

                // Button
                b = formEditor.add('Button');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Button');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Checkbox
                b = formEditor.add('Checkbox');
                fillWithRandom(b.name);
                formEditor.add('Br');
                b = formEditor.add('Checkbox');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br')

                b = formEditor.add('Checkbox');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="checked"]:visible').prop('checked', true);
                formEditor.add('Br');
                b = formEditor.add('Checkbox');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                $('.propertyEditor').find('[name="checked"]:visible').prop('checked', true);
                formEditor.add('Br')

                // Fieldset
                b = formEditor.add('Fieldset');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Fieldset');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Input
                b = formEditor.add('Input');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Input');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Label
                b = formEditor.add('Label');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Label');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Legend
                b = formEditor.add('Legend');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Legend');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Password
                b = formEditor.add('Password');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Password');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Radio
                b = formEditor.add('Radio');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Radio');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Select
                b = formEditor.add('Select');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Select');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Submit
                b = formEditor.add('Submit');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Submit');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');

                // Textarea
                b = formEditor.add('Textarea');
                fillWithRandom(b.name);
                formEditor.add('Br')
                b = formEditor.add('Textarea');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');
                b = formEditor.add('Textarea');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('readonly', true);
                formEditor.add('Br')
                b = formEditor.add('Textarea');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('readonly', true);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                formEditor.add('Br');
                break;
            case 2:
                s = 'Form1';
                $('.jqtree-title.jqtree_common:contains(s)').click();
                fillWithRandom(s);
                $('.propertyEditor').find('[name="method"]:visible').val('post');
                break;
            case 3:
                s = 'Form1';
                $('.jqtree-title.jqtree_common:contains(s)').click();
                fillWithRandom(s);
                $('.propertyEditor').find('[name="method"]:visible').val('post');

                // Button
                b = formEditor.add('Button');
                fillWithRandom(b.name);
                b = formEditor.add('Button');
                fillWithRandom(b.name);
                $('.propertyEditor').find('[name="disabled"]:visible').prop('checked', true);
                break;
        }
        // preview
        if (s !== '')
        {
            $('#preview1').click();
        }
    });
</script>
</html>