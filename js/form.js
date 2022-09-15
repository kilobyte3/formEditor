function FormEditorClass(treeSelector, componentProperties)
{
    this.lastSelectedNode = null;
    this.globalId = 0;

    /**
     * törlés
     */
    this.clear = function()
    {
        this.globalId = 0;
        this.lastSelectedNode = null;
        treeSelector.tree('loadData', []);
        this.add('Form');
    };

    /**
     * komponens hozzáadása
     *
     * @return Node a hozzáadott node
     */
    this.add = function(componentName, itsParent)
    {
        this.globalId++;

        // szerkesztő a komponensnek
        let s = '<form class="hidden" name="form_'+this.globalId+'" id="form_'+this.globalId+'"><table class="propertyEditor"><tr><td colspan="2" class="propertyEditor_title1">Tulajdonságok</td></tr>';
        s+= '<tr><td colspan="2" class="propertyEditor_title2">Saját</td></tr>';
        for(let i in componentProperties[componentName]['properties'])
        {
            i = componentProperties[componentName]['properties'][i];
            if (!i.inherited)
            {
                s+= '<tr><td>'+i.property+'</td>';
                s+= '<td>'+i.editor+'</td></tr>';
            }
        }
        s+= '<tr><td colspan="2" class="propertyEditor_title2">Örökölt</td></tr>';
        for(let i in componentProperties[componentName]['properties'])
        {
            i = componentProperties[componentName]['properties'][i];
            if (i.inherited)
            {
                s+= '<tr><td>'+i.property+'</td>';
                s+= '<td>'+i.editor+'</td></tr>';
            }
        }
        s+= '<tr><td colspan="2"><input type="button" class="formDeleteButton" onclick="formEditor.remove('+this.globalId+');" value="Törlés"></td></tr></table></form>';
        $('#workspace_center').append(s);

        // fastruktúrába való felvitele
        itsParent = itsParent || treeSelector.tree('getNodeById', 1);
        let node = treeSelector.tree('appendNode', {
            label  : componentName+this.globalId,
            id     : this.globalId,
            _type  : componentName,
        }, itsParent);

        // kijelölése
        treeSelector.tree('selectNode', node);

        return node;
    };

    /**
     * fa tartalmának lekérdezése, backend formátumának megfelelő átalakítással
     */
    this.getItems = function(source)
    {
        let items = [];
        for(let item in source)
        {
            item = source[item];
            let item2 = {}; // $('#form_'+item.id).serializeArray(); ez nem jó a booleanek miatt
            item2._type = item._type;
            $.each($('#form_'+item.id).find(':input').get(), function() {
                if (this.name === '')
                {
                    return;
                }
                // pre
                switch(this.type)
                {
                    case 'checkbox' :
                    case 'radio' :
                        item2[this.name] = this.checked;
                        break;
                    default :
                        item2[this.name] = $(this).val();
                }
                // post
                if (item2._type === 'Input'    && this.name === 'maxlength') { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Password' && this.name === 'maxlength') { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Select'   && this.name === 'size')      { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Textarea' && this.name === 'maxlength') { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Textarea' && this.name === 'rows')      { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Textarea' && this.name === 'cols')      { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Numeric'  && this.name === 'min')       { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Numeric'  && this.name === 'max')       { item2[this.name] = parseInt(item2[this.name]) || 0; }
                if (item2._type === 'Numeric'  && this.name === 'value')     { item2[this.name] = parseInt(item2[this.name]) || 0; }
            });
            if (item.children.length !== 0)
            {
                item2.fields = this.getItems(item.children);
            }
            items.push(item2);
        }
        return items;
    };

    /**
     * fa feltöltése
     */
    this.loadFromArray = function(source, itsParent)
    {
        if (source instanceof Array)
        {
            for(let i in source)
            {
                this.loadFromArray(source[i], itsParent);
            }
        }
        else
        {
            let thisNode;
            if (source._type === 'Form')
            {
                thisNode = treeSelector.tree('getNodeById', 1);
            }
            else
            {
                thisNode = this.add(source._type, itsParent);
            }
            delete source._type;
            for(let key in source)
            {
                if (key === 'fields')
                {
                    this.loadFromArray(source[key], thisNode);
                }
                // tulajdonságok beírása
                $.each($('#form_'+thisNode.id).find(':input').get(), function() {
                    if (this.name === '')
                    {
                        return;
                    }
                    if (this.name && source[this.name])
                    {
                        if (this.type === 'checkbox' || this.type === 'radio')
                        {
                            $(this).attr("checked", (source[this.name]));
                        }
                        else
                        {
                            $(this).val(source[this.name]);
                        }
                    }
                });
            }
        }
    };

    /**
     * rákattintottak egy elemre a fában
     */
    this.treeSelect = function(event)
    {
        if (this.lastSelectedNode != null)
        {
            // jelenlegi node eltüntetése
            $('#form_'+this.lastSelectedNode.id).addClass('hidden');
        }
        if (event.node)
        {
            $('#form_'+event.node.id).removeClass('hidden');
            this.lastSelectedNode = event.node;
        }
        else
        {
            // a kijelölést levették. De most visszatesszük:
            treeSelector.tree('selectNode', event.previous_node);
            this.lastSelectedNode = event.previous_node;
        }
    };

    /**
     * komponens törlése
     */
    this.remove = function(id)
    {
        treeSelector.tree('moveUp');
        treeSelector.tree('removeNode', treeSelector.tree('getNodeById', id));
        if (treeSelector.tree('getSelectedNode') === false)
        {
            let firstNode = treeSelector.tree('getTree');
            if (firstNode.children.length === 0)
            {
                $('#workspace_center').html('');
            }
            else
            {
                treeSelector.tree('selectNode', firstNode.children[0]);
            }
        }

        if (id === 1)
        {
            // root (Form) törlése, ekkor újrainicializálunk mindent
            this.clear();
        }
    };

    /**
     * mozgatás történt
     *
     * @return bool true, ha a művelet legális (különben false)
     */
    this.move = function(moved_node, target_node, position, previous_parent)
    {
        // szülő-gyerek struktúra változtatás történt?
        if (position === 'inside')
        {
            let s = this.checkChildParentRelation(moved_node, target_node);
            if (s !== '')
            {
                alert('A művelet sikertelen: '+s);
                return false;
            }
        }
        return true;
    };

    /**
     * érvényes szülő-gyermek struktúra?
     *
     * @return: siker esetén üres string, más esetben a sikertelenség oka
     */
    this.checkChildParentRelation = function(moved_node, target_node)
    {
        // táblázat, hogy ki kiket fogad el.
        // az üres tömb azt jelenti, bármki lehet a gyermeke
        // akik nincsenek itt, azoknak nem lehet gyermekük
        let rules = {
            'Form': [],
            'Fieldset': [],
            'Select': ['Option'],
            'Label': []
        };
        if (target_node._type in rules)
        {
            let mayBeChildren = rules[target_node._type];
            if (mayBeChildren.length === 0)
            {
                return ''; // bárki lehet a gyermeke
            }
            else
            {
                if (mayBeChildren.indexOf(moved_node._type) === -1)
                {
                    return target_node._type+'-nek '+moved_node._type+' nem lehet a gyermeke, ezek lehetnek csak: '+mayBeChildren.join(', ');
                }
                else
                {
                    return ''; // a komponens lehet a gyermeke
                }
            }
        }
        else
        {
            return target_node._type+'-nak nem lehet semmilyen gyermeke!'; // nincs a táblában, ennek a komponensnek nem lehet semmilyen gyermeke!
        }
    };

    /**
     * constructor
     */

    let _this = this;

    // fa-struktúra init
    treeSelector.tree({data: [], autoOpen: true, dragAndDrop: true});

    // elem kijelölése
    treeSelector.bind('tree.select', function(event) {
        _this.treeSelect(event);
    });

    // komponens hozzáadás gombok
    $('.componentButton').click(function() {
        _this.add($(this).val());
    });

    // mozgatás történt
    treeSelector.bind(
        'tree.move', function(event) {
            return _this.move(event.move_info.moved_node, event.move_info.target_node, event.move_info.position, event.move_info.previous_parent);
    });

    // előnézet
    $('#preview1').click(function() {
        $('#test').html('Letöltés....');
        $.post('/', { formPreview: 1, form: JSON.stringify(_this.getItems(treeSelector.tree('getTree').children)[0]) }, function(answer) {
            try
            {
                answer = eval('('+answer+')');
                //$('#test').html(answer[1]+answer[1].replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;"));
                $('#test').html(answer[1]);
                $('#form_json').val(answer[0]);
            }
            catch(e)
            {
                $('#test').html('Kommunikációs hiba:<div class="error">'+e+'</div>Eredeti válasz:<div class="error">'+answer+'</div>');
            }
        });
    });

    // betöltés JSON-ból
    $('#loadFromJson').click(function() {
        try
        {
            _this.remove(1);
            _this.loadFromArray($.parseJSON($('#form_json').val()));
        }
        catch(e)
        {
            alert('Hiba a JSON stringgel: '+e);
        }
    });

    this.clear();
}